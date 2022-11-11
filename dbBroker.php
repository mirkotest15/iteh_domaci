<?php 

$host = "localhost";
$username = "root";
$password = "";
$db = "forum";

$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_errno){
    exit("Konekcija neuspesna: " . $conn->connect_errno);
}

?>