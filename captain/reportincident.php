<?php

//  Template from:
//  https://mdbootstrap.com/docs/standard/extended/registration/

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Captain') {
    }
} else {
    header("location: ../index.php");
}

require_once("../dbconnection.php");
require_once("logo.php");
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

    <link rel="stylesheet" href="reportincident.css">

    <title>
        Report Incident - Barangay Records Management System
    </title>
</head>

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

    <body>
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Report Incident</h3>
                            <form action="reportincidentvalidate.php" method="POST" autocomplete="off">

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
                                    <div class="col-md-6 mb-4 ">

                                        <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                            <label for="date" name="date" class="form-date"> Date of Incident </label>
                                            <input type="date" name="date" class="form-control form-control-lg" id="date" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div id="cont" class="md-form md-outline input-with-post-icon time">
                                        <label for="time" name="time" class="form-time"> Time </label>
                                            <input type="time" name="time" id="time" class="form-control form-control-lg" />

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4" style="width:1000px">
                                        <div class="form-outline">
                                            <input type="text" name="location" id="location" class="form-control form-control-lg" />
                                            <label class="form-label" for="first_name">Location</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4" style="width:1000px">
                                        <div class="form-outline">
                                            <input type="text" name="type_of_incident" id="type_of_incident" class="form-control form-control-lg" />
                                            <label class="form-label" for="type_of_incident">Type of Incident</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="involved1" name="involved1" class="form-control form-control-lg" />
                                            <label class="form-label" for="involved1">Involved #1</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="involved2" name="involved2" class="form-control form-control-lg" />
                                            <label class="form-label" for="involved2">Involved #2 (optional)</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="involved3" name="involved3" class="form-control form-control-lg" />
                                            <label class="form-label" for="involved3">Involved #3 (optional)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="involved4" name="involved4" class="form-control form-control-lg" />
                                            <label class="form-label" for="involved4">Involved #4 (optional)</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="involved5" name="involved5" class="form-control form-control-lg" />
                                            <label class="form-label" for="involved5">Involved #5 (optional)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="involved6" name="involved6" class="form-control form-control-lg" />
                                            <label class="form-label" for="involved6">Involved #6 (optional)</label>

                                        
                                        </div>
                                    </div>
                                    <div class="col mb-4 pb-2">

                                    <div class="form-outline">
                                        <textarea class="form-control" name="details" id="details" rows="3"></textarea>
                                        <label class="form-label" for="details">Details of Incident</label>
                                        <script>
                                                document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                                    new mdb.Input(formOutline).update();
                                                });
                                            </script>
                                        </div>
                                <div class="mt-4 pt-2">

                                    <button class="btn btn-primary pr-5 btn-lg" name="reportincident" value="Submit" class="" style="width: 175px;"> Report Incident </button>
                                    <a class="btn btn-danger pl-5  btn-lg" style="width: 100px;" href="incidentreports.php" role="button">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>