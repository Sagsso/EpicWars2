<?php

/**
 * The view class is in charge of defining the minimum methods 
 * that every view must have in order to be shown properly in 
 * the interface.
 */
class View implements IView{
    
    /**
     * @var string $title View's title.
     */
    private $title;

    /**
     * It is in charge of rendering the view, which allows it to 
     * be displayed in the interface each time it is called.
     * 
     * @param string $controller The controller's name.
     * @param string $view The view's name.
     * @param string $title The page title.
     * @return void
     */
    public function render($controller,$view,$title = ''): void{
        
        $controllerWithTail = get_class($controller);
        $controllerName = substr($controllerWithTail, 0, -11);
        $path = './views/'.$controllerName.'/'.$view;
        
        if ($title != "") {
                $this->title = $title;
        }
            
        if(file_exists($path.".php")) {
            require_once $path.".php";
        }elseif (file_exists($path.".html")) {
            require_once $path.".html";
        }else{
            die("Error: Invalid view ".$view." to render");
        }
    }
    
    /**
     * He's the one who loads a piece of information into a view.
     * 
     * @param string $fragmentName The fragment's name.
     * @return void
     */
    public function loadFragment($fragmentName) : void{
        $path = './views/_fragments/'.$fragmentName;
        if(file_exists($path.".php")) {
            require_once $path.".php";
        }else{
            die("Error: Invalid view ".$view." to render");
        }
    }

}
