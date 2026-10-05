<?php
    //this is the session start , it is giving us a session on the server if we are not already connected
    session_start();
    //triple equals does not need to convert the values to compare unlike double equals. just checks if they are the same data type and the content is matching
    //checks if we have clicked the submit button
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //taking the message and assigning it the to session
        $_SESSION['usermessage'] = $_POST['message'];

    }
?>
<!doctype html>
<!-- $_ super globals , accessible anywhere and reserved and secure. normally globals are bad but these are secure -->
<!-- storage global variable, can store other variables within it -->
<!-- at every .php page there must be a session_start(); to use the global variable -->
<html>
    <head>
        <title> exam prep examples</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <form action="" method="post">
            <!-- label will show the text that you put between the tags -->
            <label for=""> random
                <!-- allowing the user to input a unique set of text -->
                <!-- the required forces an input from the user -->
                <input type="text" name="message" required>
            </label>
            <button type="button" id="submit"> submit </button>

        </form>
    </body>

</html>
