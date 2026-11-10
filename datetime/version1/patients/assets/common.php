<?php //this is common

function usr_msg(){

    if(isset($_SESSION['usermessage'])){
        $msg = 'USER MESSAGE: ' . $_SESSION['usermessage'];
        $_SESSION['usermessage'] = "";
        unset($_SESSION['usermessage']);

    }
    // this is the correct way
    return $msg;
    //there should only be 1 return statement , return ""; bad programming

}






//function to add a console
function addConsole($conn){
    //prepare and execute the sql query
    $sql = "INSERT INTO consoles (consolename, consoleprice , dateofmade ) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $_POST['conname']);
    $stmt->bindParam(2, $_POST['conprice']);
    $stmt->bindParam(3, $_POST['conmade']);

    $stmt->execute(); //run the query to insert
    $conn = null; //closes the connection so cant be abused
    return true; //registration successfull
}



#user message to pass error messages through the session to different parts of the site.
function user_message() {
    $message = "";

    //check if the user message value is set in the usermessage super global
    if (isset($_SESSION["usermessage"])){
        //save message to variable
        $message = $_SESSION["usermessage"];
        //unset it so that it isn't found again
        unset($_SESSION["usermessage"]);
    }
    // return it from the function
    return $message;
}


//function to add a school
function addGame($conn){
    //prepare and execute the sql query
    $sql = "INSERT INTO game (gamename, creationdate, gameprice) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $_POST['gamename']);
    $stmt->bindParam(2, $_POST['gamedate']);
    $stmt->bindParam(3, $_POST['gameprice']);

    $stmt->execute(); //run the query to insert
    $conn = null; //closes the connection so cant be abused
    return true; //registration successfull
}

//function to check if the user exusts
function onlyuser($conn, $email) {
    //make statement add params and execute it
    $sql = "SELECT useremail FROM user WHERE useremail = ?";
    $stmt = $conn->prepare($sql);
    $stmt ->bindParam(1, $email);
    $stmt ->execute();

    //get results
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //return if the user is valid(not in use already)
    return !$result;
}

function reguser($conn) {
    $sql = "INSERT INTO user(adminname, adminemail, adminpassword) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql); //prepare the sql

    //hash the pswd
    $pswd = password_hash($_POST["pswd"], PASSWORD_DEFAULT);

    //add parameters
    $stmt->bindParam(1, $_POST["name"]);
    $stmt->bindParam(2, $_POST["email"]);
    $stmt->bindParam(3, $pswd); //hash the password

    //execute the statement
    $stmt->execute();

    $conn = null; //closes the connection so cant be abused
    return true; //registration successful
}

//function to login to an account
function login($conn) {
    //make the statement
    $sql = "SELECT * FROM user WHERE useremail = ?";
    $stmt = $conn->prepare($sql);

    //bind the params
    $stmt->bindParam(1, $_POST["email"]);
    $stmt->execute(); //run the cmd
    //get the result
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    //set logged in default
    $loggedin = false;
    if ($result) {
        $loggedin = password_verify($_POST["pswd"], $result[0]["pswd"]);
    }

    //if logged in return user id
    if ($loggedin) {return $result[0]["user_id"];}
    return false;
}

//function to add person to el database
function register($conn){
    //prepare and execute the sql query
    $sql = "INSERT INTO userinfo (FirstName, LastName, Email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $_POST['fname']);
    $stmt->bindParam(2, $_POST['lname']);
    $stmt->bindParam(3, $_POST['email']);

    $stmt->execute(); //run the query to insert
    $conn = null; //closes the connection so cant be abused
    return true; //registration successful
}
