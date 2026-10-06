<?php
    //this is the session start , it is giving us a session on the server if we are not already connected
    session_start();

    require_once('common.php');
    //taking the message and assigning it the to session
       // $_SESSION['usermessage'] = $_POST['message'];


?>
<!doctype html>
<!-- $_ super globals , accessible anywhere and reserved and secure. normally globals are bad but these are secure -->
<!-- storage global variable, can store other variables within it -->
<!-- at every .php page there must be a session_start(); to use the global variable -->
<html>
    <head>
        <title>password process</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <nav class="navbar">
            <h1> safe and secure passwords </h1>
            <ul class="nav-list">
                <li><a href="passwordrater.php"> link to a password rater </a></li>
            </ul>
        </nav>
        <hr>
        <div>
        <p>  passwords are a method of authentication that makes the user enter in a set character amount in order to<br>
        make sure that their account is safe from others. these characters normally have a set amount of rules to follow<br>
        when creating a password as to make sure it is as secure as possible. this then creates a unique authentication<br>
        that only the user who has made the password knows , locking the account to everyone until correct authentication<br>
        , being the password, is given.</p>
        </div>
        <br>
        <h2> safe or unsafe passwords </h2>
        <p> </p>

    </body>

</html>
