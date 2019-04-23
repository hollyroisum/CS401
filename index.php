<?php
  session_start();
?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel='icon'
        href="http://mediad.publicbroadcasting.net/p/khpr/files/styles/medium/public/201902/broken_heart.png"
        type='image/x-icon' />
</head>

<header>
    <title>Break Up Letter Generator Home Page</title>
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
            <a class="active" href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="profile.php">My Profile</a>
            <?php if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]): ?>
                <a href="logout-handler.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </span>
    </div>

    <div class="content">
        <h2>Input the following information and click submit to generate a breakup letter!</h2>

        <form action="submit-handler.php" method="POST">
            Name of person you are breaking up with: <br>
            <input type="text" name="breakupname"><br>
            How do you feel about this breakup? <br>
            <select name="type">
                <option value="excited">Really Excited</option>
                <option value="meh">Meh, don't really care</option>
                <option value="betrayed">I've never been more betrayed in my life</option>
            </select><br>
            Whos fault is it? <br>
            <select name="fault">
                <option value="me">All me</option>
                <option value="them">THEM!</option>
            </select><br>
            Which best describes the person you're breaking up with? <br>
            <select name="describe">
                <option value="nice">Extremely nice</option>
                <option value="loser">Total loser</option>
                <option value="liar">Liar and a cheater</option>
                <option value="toonice">Too nice</option>
            </select><br>
            <p>
                More options will go here in time!
            </p>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="footer">
        <li class="first">&copy;2019 Holly Roisum</li>
        <li><a href="https://breakupletter.herokuapp.com">Breakup Letter Generator</a></li>
    </div>

</body>

</html>