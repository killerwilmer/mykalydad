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
                Flash::info('este es el flash:' . $numerocampos);
            } else {
                Flash::info('este es el flash:' . $numerocampos);
            }

            for ($index = 1; $index <= $numerocampos; $index++) {
                Flash::notice('numero: ' . $index);
            }

            Load::model('pregunta');
            $obj = new Pregunta(Input::post('pregunta'));
            if ($obj->save()) {
                Flash::notice('Pregunta registra satisfactoriamente');
            } else {
                Flash::error('Error al registar la pregunta.');
            }
        }
    }

}

?>
