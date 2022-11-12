<?php 

require "dbBroker.php";

session_start();

if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
}

?>

<h1>Welcome to the dark side</h1>

<a href="logout.php">Log Out</a>