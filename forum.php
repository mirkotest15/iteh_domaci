<?php 

require "dbBroker.php";

session_start();

if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
}

require "static/header.php"

?>

<h1>Welcome to the dark side</h1>






<?php require "static/footer.php" ?>