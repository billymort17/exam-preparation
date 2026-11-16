<?php
require_once "assets/common.php";
require_once "assets/dbconn.php";


try{
    if(make_booking(dbconnect_insert())){
        $_session['usermessage'] = "Booking has been booked";

        exit;
    } else {
        $_session['usermessage'] = "Booking has not been booked";
        exit;
    }
} catch (PDOException $e) {#catches PDOException errors and prevents them from causing any crashes
    $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();#sets the usermessage to the error message that was going to be outputted if there wasn't a try catch
    header("Location: book.php");#sends user to registration to refresh the page
    exit;
} catch (Exception $e) {#catches errors
    $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
    header("Location: book.php");
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
            <label for="appoint-time">Choose a time for your appointment:</label>
            <input
                type="datetime-local"
                id="appoint-time"
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

