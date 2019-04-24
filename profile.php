<?php
  session_start();

  if (!isset($_SESSION["access_granted"])) {
    header("Location: login.php");
  }

  $email = "";
if (isset($_SESSION["email_preset"])) {
  $email = $_SESSION["email_preset"];
}
?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">
    <link rel='icon'
        href="http://mediad.publicbroadcasting.net/p/khpr/files/styles/medium/public/201902/broken_heart.png"
        type='image/x-icon' />
</head>

<header>
    <title>Break Up Letter Generator Profile Page</title>
</header>

<body>
    <div class="header">
        <span>
            <img id="logo"
                src="http://mediad.publicbroadcasting.net/p/khpr/files/styles/medium/public/201902/broken_heart.png" />
        </span>
        <span class="header-center">
            Breakup Letter Generator
        </span>
        <span class="header-right">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a class="active" href="profile.php">My Profile</a>
            <?php if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]): ?>
                <a href="logout-handler.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </span>
    </div>

    <div class="profile_content">
        <h2>Account Settings</h2>
        <div>
            <span>Username:</span>
        </div>
        <div>
            <span> <?php echo $email?></span>
        </div>
        <br>

        <h2>Saved Letters</h2>
        <p>
            <?php
                  require_once 'Dao.php';
                  $dao = new Dao();
                  $conn = $dao->getConnection();
                  $result = $dao->getUser($email);
                  while($row = $result->fetch())
                  {
                      $id = $row['id'];
                      $letters = $dao->getLetters($id);
                      echo "<table>";
                      while($row1 = $letters->fetch())
                      {
                          echo "<tr><td>" . $row1['letter'] . "</td></tr>";
                          //echo $row1['letter'];
                          //echo "<br>";
                      }
                      echo "</table>";
                  }
            ?>
        </p>

    </div>

    <div id="footer">
        <li class="first">&copy;2019 Holly Roisum</li>
        <li><a href="https://breakupletter.herokuapp.com">Breakup Letter Generator</a></li>
    </div>

</body>

</html>