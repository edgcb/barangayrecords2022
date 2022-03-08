<?php
require_once("../dbconnection.php");
require_once("logo.php");

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Captain') {
    }
} else {
    header("location: ../index.php");
}


?>

<head>
    <!-- Bootstrap -->
    <link rel="stylesheet" a href="bootstrap-5.1.1-dist/css/bootstrap.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDBootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <!-- Template -->
    <link rel="stylesheet" href="addcitizen.css">


    <title>
        Add Citizen - Barangay Records Management System
    </title>
</head>

<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add Citizen</h3>
                        <form action="addcitizenvalidate.php" method="POST" autocomplete="off">

                            <!-- If Field/s are Empty -->
                            <?php

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

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">

                                        <input type="text" name="first_name" id="first_name" class="form-control form-control-lg" />
                                        <label class="form-label" for="first_name">First Name</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="middle_name" id="middle_name" class="form-control form-control-lg" />
                                        <label class="form-label" for="first_name">Middle Name</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="last_name" id="last_name" class="form-control form-control-lg" />
                                        <label class="form-label" for="first_name">Last Name</label>
                                    </div>

                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="contact" name="contact" class="form-control form-control-lg" />
                                        <label class="form-label" maxlength="13" for="contact">Contact No.</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="mb-2 pb-1"> Sex </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="sex" value="Male" />
                                        <label class="form-check-label" for="sex">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="sex" value="Female" />
                                        <label class="form-check-label" for="sex">Female</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">

                                    <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                        <label for="birthdate" name="birthdate" class="form-label"> Birthdate (click the calendar button on the right) </label>
                                        <input type="date" name="birthdate" class="form-control form-control-lg" id="birthdate" />
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="mb-2 pb-1 d-flex align-items-center justify-content-center "> Civil Status </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">


                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="civil_status" id="civil_status" value="Single" />
                                        <label class="form-check-label" for="civil_status">Single</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="civil_status" id="civil_status" value="Married" />
                                        <label class="form-check-label" for="civil_status"> Married </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="civil_status" id="civil_status" value="Separated" />
                                        <label class="form-check-label" for="civil_status">Separated</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="civil_status" id="civil_status" value="Widowed" />
                                        <label class="form-check-label" for="civil_status">Widowed</label>
                                    </div>


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="text" name="zone" id="zone" class="form-control form-control-lg" />
                                        <label class="form-label" for="zone"> Zone </label>
                                    </div>



                                </div>

                                <div class="col-md-6 mb-0">
                                    <div class="form-outline">
                                        <input type="text" name="citizenship" id="citizenship" value="<?php echo "Filipino" ?>" class="form-control form-control-lg amber-border" />
                                        <label class="form-label" for="citizenship"> Citizenship </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="occupation" id="occupation" class="form-control form-control-lg amber-border" />
                                        <label class="form-label" for="occupation"> Occupation </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                                        <label class="form-label" for="address">Address</label>
                                        <script>
                                            document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                                new mdb.Input(formOutline).update();
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">

                                <button class="btn btn-success pr-5 btn-lg" name="addcitizen" value="Submit" class="" style="width: 110px;"> Add </button>
                                <a class="btn btn-danger pl-5  btn-lg" style="width: 100px;" href="citizenrecords.php" role="button">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>