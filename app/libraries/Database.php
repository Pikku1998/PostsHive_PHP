<?php
class Database{
    private $host = DB_HOST;
    private $dbuser = DB_USER;
    private $dbpassword = DB_PASSWORD;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        //set DSN
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbname;

        $options = array(
            PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO Instance
        try{
            $this->dbh = new PDO($dsn, $this->dbuser, $this->dbpassword, $options);
            // echo 'Database connected<br>';
        }
        catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare the statement
    public function query($sql_query){
        $this->stmt = $this->dbh->prepare($sql_query);
        return $this->stmt;       
    }

    // Execute the statement
    public function execute(){
        return $this->stmt->execute();
    }

    // Get single record as object
    public function result(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }    
    
    // Get multiple records as objects
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get row count of results
    public function rowCount(){
        $this->stmt->rowCount();
    }


}