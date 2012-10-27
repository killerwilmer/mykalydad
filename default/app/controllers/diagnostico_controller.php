<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * El tiempo pone a cada uno en su lugar, pero si haces SEO un poco mas arriva.
 */

/**
 * Description of diagnostico_controller
 *
 * @author Admin
 */
Load::model('car');

class DiagnosticoController extends ApplicationController {

    function index($fac_id = 1) {
        $car = new Car();
        $this->lista = $car->find("conditions: fac_id=$fac_id order by id asc");

        if (Input::hasPost("fac")) {    //verificamos si la variable fac viene cambiada desde la vista.
            $factor = Input::post("fac");   //recibimos la varible fac en factor
            $idfactor = $factor["fac_id"];  //como es un array sacamos de ese array el fac_id que viene en fac
            $this->redirect("diagnostico/index/" . $idfactor);
            Session::set("fac", $idfactor);
        }
    }
}

?>