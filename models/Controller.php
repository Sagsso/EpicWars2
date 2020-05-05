<?php

/**
 * Description of Controller
 *
 * The controller class defines the constructor and the 
 * general minimum methods that every controller should have.
 */
abstract class Controller implements IController{
    
    /**
     * @var View $view The view to render the controller.
     */
    protected $view;
    
    function __construct() {
        $this->view = new View();
        session_start();
    }

    abstract public function index(): void;

}
