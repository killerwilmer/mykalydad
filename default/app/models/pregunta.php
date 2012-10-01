<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pregunta
 *
 * @author Admin
 */
class Pregunta extends ActiveRecord {

    public function initialize() {
        //$this->has_many('campopregunta');
        $this->validates_presence_of('pregunta', 'message: Debe escribir la <b>Pregunta</b>;');
        $this->validates_presence_of('cue_id', 'message: Debe escojer el <b>Cuestionario</b>;');
    }

    public function guardar($pregunta) {
        
        $this->begin(); //iniciamos la trasaccion

        if (!$this->save($pregunta)) {
            $this->rollback();
            return FALSE;
        }
        
        
    }

}

?>
