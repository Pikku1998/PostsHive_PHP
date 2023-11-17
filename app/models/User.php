<?php
class User{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function findUserbyEmail($email){
        $stmt = $this->db->query('SELECT * FROM users where email= :email');
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        return $this->db->result();
    }

    

}