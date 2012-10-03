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
            $miPregunta = new Pregunta(Input::post('pregunta'));
            if ($miPregunta->guardar(Input::post('pregunta'))) {
                $preguntaId = $miPregunta->id;

                $miCampoPregunta = new Campopregunta();

                try {

                    $miCampoPregunta->begin();

                    for ($index = 1; $index <= $numerocampos; $index++) {

                        $campo = Input::post('campo' . $index);
                        $tipocampo = Input::post('tipocampo' . $index);

                        //Flash::notice('campo: ' . $campo . ' tipocampo: ' . $tipocampo);

                        $miCampoPregunta->nombrecampo = $campo;
                        $miCampoPregunta->pregunta_id = $preguntaId; //recibir arriba
                        $miCampoPregunta->tipocampo_id = $tipocampo;
                        if (!$miCampoPregunta->save()) {
                            $miCampoPregunta->rollback();
                            Flash::notice("No se pudo grabar");
                        } else {
                            $miCampoPregunta = new Campopregunta();
                        }
                    }
                    $miCampoPregunta->commit();
                    Flash::valid('Campos guardados Exitosamente...!!!' . $preguntaId);
                } catch (Exception $e) {
                    $miCampoPregunta->rollback();
                    Flash::valid('Error Fatal...!!!' . $e);
                }
            } else {
                Flash::warning('No se Pudieron Guardar los Datos...!!!');
            }
        }
    }

}

?>