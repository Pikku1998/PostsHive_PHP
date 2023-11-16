<?php

class Pages extends Controller{
    public function __construct(){

    }

    public function index(){
        $data = [
            'title'=>'Posts Hive',
            'description'=>'A simple social network built on PrakashMVC PHP framework.'
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title'=>'About',
            'description'=>'App to share posts with other users on internet.'
        ];
        $this->view('pages/about', $data);
    }

}