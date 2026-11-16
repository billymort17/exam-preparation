<?php
require_once "assets/common.php";
require_once "assets/dbconn.php";


try{
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



<html>
<body>
<!-- use title div class  -->
<div class="formbackground">
    <!-- div for the form -->
    <div class="form">
        <form action='' method='post'>
            <label for="appt-time">Choose a time for your appointment:</label>
            <input
                type="datetime-local"
                id="appt-time"
             name="apt-time"
            />
        </form>
    </div>
</div>
<br>
<select name="staff">
    <?php
        $pro = staff_getter(dbconnect_insert());
        foreach ($pro as $staf){
            echo  "<option value =". $staf['staffid']. ">" . $staf['role'] . " " . $staf['firstname']." ".
                $staf['surname']."- room ".$staf['room']."</option>";
    }
    ?>
</select>

</body>
</html>
