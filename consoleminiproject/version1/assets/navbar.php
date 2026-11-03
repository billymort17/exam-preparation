<!doctype html>

<head>
    <title>navbar g console</title>
    <link rel="stylesheet" href="../../../version3/styles.css">
</head>

<body>
<?php
//if logged in
if (isset($_POST["email"])) {
    $_SESSION["userid"] = login(dbconnect_insert());
    if ($_SESSION["userid"] != false) {
        header("Location: navbar1.php");
        exit;
    }
}
?>
<nav class="navbar">
    <h1> console home page </h1>
    <ul class="nav-list">
        <li><a href="login.php"> link to the login page </a></li>
        <li><a href="information.php"> link to the manufacturers page </a></li>
        <li><a href="logout.php"> link to the console page </a></li>
    </ul>
</nav>
</body>
