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




//function to check if the user exists
function onlyuser($conn, $email) {
    //make statement add params and execute it
    $sql = "SELECT email FROM patients WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt ->bindParam(1, $email);
    $stmt ->execute();

    //get results
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //return if the user is valid(not in use already)
    return !$result;
}
#function to register a user
function reguser($conn) {
    $sql = "INSERT INTO patients(firstname, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql); //prepare the sql

    //hash the pswd
    $pswd = password_hash($_POST["password"], PASSWORD_DEFAULT);

    //add parameters
    $stmt->bindParam(1, $_POST["firstname"]);
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
    $sql = "SELECT * FROM patients WHERE email = ?";
    $stmt = $conn->prepare($sql);

    //bind the params
    $stmt->bindParam(1, $_POST["email"]);
    $stmt->execute(); //run the cmd
    //get the result
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    //set logged in default
    $loggedin = false;
    if ($result) {
        $loggedin = password_verify($_POST["password"], $result[0]["password"]);
    }

    //if logged in return user id
    if ($loggedin) {return $result[0]["user_id"];}
    return false;
}

//function to add person to the database
function register($conn){
    //prepare and execute the sql query
    $sql = "INSERT INTO patients (firstname, surname, gender , dateofbirth , email , password , postcode) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $_POST['firstname']);
    $stmt->bindParam(2, $_POST['surname']);
    $stmt->bindParam(3, $_POST['gender']);
    $stmt->bindParam(4, $_POST['dateofbirth']);
    $stmt->bindParam(5, $_POST['email']);
    $stmt->bindParam(6, $_POST['password']);
    $stmt->bindParam(7, $_POST['postcode']);


    $stmt->execute(); //run the query to insert
    $conn = null; //closes the connection so cant be abused
    return true; //registration successful
}

function staff_getter($conn){
    $sql = "SELECT * FROM staff";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
}
//puts a capital t which invalidates our datetime format. this way formats it correctly and is industry standard
function make_booking($conn){
    $dt = new DateTime($_POST['appt-time']);
    $mysql_datetime = $dt->format('Y-m-d H:i:s');

    $sql = "INSERT INTO appointments (datetime,bookedon,notes) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql); //prepare to sql
    $stmt->bindParam(2, $_POST['datetime']);
    $stmt->bindParam(3, $_POST['bookedon']);
    $stmt->bindParam(4, $_POST['notes']);


}