<?php
  session_start();
  // Pretend i'm looking this up in a database

  $dao = new Dao();
  $conn = $dao->getConnection();
  $user = $_POST["username"];
  $pass = $_POST["password"];

  //check to make sure theyre not null

  //query
  $query = $dao->getUser($user);
  $result = $query->fetchObject();

  $password_in_the_database = "abc123";
  if ($result->password != $_POST["password"]) {
    $_SESSION['message'] = "Error, the password was incorrect.";
    header("Location: index.php");
    exit();
  } else {
    $_SESSION['logged_in'] = true;
    header("Location: index.php");
  }

  header("Location: index.php");
?>