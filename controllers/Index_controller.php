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
require_once BUSINESS."characters_bl.php";

class Index_controller extends Controller{
    
    function __construct() {
        parent::__construct();
    }

    public function index(): void {
        $this->view->render($this,"index","Sign in");
    }

    public function create(): void {
        $this->view->render($this,"create","Creating...");
    }

    public function signup(): void {
        $this->view->render($this,"signup","Sign up");
    }

    public function home(): void {
        $this->view->characters = Characters_bl::getAll();
        $this->view->render($this,"home","Epic Wars");
    }

    public function initial(): void {
        $this->view->render($this,"initial","Epic Wars");
    }
    
    public function characters(): void {
        $this->view->characters = Characters_bl::getAll();
        $this->view->render($this,"characters","Characters");
    }

    public function history(): void {
        $this->view->render($this,"history","History");
    }

    public function arena(): void{
        if(isset($_SESSION['id_character_selected'])){
            $this->view->rivals = Characters_bl::getRivals($_SESSION['id_character_selected']);
        } else {
            $this->view->rivals = [];
        }
        $this->view->characters = Characters_bl::getAll();
        $this->view->render($this,"arena","Arena");
    }

}
