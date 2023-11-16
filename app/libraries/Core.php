<?php
class Core{

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = '';


    public function __construct(){
        $url = $this->getUrl();

        // checks to see if controller is passed in url, else defaultcontroller is loaded.
        if(isset($url)){
            $controller = ucwords($url[0]); //extracts controller from url array and capitalises first letter.
        
            // checks if the controller exists, if Yes, assigns it to $currentController
            if(file_exists('../app/controllers/'.$controller.'.php')){
                $this->currentController = $controller;
            };
        }


        require_once '../app/controllers/'. $this->currentController. '.php';

        // Instatiate current controller
        $this->currentController = new $this->currentController;

        // checks to see if method is passed in url, else defaultmethod is loaded.
        if(isset($url[1])){
            $method = $url[1];  // extract method from url array

            // if method exists, assign it to $currentMethod
            if(method_exists($this->currentController, $method)){
                $this->currentMethod = $method;
            }
        }


        // Extract params from url array
        $this->params = !empty($url[2]) ? $url[2] : '';

        // Call the controller method with params
        call_user_func([$this->currentController, $this->currentMethod], $this->params);

    }



    public function getUrl(){
        // url assumption = {controller}/{method}/{params}

        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url); // ['{controller}',['method']]
            return $url;
        }
    }
}