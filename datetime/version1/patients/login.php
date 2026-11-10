<?php
//imports
require_once "assets/common.php";
require_once "assets/dbconn.php";

//start the session
session_start();

//decide if its login page or signup page
$loginPage = true;
//check if get is set to a page
if (isset($_GET["page"]) && $_GET["page"] == "register") {$loginPage=false;}
else if (isset($_GET["page"]) && $_GET["page"] == "login") {$loginPage=true;}
else if (isset($_SESSION["page"]) && $_SESSION["page"] == "register") {$loginPage=false;  $_SESSION["page"]="";}
else if (isset($_SESSION["page"]) && $_SESSION["page"] == "login") {$loginPage=true; $_SESSION["page"]="";}

//if signed up
if (isset($_POST["name"])) {
    //check if pswd = pswd check
    if ($_POST["pswd"] == $_POST["cpswd"]){
        //check the isn't taken
        if (onlyuser(dbconnect_insert(), $_POST["email"])) {
            //register
            reguser(dbconnect_insert());
            //set to login as account made
            $_SESSION["page"] = "login";
            //refresh page
            header("Location: login.php");
            exit;
        }
        else {
            $_SESSION["usermessage"] = "Email already in use.";
            $_SESSION["page"] = "register";
        }
    }
    else {
        $_SESSION["usermessage"] = "Passwords do not match!";
        $_SESSION["page"] = "register";
    }

}

//if logged in
else if (isset($_POST["email"])) {
    $_SESSION["userid"] = login(dbconnect_insert());
    if ($_SESSION["userid"] != false) {
        header("Location: private.php");
        exit;
    }
}

?>



<!-- use title div class  -->
<div class="formbackground">
    <!-- div for the form -->
    <div class="form">
        <!-- make the form for inputs -->
        <form action="login.php" method="post">
            <?php
            if ($loginPage) { echo'
            <h1>Login</h1>
            <label for="email">Email</label><br>
            <input name="email" id="email" placeholder="Enter Email..." type="email" required><br>
            <label for="pswd">Password</label>
            <input name="pswd" id="pswd" placeholder="Enter password..." type="password" required><br>
            <button type="submit">Login</button><br>
            <a href="?page=register">Dont have an account? Register</a>
            ';}
            else {
                echo '
            <h1>Signup</h1>
            <!-- put all the inputs and labels in a table to align them -->
            <label for="firstname">first Name</label><br>
            <input name="firstname" id="firstname" placeholder="Enter first name..." type="text" required><br>
             <label for="surname">surname</label><br>
            <input name="surname" id="surname" placeholder="Enter surname..." type="text" required><br>
            <label for="email">Email</label><br>
             <label for="gender">Name</label><br>
            <input name="gender" id="gender" placeholder="Enter gender..." type="text" required><br>
            <label for="name">Name</label><br>
            <input name="name" id="name" placeholder="Enter Name..." type="text" required><br>
            <input name="email" id="email" placeholder="Enter Email..." type="email" required><br>
            <label for="pswd">Password</label>
            <input name="pswd" id="pswd" placeholder="Enter password..." type="password" required><br>
            <label for="cpswd">Confirm Password</label>
            <input name="cpswd" id="cpswd" placeholder="Confirm password..." type="password" required><br>
            <button type="submit">Signup</button><br>
            <a href="?page=login">Already have an account? Login</a>
                ';
            }
            ?>
        </form>
    </div>
</div>
