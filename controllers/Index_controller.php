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
require_once BUSINESS."Characters_bl.php";
require_once BUSINESS."Users_bl.php";
require_once BUSINESS."History_bl.php";

/**
 * Description of Index_controller.
 * 
 * The index_controller is in charge of handling views in the interface by using 
 * the rendering of the View class. It is also in charge of creating the 
 * variables to display the necessary information within the views, usually using 
 * business logic to do so.
 */
class Index_controller extends Controller{
    
    function __construct() {
        parent::__construct();
        $this->characters_bl = new Characters_bl();
        $this->history_bl = new History_bl();
    }

    /**
     * Default function.
     * 
     * It is in charge of rendering the login view.
     * 
     * @return void
     */
    public function index(): void {
        $this->view->render($this,"index","Sign in");
    }

    /**
     * This function is responsible for rendering the character creation view.
     * 
     * @return void
     */
    public function create(): void {
        $this->view->render($this,"create","Creating...");
    }

    /**
     * This function is responsible for rendering the sign up view.
     * 
     * @return void
     */
    public function signup(): void {
        $this->view->render($this,"signup","Sign up");
    }

    /**
     * This function is responsible for rendering the home view.
     * 
     * It also creates the variable characters that are in charge 
     * of saving the user's characters.
     * 
     * @return void
     */
    public function home(): void {
        $this->view->render($this,"home","Epic Wars");
    }

    /**
     * This function is responsible for rendering the characters view.
     * 
     * It also creates the variable characters that are in charge 
     * of saving the user's characters.
     * 
     * @return void
     */
    public function characters(): void {
        $this->view->characters = $this->characters_bl->getAll();
        $this->view->render($this,"characters","Characters");
    }

    /**
     * This function is responsible for rendering the history view.
     * 
     * It also creates the variable history that are in charge 
     * of saving the user's histories.
     * 
     * @return void
     */
    public function history(): void {
        $this->view->history = $this->history_bl->show();
        $this->view->render($this,"history","History");
    }

    /**
     * This function is responsible for rendering the challenge view. 
     * 
     * Where the whole process of the combat between 2 
     * characters is shown.
     * 
     * @return void
     */
    public function challenge(): void {
        $this->view->history = [];
        $this->view->render($this,"challenge","Challenge");
    }

    /**
     * This function is responsible for rendering challenge saved 
     * in the history. 
     * 
     * Where the whole process of the combat between 2 
     * characters is shown.
     * 
     * @return void
     */
    public function challengeH(): void {
        $this->view->render($this,"challengeH","Challenge");
    }

    /**
     * This function is responsible for rendering the arena view. 
     * 
     * Where the rival characters that can be challenged are shown 
     * depending on the character of the current user that has 
     * been chosen.
     * 
     * @return void
     */
    public function arena(): void{
        if(isset($_SESSION['id_character_selected'])){
            $this->view->rivals = $this->characters_bl->getRivals($_SESSION['id_character_selected']);
        } else {
            $this->view->rivals = [];
        }
        $this->view->characters = $this->characters_bl->getAll();
        $this->view->render($this,"arena","Arena");
    }

}
