<?php

class Posts extends Controller{
    private $postModel; 
    public function __construct(){
        if(isLoggedIn()){
            $this->postModel = $this->model('Post');
            $this->index();           
        }else{
            redirect('users/login');
        }
    }
    public function index(){
        $posts = $this->postModel->getPosts();
        $data = ['posts'=>$posts];
        $this->view('posts/index', $data);
    }
}

