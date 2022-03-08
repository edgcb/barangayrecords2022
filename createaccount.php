<?php

require_once('logo.php')

// Template from:
// https://mdbootstrap.com/docs/standard/extended/registration/

?>

<head>
    <link rel="stylesheet" a href="bootstrap-5.1.1-dist/css/bootstrap.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDBootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />


    <!-- MDBootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

    <link rel="stylesheet" href="createaccount.css">

    <title>
        Create Account - Barangay Records Management System
    </title>
</head>

<!-- Registration Page -->

<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Create Account</h3>
                        <form action="createaccountvalidate.php" method="POST" autocomplete="off">

                            <?php
                            // Empty Fields
                            if (isset($_GET['empty'])) {
                                $Message = $_GET['empty'];
                                $Message = "Please fill out empty fields";
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php echo $Message ?>
                                </div>
                            <?php
                            }

                            ?>


                            <!-- Invalid Character -->
                            <?php

                            if (isset($_GET['invalid'])) {
                                $Message = $_GET['invalid'];
                                $Message = "Invalid Characters.";
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php echo $Message ?>
                                </div>
                            <?php
                            }

                            ?>


                            <!-- Invalid Email -->
                            <?php

                            if (isset($_GET['VerifyEmail'])) {
                                $Message = $_GET['VerifyEmail'];
                                $Message = "The email you have entered is invalid.";
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php echo $Message ?>
                                </div>
                            <?php
                            }

                            ?>

                            <!-- Invalid Email (Already Taken) -->
                            <?php

                            if (isset($_GET['EmailTaken'])) {
                                $Message = $_GET['EmailTaken'];
                                $Message = "The email address you have provided was already taken. Please enter another email address";
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php echo $Message ?>
                                </div>
                            <?php
                            }

                            ?>

                            <!-- Retype Password -->
                            <?php

                            if (isset($_GET['repeatpassword'])) {
                                $Message = $_GET['repeatpassword'];
                                $Message = "Password does not match. Please try again";
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php echo $Message ?>
                                </div>
                            <?php
                            }

                            ?>

                            <!-- Successfully Registered -->
                            <?php
                            if (isset($_GET['successful'])) {
                                $Message = $_GET['successful'];
                                $Message = "You have successfully registered! You may now <a href='index.php' title='Barangay Records Management System'>Log in</a>";
                            ?>
                                <div class="alert alert-success text-center">
                                    <?php echo $Message ?>
                                </div>
                            <?php
                            }

                            ?>
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="name" id="name" class="form-control form-control-lg" />
                                        <label class="form-label" for="name">Name</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" id="contact" name="contact" class="form-control form-control-lg" />
                                        <label class="form-label" maxlength="13" for="contact">Contact No.</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 ">

                                    <div class="mb-2 pb-1"> Sex </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="sex" value="Male" />
                                        <label class="form-check-label" for="sex">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="sex" value="Female" />
                                        <label class="form-check-label" for="sex">Female</label>
                                    </div>

                                    <!-- d-flex align-items-center -->

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                        <label for="birthdate" name="birthdate" class="form-label"> Birthdate (click the calendar button on the right) </label>
                                        <input type="date" name="birthdate" class="form-control form-control-lg" id="birthdate" />
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="email"> Email address </label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="password" name="password" id="password" class="form-control form-control-lg amber-border" />
                                        <label class="form-label" for="password"> Password </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                                        <label class="form-label" for="address">Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="password" name="repeatpassword" id="repeatpassword" class="form-control form-control-lg amber-border" />
                                        <label class="form-label" for="repeatpassword"> Repeat Password </label>

                                        <script>
                                            document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                                new mdb.Input(formOutline).update();
                                            });
                                        </script>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 pb-1 d-flex align-items-center justify-content-center font-weight-bold"> User Type </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">


                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="usertype" id="usertype" value="Captain" />
                                        <label class="form-check-label" for="usertype">Brgy. Captain</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="usertype" id="usertype" value="Secretary" />
                                        <label class="form-check-label" for="usertype">Brgy. Secretary</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="usertype" id="usertype" value="Treasurer" />
                                        <label class="form-check-label" for="usertype">Brgy. Treasurer</label>
                                    </div>

                                </div>
                            </div>


                            <div class="mt-4 pt-2">

                                <button class="btn btn-primary pr-5 btn-lg" name="register" value="Submit" class="" style="width: 110px;"> Sign up </button>
                                <a class="btn btn-danger pl-5  btn-lg" style="width: 100px;" href="index.php" role="button">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>

</html>