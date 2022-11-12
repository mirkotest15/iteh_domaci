<?php 

require "dbBroker.php";
require "model/post.php";
require "model/user.php";

session_start();

if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
}

require "static/header.php"

?>

<h1>Welcome</h1>

<?php 
$rows=Post::getPosts($conn)->fetch_all();
array_multisort( array_column($rows, 0), SORT_DESC, $rows );
foreach($rows as $row):?>
    <div class="container-fluid">
        <a href="post.php?id=<?php echo $row[0]; ?>"> <?php echo $row[1]." | ".$row[2]; ?> </a>
        <?php echo User::getUserById($row[4], $conn)->fetch_row()[1]; ?> <br>
    </div>
<?php endforeach;?>




<?php require "static/footer.php" ?>