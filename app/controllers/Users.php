<?php

class Users extends Controller{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');   
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // init data
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password1' => $_POST['password1'],
                'password2' => $_POST['password2'],
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // validate name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter your name';
            }

            // validate email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter your email';
            }else{
                $data['email_err'] = $this->userModel->findUserbyEmail($data['email']) ? 'Email is already taken' : '';
            }

            // validate password
            if(empty($data['password1'])){
                $data['password_err'] = 'Password field cannot be empty';
            }elseif(strlen($data['password1'])<6){
                $data['password_err'] = 'Password must be of atleast 6 characters';
            }

            if($data['password1']!=$data['password2']){
                $data['password_err'] = 'Passwords do not match';
            }

            // If no errors
            if(empty($data['name_err']) && empty($data['email_err']) &&empty($data['password_err'])){
                // Validated
                die('Registration Success');
            }
            // Else load view with errors
            else{
                $this->view('pages/register', $data);
            }
        }
        else{
            $data = [
                'name' => '',
                'email' => '',
                'password1' => '',
                'password2' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];
        $this->view('pages/register', $data);
        }
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // init data
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'email_err' => '',
                'password_err' => '',
            ];

            // validate email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter your email';
            }

            // validate password
            if(empty($data['password'])){
                $data['password_err'] = 'Enter your password';
            }elseif(strlen($data['password'])<6){
                $data['password_err'] = 'Password must be of atleast 6 characters';
            }



            // If no errors
            if(empty($data['email_err']) && empty($data['password_err'])){
                // Validated
                die('Login Success');
            }
            // Else load view with errors
            else{
                $this->view('pages/login', $data);
            }
        }
        else{
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
        $this->view('pages/login', $data);
        }
    }
}