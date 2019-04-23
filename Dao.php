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

    public function getUser ($userName) {
        $conn = $this->getConnection();
        return $conn->query("select *  from user where email = {$userName}", PDO::FETCH_ASSOC);
      }

      public function userIsValid ($username, $password) {
        $conn = $this->getConnection();
        return $conn->query("SELECT COUNT(*) From `user` where user.email = '$username' and user.password = '$password'");
    }

  //   public function getUserPassword ($username) {
  //     $conn = $this->getConnection();
  //     $sth = $conn->prepare("SELECT user.password From user WHERE user.email = (:username)");
  //     $sth->bindParam(":username", $username);
  //     $sth->execute();
  //     $result = $sth->fetch(PDO::FETCH_OBJ);
  //     return $result->password;
  // }
      
}