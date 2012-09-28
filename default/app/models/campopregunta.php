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
    /* public function initialize(){
      $this->belongs_to('tipocampo');
      $this->belongs_to('pregunta');
      } */

    public function registrar() {
        try {
            $this->begin();
            $this->commit();
            
        } catch (KumbiaException $e) {
            $this->rollback();
            View::excepcion($e);
        }
    }

}

?>
