<?php
  session_start();

    if (!isset($_SESSION["access_granted"]) || !$_SESSION["access_granted"]) {
        $status = "Please log in first!";
        $_SESSION["status"] = $status;
        header("Location: index.php");
     }
  
  $email = "";
if (isset($_SESSION["email_preset"])) {
  $email = $_SESSION["email_preset"];
}

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

$breakupname = sanitized($_POST['breakupname']);
$time = sanitized($_POST['time']);
$type = sanitized($_POST['type']);
$fault = sanitized($_POST['fault']);
$describe = sanitized($_POST['describe']);
$farewell = sanitized($_POST['farewell']);
$uname = sanitized($_POST['uname']);

$letter = "Dear " . $breakupname . ",\n Even though we have only been together for " . $time . 
    " I think It's time we go our seperate ways. I personally feel " . $type . " about this breakup. I want you to know this breakup is all because of  " 
    . $fault . ". You're just " . $describe . ". I hope you " . $farewell . "!\n (Not) Yours Truly, " . $uname;

  require_once 'Dao.php';

  $dao = new Dao();
  $conn = $dao->getConnection();

  $result = $dao->getUser($email);
  while($row = $result->fetch())
  {
      $id = $row['id'];
      $dao->addLetter($id,$letter);
      $message = "You saved a letter! You can view saved letters in your profile.";
      $_SESSION["message"] = $message;
      header("Location: index.php");
  }
