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

    public function addpost(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // init data
            $data = [
                'user_id'=>$_SESSION['user_id'],
                'title'=>$_POST['title'],
                'body'=>$_POST['body'],
                'title_err'=>'',
                'body_err'=>''
            ];

            // Validate data
            if(empty($data['title'])){
                $data['title_err'] = 'Enter a title for your post..';
            }
            if(empty($data['body'])){
                $data['body_err'] = 'Please describe a little bit about your post..';
            }

            // If no errors, Add post to database
            if(empty($data['title_err']) && empty($data['body_err'])){
                if($this->postModel->addPost($data)){
                    $_SESSION['post_status'] = 'Hurray! Your Post is now live.';
                    redirect('posts/index');
                }
                else{
                    die('Something went wrong');
                }
                
            }else{ // else load view with errors
                $this->view('posts/addPost', $data);
            }

        }else{
            $data = [
                'title'=>'',
                'body'=>''
            ];
            $this->view('posts/addPost', $data);
        }
        
    }

    public function viewposts($user_id){
        $userPosts = $this->postModel->getUserPosts($user_id);
        $data = ['user_posts'=>$userPosts];
        $this->view('posts/myposts', $data);
    }
}

