<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipocampo
 *
 * @author Admin
 */
class Tipocampo extends ActiveRecord {
    public function initialize(){
        $this->has_many('campopregunta');
    }
}

?>
