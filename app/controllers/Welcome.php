<?php

class Welcome extends Controller{
    public function index()
    {    
        $data = [
            "page_title" => "Welcome"
        ];
        $this->view("Welcome", $data);
    }
}

?>