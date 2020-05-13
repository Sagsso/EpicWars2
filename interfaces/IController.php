<?php

/**
 * This interface is in charge of naming the 
 * functions that are specific to the controllers.
 */
interface IController {

    /**
     * Default function.
     * 
     * It is in charge of rendering the principal view.
     * 
     * @return void
     */
    function index(): void;
}
