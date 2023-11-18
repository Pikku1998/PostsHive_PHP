<?php
class User{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function registerUser($data){
        // Prepare statement
        $stmt = $this->db->query("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");

        // Bind values
        $stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $data['password1'], PDO::PARAM_STR);

        // Execute statement and return status
        return $stmt->execute() ? true : false;

    }

    public function loginUser($email, $password){
        $stmt = $this->db->query('SELECT * FROM users where email= :email');
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $row = $this->db->result();
        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        }
        else{
            return false;
        }

    }

    public function findUserbyEmail($email){
        $stmt = $this->db->query('SELECT * FROM users where email= :email');
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        return $this->db->result();
    }

    

}