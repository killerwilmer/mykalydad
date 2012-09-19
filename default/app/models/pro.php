<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pro
 *
 * @author skynet
 */
class Pro extends ActiveRecord {
    public function initialize(){
        $this->belongs_to('facu');
    }
}

?>
