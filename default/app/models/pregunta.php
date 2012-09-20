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
    public function initialize(){
        $this->has_many('campopregunta');
    }
}

?>
