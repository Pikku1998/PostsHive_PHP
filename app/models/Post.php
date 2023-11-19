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

    public function addPost($data){
        // Prepare statement
        $stmt = $this->db->query("INSERT INTO posts (user_id,title,body) VALUES (:user_id,:title,:body)");

        // Bind values
        $stmt->bindValue(':user_id', $data['user_id'], PDO::PARAM_INT);
        $stmt->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindValue(':body', $data['body'], PDO::PARAM_STR);

        // Execute statement and return status
        return $stmt->execute() ? true : false;

    }
}