<?php 

require "dbBroker.php";

session_start();

if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
}

require "static/header.php";

# proveri za GET parametar ?id=5 -> prikaze 5i post
if(isset($_GET['id']))
{
    # sacuvati id posta u promenljivoj
    # prikupiti podatke iz baze o postu
}
else
{
    header("Location: forum.php");
    die();
};
?>

<!-- citanje iz baze title, content posta i poziv staticke funkcije za create post -->
<!-- dodati lajk dugme koje poziva create za lajk tabelu -->
<!-- dodati comment dugme i reply -->


<?php require "static/footer.php"; ?>