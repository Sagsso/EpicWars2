<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author pabhoz
 */
abstract class Controller implements IController{
    
    protected $view;
    
    function __construct() {
        $this->view = new View();
        session_start();    
        // session_destroy();
    }

    abstract public function index(): void;

}
