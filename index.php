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
            <a class="active" href="index.php">Home</a>
            <a href="about.html">About</a>
            <a href="profile.html">My Profile</a>
            <button id="login_button" onclick="document.getElementById('id01').style.display='block'">Login</button>

        </span>
    </div>

    <div class="content">
        <h2>Input the following information and click submit to generate a breakup letter!</h2>

        <form>
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


    <div id="id01" class="modal">

        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="container">
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required input value="<?php echo isset($_SESSION['form_input']['username']) ? $_SESSION['form_input']['username'] : ''; ?>" id="username">

                <label for="password"><b>Password</b></label>
                <input type="password" id="password" placeholder="Enter Password" name="password" required >

                <button type="submit">Login</button>

            </div>

            <div class="container">
                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                    class="cancelbtn">Cancel</button>
                <span class="password">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>

    <div id="footer">
        <li class="first">&copy;2019 Holly Roisum</li>
        <li><a href="https://breakupletter.herokuapp.com">Breakup Letter Generator</a></li>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>