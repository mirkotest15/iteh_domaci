<?php 

require "dbBroker.php";
require "model/post.php";
require "model/like.php";
require "model/user.php";

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
    $post_id = $_GET['id'];
    # prikupiti podatke iz baze o postu
    if($rs = Post::getPost($post_id, $conn)->fetch_row()){?>

<div class="container-fluid">
    <section class="mb-4">

    <h2 class="h1-responsive font-weight-bold text-center my-4">Post <?php echo $rs[0]; ?></h2>
    <p class="text-center w-responsive mx-auto mb-5">This thread was posted by <?php echo "<b>".User::getUserById($rs[4], $conn)->fetch_row()[1]."</b>"; ?> on date of <?php echo "<b>\"$rs[2]\"</b>"; ?>!</p>
    
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 mb-md-0 mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="name" class=""><i>Post title: </i><?php echo "<b>\"$rs[1]\"</b>"; ?> </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <label for="message" style="margin-top:10px"><i>Post message:  </i></label>
                            <pre style="text-align:center; border:solid 1px black; padding:15px"><?php echo "<b>\"$rs[3]\"</b>"; ?></pre>
                        </div>
                    </div>
                </div>
<!-- lajk i comment dugme -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
<!-- pored Like:504 i Unlike:503
    postavi da ajax salje -->
                            <?php if(($numlike = Like::getLike($post_id, $_SESSION['user_id'], $conn)->num_rows) == 1): ?>
                                <button type="button" style="background-color:gray">Liked: <?php echo Like::getLikesByPostId($post_id, $conn)->num_rows; ?></button>  
                            <?php else: ?>  
                                <button type="button" style="background-color:lightgray">Like: <?php echo Like::getLikesByPostId($post_id, $conn)->num_rows; ?></button>    
                            <?php endif; ?>
                            <!-- <button type="button" class="">Comment</button> -->    
                        </div>
                    </div>
                </div>
    
        </div>
    </div>
    </section>
</div>
<?php 
    }
    else{
        header("Location: forum.php");
        die();
    }
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

<script type="">

</script>

<?php require "static/footer.php"; ?>