<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of diagnostico_controller
 *
 * @author Admin
 */
Load::model('car');

class DiagnosticoController extends ApplicationController {

    function index($fac_fac_id = 1) {
        $car = new Car();
        $this->lista = $car->find("conditions: fac_id=$fac_fac_id order by id asc");

        if (Input::hasPost("fac_fac_id")) {
            $this->redirect("diagnostico/index/" . Input::post("fac_fac_id"));
            Session::set("fac_fac_id", Input::post("fac_fac_id"));
        }
    }
}

?>