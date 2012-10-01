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

            for ($index = 1; $index <= $numerocampos; $index++) {
                $campo = Input::post('campo' . $index);
                $tipocampo = Input::post('tipocampo' . $index);
                Flash::notice('campo: ' . $campo . ' tipocampo: ' . $tipocampo);
            }

            Load::model('pregunta');
            $obj = new Pregunta(Input::post('pregunta'));
            if ($obj->guardar(Input::post('pregunta'))) {
                Flash::valid('El Usuario Ha Sido Agregado Exitosamente...!!!');
            } else {
                Flash::warning('No se Pudieron Guardar los Datos...!!!');
            }
            /* Antes
            if ($obj->save()) {
                Flash::notice('Pregunta registra satisfactoriamente');
            } else {
                Flash::error('Error al registar la pregunta.');
            }*/
        }
    }

}

?>
