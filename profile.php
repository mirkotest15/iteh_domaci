<?php 

require "dbBroker.php";
require "model/like.php";

session_start();

if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
}

require "static/header.php";


?>

<!-- prikaz profila, slika, ime, prezime, email... poziv read funkcije nad User modelom -->
<div class="container-fluid">
    <section class="mb-4">

    <h2 class="h1-responsive font-weight-bold text-center my-4">User <?php echo $_SESSION['user_id']; ?></h2>
    
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 mb-md-0 mb-5">

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="md-form mb-0">
                            <img src="img/default_pfp.jpg" id="mimg" class="rounded-circle" height="100" alt="Default profile picture" loading="lazy"/>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>    
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4" style="border:1px solid black;">
                        <div class="md-form mb-0">
                            <label for="name" class=""><i>Userame: </i><?php echo "<b>\"".$_SESSION['username']."\"</b>"; ?> </label>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="md-form mb-0">
                            <label for="name" class=""><i>Email: </i><?php echo "<b>\"".$_SESSION['email']."\"</b>"; ?> </label>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="md-form mb-0">
                            <label for="name" class=""><i>Type: </i><?php if($_SESSION['admin'] == 1) echo "<b>Administrator</b>"; else echo "<b>User</b>"; ?> </label>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="md-form mb-0">
                            <label for="name" class=""><i>LikedPosts: </i><?php echo "<b>".Like::getLikesByUserId($_SESSION['user_id'], $conn)->num_rows."</b>"; ?> </label>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
                
<!-- lajk i comment dugme -->    
        </div>
    </div>
    </section>
</div>


<?php require "static/footer.php"; ?>