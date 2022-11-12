<!-- trebace za session_start, da prikazemo ko je ulogovan npr -->
<?php
require "dbBroker.php";

session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Radi?</title>

        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
        
    </head>
    <body>

        <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="navbar-brand mt-2 mt-lg-0" href="#"> 
                        <p style="margin:0px">MN Forum</p>
                    </a>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
                        <li class="nav-item"> <a class="nav-link" href="index.php">Main</a> </li> 
<?php if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == ''):?>
                        <li class="nav-item"> <a class="nav-link" href="#" onclick="javascript:alert('You must first log in!');return false;">Forum</a> </li> 
<?php else:?>
                        <li class="nav-item"> <a class="nav-link" href="forum.php">Forum</a> </li> 
<?php endif;?>                        
                        <li class="nav-item"> <a class="nav-link" href="#">About</a> </li>
                    </ul>
                </div>
                
<?php if(isset($_SESSION['loggedin'])):?>
                <div class="d-flex align-items-center">
                <div class="dropdown"> 
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> 
                <img src="img/default_pfp.jpg" class="rounded-circle" height="25"     alt="Black and White Portrait of a Man" loading="lazy" /> 
                </a> 
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar" > 
                    <li>     
                        <a class="dropdown-item" href="#">My profile</a> 
                    </li> 
                    <li>     
                        <a class="dropdown-item" href="#">Settings</a> 
                    </li> 
                    <li>     
                        <a class="dropdown-item" href="#">Logout</a> 
                    </li> 
                </ul>
                </div>
                </div>
<?php elseif(!isset($_SESSION['loggedin'])):?>
                <div class="d-flex align-items-center">
                    <a href="#">
 
<!-- todo: javascript tab se otvori i ako prodje refreshuje se stranica -->

                        <p style="margin:0px">Login/Register</p>
                    </a> 

                </div>
    <?php endif;?>
            </div>
            </nav>
        </header>













