<?php 
require "static/header.php";
require "dbBroker.php";
require "model/user.php";

# check if user is logged in -> sto ovde nije tolko bitno, bitnije je na forum.php

# check if there is any post data
# if its login, send user to forum


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
                <div class="col-lg-6">
                    <form method="post" action="">
                        <div class="p-5">
                        <h3 class="fw-normal mb-5" style="color: #4835d4;">Login</h3>

                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <input type="text" id="form3Examplev2" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Examplev2">Username</label>
                            </div>

                            </div>
                            <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <input type="password" id="form3Examplev3" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Examplev3">Password</label>
                            </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit">
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
    <!-- Register -->
                <div class="col-lg-6">
                    <form method="post" action="">
                        <div class="p-5">
                        <h3 class="fw-normal mb-5">Register</h3>

                        <div class="row">
                            <div class="col-md-5 mb-4 pb-2">

                            <div class="form-outline form-white">
                                <input type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Examplea4">Username</label>
                            </div>

                            </div>
                            <div class="col-md-7 mb-4 pb-2">

                            <div class="form-outline form-white">
                                <input type="text" id="form3Examplea5" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Examplea5">Password</label>
                            </div>

                            </div>
                        </div>

                        <div class="mb-4 pb-2">
                            <div class="form-outline form-white">
                            <input type="text" id="form3Examplea6" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Examplea6">Email</label>
                            </div>
                        </div>

                        <input type="submit">

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

<!-- footer -->
<?php 
require "static/footer.php"
?>