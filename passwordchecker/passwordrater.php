<?php
//this is the session start , it is giving us a session on the server if we are not already connected
session_start();

require_once('common.php');


//triple equals does not need to convert the values to compare unlike double equals. just checks if they are the same data type and the content is matching
//checks if we have clicked the submit button
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (strlen($_POST['password'])) {
        //checking for the value true
        $_session['usermessage'] = "your password is long enough";
    } else {
        $_session['usermessage'] = "your password is not long enough";
    }
    if (str_contains($_SESSION['usermessage'], "ERROR")) {
        $msg = "<div id='error'> USER MESSAGE: " . $_SESSION['usermessage'] . "</div>";
    } else {
        $msg = "<div id='umsg'> USER MESSAGE: " . $_SESSION['usermessage'] . "</div>";
    }
}
    $var1=$_POST['text1'];
    $var2=$_POST['display'];
    if(isset($var)) {
        var_dump($var1);
    }
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
            <h1> password checker </h1>
            <ul class="nav-list">
                <li><a href="index.php"> link to the home page </a></li>
            </ul>
        </nav>
        <hr>
        <!-- unordered list -->
    <h2> rules for password rating </h2>
        <ul>
            <!-- tags for naming items of the list -->
            <!-- list for robustness , gives the user the rules so the chance of making an issue less -->
            <li> the number of characters is greater than 8 </li>
            <li> at least one uppercase character </li>
            <li> at least one lowercase character </li>
            <li> at least one special character </li>
            <li> at least one number is present </li>
            <li> the first character cannot be a special character </li>
            <li> the last character cannot be a special character </li>
            <li> the word "password" cannot be in the password </li>
            <li> the first character cannot be a number </li>
        </ul>
        <br>
        <form action='result.php' method="post">
            <!-- label will show the text that you put between the tags -->
            <label for="password"> password
                <!-- allowing the user to input a unique set of text -->
                <!-- the required forces an input from the user -->
                <input type="text" name="password" id="password" required> <br>
                <button type="submit" id="display" name="display"> submit </button> <br>
            </label>


        </form>
    </body>

</html>
