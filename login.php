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

<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel='icon'
        href="http://mediad.publicbroadcasting.net/p/khpr/files/styles/medium/public/201902/broken_heart.png"
        type='image/x-icon' />
</head>

<header>
    <title>Break Up Letter Generator login Page</title>

    <?php
    if(isset($_SESSION["message"]))
        echo $_SESSION["message"];
    ?>
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
            <a href="profile.php">My Profile</a>
            <a class="active" href="login.php">Login</a>
        </span>
    </div>

    <div class="profile_content">
        <form action="action_page.php" method="POST">
            <div>
            
            <?php
    if (isset($_SESSION["status"])) {
        echo "<p class=\"error\">{$_SESSION["status"]}</p>";
        unset($_SESSION["status"]);
      }
    ?>

                <br>
                <label for="uname"><b>Username<b></label> <br>
                <input type="text" placeholder="Enter Username" name="username" required id="username" value="<?php echo $email; ?>"> <br>
                <br>
                <label for="psw"><b>Password</b></label> <br>
                <input type="password" placeholder="Enter Password" name="password" required id="password"> <br>
                <br>
                <button type="submit">Login</button>
                <label>
                </label>
            </div>
        </form>
    </div>


    <div id="footer">
        <li class="first">&copy;2019 Holly Roisum</li>
        <li><a href="https://breakupletter.herokuapp.com">Breakup Letter Generator</a></li>
    </div>

</body>

</html>