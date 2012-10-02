<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of campopregunta
 *
 * @author Admin
 */
class Campopregunta extends ActiveRecord {

    public function initialize() {
        //$this->belongs_to('tipocampo');
        //$this->belongs_to('pregunta');
        $this->validates_presence_of('nombrecampo', 'message: Debe escribir el nombre del <b>Campo </b> para la pregunta.;');
        $this->validates_presence_of('tipocampo_id', 'message: Debe escojer el tipo del <b>Campo </b> para la el campo.;');
        $this->validates_presence_of('pregunta_id', 'message: El <b>Id de pregunta </b> no fue encontrado.;');
    }

    public function registrar() {
        try {
            $this->begin(); //iniciamos una transaccion
            $this->commit(); //enviamos la transaccion
        } catch (KumbiaException $e) {
            $this->rollback(); //cancelamos la transaccion
            View::excepcion($e);
        }
    }

}

?>
