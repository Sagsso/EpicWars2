<?php

/**
 * This interface is in charge of naming the 
 * functions that are specific to the views.
 */
interface IView {

    /**
     * It is in charge of rendering the view, which allows it to 
     * be displayed in the interface each time it is called.
     * 
     * @param string $controller The controller's name.
     * @param string $view The view's name.
     * @param string $title The page title.
     * @return void
     */
    function render(IController $controller, $view): void;
}
