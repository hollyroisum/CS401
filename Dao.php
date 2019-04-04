<?php

class Dao {
    private $host = "us-cdbr-iron-east-03.cleardb.net";
    private $db = "heroku_4e9d86f67afd238";
    private $user = "bd63a5978ac525";
    private $pass = "084510d5";
    
    public function getConnection () {
        try {
          $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
                $this->pass);
        } catch (Exception $e) {
          echo print_r($e,1);
          exit;
        }
        return $conn;
    }
}