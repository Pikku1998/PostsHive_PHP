<?php

class Posts extends Controller{
    private $postModel; 
    public function __construct(){
        if(isLoggedIn()){
            $this->postModel = $this->model('Post');
        }else{
            redirect('users/login');
        }
    }
    public function index(){
        $posts = $this->postModel->getPosts();
        $data = ['posts'=>$posts];
        $this->view('posts/index', $data);
    }

    public function addPost(){
        $data = [
            'title'=>'',
            'body'=>''
        ];
        $this->view('posts/addPost', $data);
    }
}

