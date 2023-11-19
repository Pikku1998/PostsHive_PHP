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
        // Check if the user is same as logged user.
        if($user_id == $_SESSION['user_id']){
            $userPosts = $this->postModel->getUserPosts($user_id);
            $data = ['user_posts'=>$userPosts];
            $this->view('posts/myposts', $data);
        }else{
            redirect('posts');
        }
        
    }

    public function editpost($post_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // init data
            $data = [
                "post_id"=>$post_id,
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
                if($this->postModel->editPost($data)){
                    $_SESSION['post_status'] = 'Your post has been updated successfully.';
                    redirect('posts/viewposts/'.$_SESSION['user_id']);
                }
                else{
                    die('Something went wrong');
                }
                
            }else{ // else load view with errors
                $this->view('posts/editpost', $data);
            }

        }else{
            $post = $this->postModel->getPostbyId($post_id);

            // Check post owner
            if($post->user_id == $_SESSION['user_id']){
                $data = [
                    'title' => $post->title,
                    'body' => $post->body
                ];
                $this->view('posts/editpost', $data);
            }else{
                redirect('posts');
            }
           
        }
        
    }

    public function deletepost($post_id){
        $post = $this->postModel->getPostbyId($post_id);
        // Check post ownership
        if($post->user_id == $_SESSION['user_id']){
                if($this->postModel->deletePost($post_id)){
                    $_SESSION['post_status'] = 'Your post has been removed';
                    redirect('posts/viewposts/'.$_SESSION['user_id']);
                }else{
                    die('Something went wrong');
                }
        }else{
            redirect('posts');
        }

    }
}

