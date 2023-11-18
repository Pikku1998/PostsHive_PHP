<?php
class Post{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getPosts(){
        $this->db->query('SELECT posts.user_id, posts.title, posts.body, posts.created_at, users.name 
        FROM POSTS 
        JOIN USERS 
        ON users.id=posts.user_id
        ORDER BY posts.created_at DESC');
        return $this->db->resultSet();
    }
}