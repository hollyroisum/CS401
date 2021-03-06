<?php
  session_start();
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
    <title>Break Up Letter Generator About Page</title>
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
            <a class="active" href="about.php">About</a>
            <a href="profile.php">My Profile</a>
            <?php if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]): ?>
                <a href="logout-handler.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </span>
    </div>

    <div class="content">
        <h2>How Come A Breakup Letter Generator?</h2>

        <p>
            At the beginning of the semester I was dating someone that I wanted to break up with but he was too nice
            and would not take "breakup" as an option. So when I was thinking of website ideas for this class I kept coming back to the idea of
            a website that would breakup with my boyfriend for me. That is the inspiration for this website.
        </p>
        <h2>How Do I Use This Website?</h2>
        <p>
            Use the navigation bar at the top of the page to naviagte to the different pages.
        </p>
        <p>
            The 'Home' page is where you can follow the prompts and click the "submit" button to generate a breakup letter. At this time you must be logged in first before you can generate and save letters.
        </p>
        <p>
            The 'My Profile' page is where you can view your username and saved letters.
        </p>
        <p>
            The 'Login' page is where you can log into the website. At this time there is no registration so you will not be able to create an account. You can only login if you are part of an extremely exclusive group of people that have login credentials.
        </p>
        <p>
            Honestly if you don't know how to use this website, either I need to refresh on Web Design and Usability principles or you need to take your head out of your ass.
        </p>
    </div>

    <div id="footer">
        <li class="first">&copy;2019 Holly Roisum</li>
        <li><a href="https://breakupletter.herokuapp.com">Breakup Letter Generator</a></li>
    </div>

</body>

</html>