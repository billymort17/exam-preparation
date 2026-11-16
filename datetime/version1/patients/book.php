<?php
session_start();
require_once "assets/common.php";
require_once "assets/dbconn.php";


try{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(make_booking(dbconnect_insert())){
            $_session['usermessage'] = "Booking has been booked";
            header("location: booking.php");
            exit;
        } else {
            $_session['usermessage'] = "Booking has not been booked";
            header("location: book.php");
            exit;
        }
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
?>

<!doctype html>

<html>
<body>
<!-- use title div class  -->
<div class="formbackground">
    <!-- div for the form -->
    <div class="form">
        <form action='' method='post'>
            <label for="appoint-time">Choose a time for your appointment:</label>
            <input
                type="datetime-local"
                id="appoint-time"
                name="appoint-time"
            />
        </form>
    </div>
</div>
<br>
<label>
    <select name="staff">
        <?php
        $pro = staff_getter(dbconnect_insert());
        foreach ($pro as $staff){
            echo  "<option value =". $staff['staffid']. ">" . $staff['role'] . " " . $staff['firstname']." ".
                $staff['surname']."- room ".$staff['room']."</option>";
        }
        ?>
    </select>
</label>

</body>
</html>
