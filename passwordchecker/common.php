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
    if($length<8){
        $answer = true;


    }
    return $answer;

}


?>