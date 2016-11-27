<?php
error_reporting("E-NOTICE");
?>
<?php
session_start();
if (!$_SESSION['uname'] && ($_SESSION['access'] < 9)) {
    header("location: ../account.php");
}
?>
<div id="top">
    <h1><a href="#">Rajshahi Rent A Car</a></h1>
    <div id="top-navigation">
        Welcome <a href="#"><strong>Administrator</strong></a>
        <span>|</span>
        <a href="logout.php">Log out</a>
    </div>
</div>
<div id="navigation">
    <ul>
        <li><a href="index.php"><span>Hire Requests</span></a></li>
        <li><a href="add_vehicles.php"><span>Vehicle Management</span></a></li>
        <li><a href="users.php"><span>User Control</span></a></li>
        <li><a href="message.php"><span>Messages</span></a></li>
    </ul>
</div>