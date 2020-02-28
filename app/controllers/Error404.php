<?php

class Error404 extends Controller{
    public function index(){
        $data = [
            "page_title" => "404"
        ];
        $this->view("404", $data);
    }
}

?>