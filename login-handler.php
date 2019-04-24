<?php
  session_start();

  require_once 'Dao.php';

  function sanitized($input) {
 
    $search = array(
      '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
      '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
      '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
      '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );
   
      $output = preg_replace($search, '', $input);
      return $output;
    }

  $dao = new Dao();
  $conn = $dao->getConnection();
  $user = sanitized($_POST["username"]);
  $pass = sanitized($_POST["password"]);

  $count = $dao->userIsValid($_POST["username"], $_POST["password"]);

  //validate the data
if(empty($_POST["username"])){
  $status = "Please enter a valid username";
  $_SESSION["status"] = $status;
  $_SESSION["access_granted"] = false;
  header("Location:login.php");
  exit;
}
else if(empty($_POST["password"])){
  $status = "Please enter a valid password.";
  $_SESSION["status"] = $status;
  $_SESSION["email_preset"] = $_POST["username"];
  $_SESSION["access_granted"] = false;
  header("Location:login.php");
  exit;
}
//success!
else if ($count->fetchColumn()>0) {
  $_SESSION["access_granted"] = true;
  $_SESSION["email_preset"] = $user;
  header("Location:index.php");
  exit;
} 
else {
  $status = "That email and password combination doesn't exist";
  $_SESSION["status"] = $status;
  //$_SESSION["email_preset"] = $_POST["username"];
  $_SESSION["email_preset"] = $user;
  $_SESSION["access_granted"] = false;
  //$_SESSION["hash"] = $hash;
  header("Location:login.php");
  exit; //do i need all these exit things?? can try to delete later and see.... 
}

?>