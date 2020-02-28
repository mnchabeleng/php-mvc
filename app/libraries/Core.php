<?php

/*
* App Core Class
* Creates URL & loads core controller
* URL FORMAT - /controller/method/params
*/

class Core{
    
    protected $current_controller = "Welcome"; // default controller
    protected $current_method = "index"; // default method
    protected $params = [];

    public function __construct()
    {
        $url = $this->get_url();
        $controller = "../app/controllers/" . ucwords($url[0]) . ".php";

        // look inside controllers for first value
        if(!file_exists($controller) && $url[0])
        {
            // if does not exists, set as controller
            $this->current_controller = "Error404";
        }
        else if (file_exists($controller))
        {
            // if exists, set as controller
            $this->current_controller = ucwords($url[0]);
            unset($url[0]);
        }

        // require the controller
        require_once("../app/controllers/" . $this->current_controller . ".php");
        
        // instantiate controller class
        $this->current_controller = new $this->current_controller;

        // check for second part of url
        if (isset($url[1]))
        {
            // check to see if method exists in controller
            if (method_exists($this->current_controller, $url[1]))
            {
                $this->current_method = $url[1];
                unset($url[1]);
            }
        }

        // get params
        $this->params = $url ? array_values($url) : [];

        // call a callback with array of params
        call_user_func_array([$this->current_controller, $this->current_method], $this->params);
    }

    public function get_url()
    {
        if (isset($_GET["url"]))
        {
            $url = rtrim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}

?>