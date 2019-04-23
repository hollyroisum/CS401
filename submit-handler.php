<?php
  session_start();

  if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
    header("index.php");
  }

$email = "";
if (isset($_SESSION["email_preset"])) {
  $email = $_SESSION["email_preset"];
}
?>