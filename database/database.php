<?php
include_once('../config/config.php');
Class Database{
    private $host= "localhost";
    private $name= "db_ct07";
    private $user="root";
    private $pass= "mysql";
    private $conn;


    function __construct() {
        $this->connect();
    }
    private function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->name", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function query($sql) {
        return $this->conn->query($sql);
    }
    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }    

    public function closeConn(){
        $this->conn = null;
    }
}