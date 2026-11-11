<!doctype html>

<head>
    <title>navbar g console</title>
    <link rel="stylesheet" href="../styles.css">
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
    <ul class="nav-list">
        <li><a href="login.php"> link to the login page </a></li>
        <li><a href="information.php"> link to an informations  page </a></li>
    </ul>
</nav>
</body>
