<?php

class Welcome extends Controller{

    public function __construct()
    {
        $this->post_model = $this->model("Post");
    }

    public function index()
    {
        $posts = $this->post_model->get_posts();
        
        $data = [
            "page_title" => "Welcome",
            "posts" => $posts
        ];
        $this->view("Welcome", $data);
    }

}

?>