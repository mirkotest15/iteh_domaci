<?php 
require "static/header.php";
require "dbBroker.php";
require "model/user.php";

# check if user is logged in -> sto ovde nije tolko bitno, bitnije je na forum.php

# check if there is any post data
# if its login, send user to forum
if ((isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])) || (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['submit']))) {
    $name = $_POST['username'];
    $password = $_POST['password'];

    if($_POST['submit'] == 'login')
    {    
        $rs = User::logIn($name, $password, $conn);

        if ($rs->num_rows == 1) {
            echo "Uspesno ste se prijavili";
            $_SESSION['loggeduser'] = "prijavljen";
            $result = $rs->fetch_row();
            $_SESSION['user_id'] = $result[0];
            $_SESSION['admin'] = $result[3];
            $_SESSION['email'] = $result[4];
            $_SESSION['username'] = $name;
            header('Location: forum.php');
            exit();
        } else {
            //promeni 
            echo '<script type="text/javascript">alert("Pogresni podaci za login");
                        window.location.href = "http://localhost/iteh/";</script>';
            exit();
        }
    }
    elseif($_POST['submit'] == 'register')
    {
        $email = $_POST['email'];
        $rs = User::register($name, $password, $email, $conn);

        echo "Uspesno ste se Registrovali!";
        header('Location: index.php');
        exit();
    }
    else
    {
        echo $_POST['submit'];
    }

}
else
{

}

?>
<!-- mid section -->

<!-- ovde 
    1. home page -> Main part; Login/Register; About
    2. forum -> CRUD nad postovima
    3. posts -> PostContent; Comments
    4. profile -> Image; Info
    5. api/ create read update delete
-->

<!-- Main -> lep dizajn showcase -->
<div class="container" style="border:solid 1px black; width:100%;">
    <h1 style="text-align:center; font-family:fantasy;">MN Forum</h1>
</div>
<!-- About -> o forumu -->
<div class="container" style="border:solid 1px black; width:100%;">
    <h1 style="text-align:center; font-family: fantasy;">About</h1>
</div>
<!-- Login -> samo login i register forme -->
<div class="container" style="border:solid 1px black; width:100%;">
    <section class="h-100 h-custom gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
                <div class="row g-0">
    <!-- Login -->
                <div class="col-lg-6">
                    <form method="post" action="">
                        <div class="p-5">
                        <h3 class="fw-normal mb-5" style="color: #4835d4;">Login</h3>

                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="log_usrnm">Username:</label>
                                <input type="text" name="username" id="log_usrnm" class="form-control form-control-lg" />
                            </div>

                            </div>
                            <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <label class="form-label" for="log_pwd">Password:</label>
                                <input type="password" name="password" id="log_pwd" class="form-control form-control-lg" />
                            </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="login">
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
    <!-- Register -->
                <div class="col-lg-6">
                    <form method="post" action="" id="reg_form">
                        <div class="p-5">
                        <h3 class="fw-normal mb-5">Register</h3>

                        <div class="row">
                            <div class="col-md-5 mb-4 pb-2">

                            <div class="form-outline form-white">
                                <label class="form-label" for="reg_usrnm">Username:</label>
                                <input type="text" name="username" id="reg_usrnm" class="form-control form-control-lg" />
                            </div>

                            </div>
                            <div class="col-md-7 mb-4 pb-2">

                            <div class="form-outline form-white">
                                <label class="form-label" for="reg_pwd">Password:</label>
                                <input type="password" name="password" id="reg_pwd" class="form-control form-control-lg" />
                            </div>

                            </div>
                        </div>

                        <div class="mb-4 pb-2">
                            <div class="form-outline form-white">
                            <label class="form-label" for="reg_email">Email:</label>
                            <input type="text" name="email" id="reg_email" class="form-control form-control-lg" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="register">
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

</div>

<script type="">
    // OVDE PROVERI FORM VALIDATION

    const username = document.querySelector('#reg_usrnm');
    const email = document.querySelector('#reg_email');
    const password = document.querySelector('#reg_pwd');
    
    const form = document.querySelector('#reg_form');

    const isRequired = value => value === '' ? false : true;
    const isBetween = (length, min, max) => length < min || length > max ? false : true;
    const isEmailValid = (email) => {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };
    const isPasswordSecure = (password) => {
        const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        return re.test(password);   
    };

//event listener on every input box, while typing, it checks
    // username must not be empty

    // password must not be empty
    // email must not be empty
    // email must follow mail address rules

</script>

<!-- footer -->
<?php 
require "static/footer.php"
?>