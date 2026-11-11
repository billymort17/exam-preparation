<?php
require_once "assets/common.php";
require_once "assets/dbconn.php";
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
