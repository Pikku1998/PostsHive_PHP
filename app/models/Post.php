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

    public function editPost($data){
        // Prepare statement
        $stmt = $this->db->query("UPDATE posts SET title = :title, body = :body WHERE id = :post_id");

        // Bind values
        $stmt->bindValue(':post_id', $data['post_id'], PDO::PARAM_INT);
        $stmt->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindValue(':body', $data['body'], PDO::PARAM_STR);

        // Execute statement and return status
        return $stmt->execute() ? true : false;

    }

    public function deletePost($post_id){
        // Prepare statement
        $stmt = $this->db->query("DELETE FROM posts WHERE id = :post_id");

        // Bind values
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);

        // Execute statement and return status
        return $stmt->execute() ? true : false;

    }

    public function getUserPosts($user_id){
        $stmt = $this->db->query('SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC');
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        return $this->db->resultSet();
    }

    public function getPostbyId($post_id){
        $stmt = $this->db->query('SELECT * FROM posts WHERE id = :post_id');
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
        return $this->db->result();;
    }
}