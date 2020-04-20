<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index_controller
 *
 * @author pabhoz
 */
class Index_controller extends Controller{
    
    function __construct() {
        parent::__construct();
    }

    public function index(): void {
        $this->view->render($this,"index","Sign in");
    }
    
    public function arena(): void{
        if(!isset($_SESSION['user'])) {            
            header('Location: '.URL);
            // echo $_SERVER["REQUEST_URI"];
        }
        $this->view->render($this,"arena","Arena");
    }

}
