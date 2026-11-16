<?php
session_start();
require_once "assets/common.php";
require_once "assets/dbconn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if(delete_appointment(dbconnect_insert())){
            $_SESSION["usermessage"] = "Appointment has been deleted";
            header("location: booking.php");
            exit;
        } else {
            $_SESSION["usermessage"] = "Appointment deletion has failed";
            header("location: booking.php");
            exit;
        }
    }
    catch(PDOException $e){
            $_session['usermessage'] = "error" . $e->getMessage();
            header("location: book.php");
            exit;
        }
    catch(Exception $e){
            $_session['usermessage'] = "error" . $e->getMessage();
            header("location: book.php");
            exit;
        }
}

?>








<?php
$appts = appoint_getter(dbconnect_insert());
foreach ($appts as $appt) {
    echo "<form id=".$appt["appid"].">";
    echo "<input type='hidden' name='appid' value='".$appt["appid"]." method='post' >";
    echo "<p>";
    echo $appt['datetime'] . " with " . $appt['role'] . " " . $appt['room'] . " " . $appt['staffname'] . " at " . $appt['notes'] ."'>";
    echo "<input type='submit' name='submit' value='delete'>";
    echo "</form>";
    echo  "</p>";
}
?>