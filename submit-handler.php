<?php
  session_start();

    if (!isset($_SESSION["access_granted"])) {
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

$text = sanitized($_POST['breakupname']);
$text1 = sanitized($_POST['type']);
$text2 = sanitized($_POST['fault']);
$text3 = sanitized($_POST['describe']);
$letter = "Dear " . $text . "\n I wanted you to know how I feel: " . $text1 . 
    ". and its all because of " . $text2 . ". Through our relationship you have always been " . $text3 . " but now I need to move on; And so do you." ;

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
