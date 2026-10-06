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

function string_length($mystring){ //check the length of a string
    $answer = false;
    $length=strlen($mystring);
    if($length<9){
        $answer = true;

    }
    return $answer;

}
//going to make different functions for clear code , i can manage my code easier
//looking for uppercase characters and returning true or false
function hasUppercase($string){
    if (preg_match("/[A-Z]/", $string)) {
        return true;
    } else {
        return false;
    }

}
//looking for lowercase characters and returning true or false
function hasLowercase($string){
    if (preg_match("/[a-z]/", $string)) {
        return true;
    } else {
        return false;
    }

}
//looking for digit characters and returning true or false
function hasDigit($string){
    if (preg_match("/[a-z]/", $string)) {
        return true;
    } else {
        return false;
    }

}
//looking for special characters and returning true or false
function hasSpecialCharacter($string){
    if (preg_match("/[a-zA-Z0-9_]/", $string)) {
        return true;
    } else {
        return false;
    }

}
?>