<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addpregunta
 *
 * @author mildred
 */
class AddpreguntaController extends AppController {

    public function index() {
        if (Input::hasPost('pregunta')) {

            $numerocampos = Input::request('numerocampos');

            if ($numerocampos == null) {
                $numerocampos = 1;
            }


            Load::models('pregunta', 'campopregunta');
            $obj = new Pregunta(Input::post('pregunta'));
            if ($obj->guardar(Input::post('pregunta'))) {
                Flash::valid('La Pregunta Ha Sido Agregado Exitosamente...!!!');
            } else {
                Flash::warning('No se Pudieron Guardar los Datos...!!!');
            }


            $ob = new Campopregunta();

            try {

                $ob->begin();

                for ($index = 1; $index <= $numerocampos; $index++) {

                    $campo = Input::post('campo' . $index);
                    $tipocampo = Input::post('tipocampo' . $index);

                    Flash::notice('campo: ' . $campo . ' tipocampo: ' . $tipocampo);

                    $ob->nombrecampo = $campo;
                    $ob->pregunta_id = 1; //recibir arriba
                    $ob->tipocampo_id = $tipocampo;
                    if (!$ob->save()) {
                        $ob->rollback();
                        Flash::notice("No se pudo grabar");
                    } else {
                        $ob = new Campopregunta();
                    }
                }
                $ob->commit();
            } catch (Exception $e) {
                $ob->sql("ROLLBACK");
            }
            /* Antes
              if ($obj->save()) {
              Flash::notice('Pregunta registra satisfactoriamente');
              } else {
              Flash::error('Error al registar la pregunta.');
              } */
        }
    }

}

?>
