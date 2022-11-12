<?php 

require "dbBroker.php";

session_start();

if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
}

require "static/header.php";

echo $_SESSION['user_id']." ";
echo $_SESSION['username']." ";
echo $_SESSION['email']." ";
echo $_SESSION['admin']." ";
?>

<!-- prikaz profila, slika, ime, prezime, email... poziv read funkcije nad User modelom -->


<?php require "static/footer.php"; ?>