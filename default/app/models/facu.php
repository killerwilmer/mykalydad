<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Facu
 *
 * @author skynet
 */
class Facu extends ActiveRecord {
    public function initialize(){
        $this->has_many('pro');
    }
}

?>
