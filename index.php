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

        <!-- CHANGE TO COMPRESSED VERSION FOR DEPLOYMENT --->
        <script
        type="text/javascript"
        src="https://code.jquery.com/jquery-3.4.0.js"
        integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
        crossorigin="anonymous"></script> 
        <script src="submit.js"></script>

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

        <form action="submit-handler.php" method="POST" id="frm">
            <label for="breakupname">Name of person you are breaking up with:</label>  <br>
            <input type="text" name="breakupname" id='breakupname' pattern="[A-Z a-z-'.]*" title="Names Only Please" required><br>
            <label for="type">How do you feel about this breakup?</label> <br>
            <select name="type" id='type'>
                <option>Really Excited</option>
                <option>Meh, don't really care</option>
                <option>I've never been more betrayed in my life</option>
            </select><br>
            <label for="fault">Whos fault is it?</label> <br>
            <select name="fault" id='fault'>
                <option>All me</option>
                <option>THEM!</option>
            </select><br>
            <label for="describe" id='describe'>Which best describes the person you're breaking up with?</label> <br>
            <select name="describe">
                <option>Extremely nice</option>
                <option>Total loser</option>
                <option>Liar and a cheater</option>
                <option>Too nice</option>
            </select><br>
            <p>
                More options will go here in time!
            </p>
            <br>
            <input type="submit" value="Submit" id="submit">
            <br>
            <?php
    if (isset($_SESSION["message"])) {
        //echo "<div class=\"message\" id='message'>{$_SESSION["message"]}<span class='close'><X></div>";
        echo "<div class='message' id='message'>" . $_SESSION['message'] . "<span class='close'>X</span></div>";
        unset($_SESSION["message"]);
      }
    ?>
                <?php
    if (isset($_SESSION["status"])) {
        echo "<p class=\"error\">{$_SESSION["status"]}</p>";
        unset($_SESSION["status"]);
      }
    ?>
        </form>

        <!-- <script>
            $(document).ready(function(){
                $("#submit").click(function(){
                    $.ajax({
                        url: "submit-handler.php",
                        type:"POST",
                        data:$("#frm").serialize(),
                        success:function(d)
                        {
                            //$('#result').html(response);
                            //alert(d);
                        }
                    });
                });

            });
        </script> -->
    </div>

    <div id="footer">
        <li class="first">&copy;2019 Holly Roisum</li>
        <li><a href="https://breakupletter.herokuapp.com">Breakup Letter Generator</a></li>
    </div>




</body>

</html>