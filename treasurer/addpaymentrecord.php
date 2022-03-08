<?php
// Template from:
// https://mdbootstrap.com/docs/standard/extended/registration/

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Treasurer') {
    }
} else {
    header("location: index.php");
}

require_once("../dbconnection.php");
require_once("logo.php");
?>

<head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDBootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />


    <!-- MDBootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

    <link rel="stylesheet" href="addpaymentrecord.css">

    <title>
        Add Payment Record - Barangay Records Management System
    </title>
</head>


<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add Payment Record</h3>
                        <form action="addpaymentrecordvalidate" method="POST">

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

                            <!-- Successfully Added -->
                            <?php
                            if (isset($_GET['successful'])) {
                                $Message = $_GET['successful'];
                                $Message = "Payment record has been successfully added";
                            ?>
                                <div class="alert alert-success text-center">
                                    <?php echo $Message ?>
                                </div>
                            <?php
                            }

                            ?>

                            <div class="row mt-2 mb-2">
                                <div class="mb-2 pb-1 d-flex align-items-center justify-content-center">Type of Payment </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">


                                    <div class="form-check form-check-inline mr-2">
                                        <input class="form-check-input" type="radio" name="type_of_payment" id="type_of_payment" value="Brgy. Clearance" />
                                        <label class="form-check-label" for="type_of_payment"> Brgy. Clearance</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_of_payment" id="type_of_payment" value="Tax Payment" />
                                        <label class="form-check-label" for="type_of_payment">Tax Payment</label>
                                    </div>


                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_of_payment" id="type_of_payment" value="Business Permit" />
                                        <label class="form-check-label" for="type_of_payment">Business Permit</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_of_payment" id="type_of_payment" value="Indigency Certificate" />
                                        <label class="form-check-label" for="type_of_payment">Indigency Certificate</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_of_payment" id="type_of_payment" value="Cedula" />
                                        <label class="form-check-label mr-5" for="type_of_payment">Cedula</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="amount" id="amount" class="form-control form-control-lg" />
                                        <label class="form-label" for="amount">Amount</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-2">
                                <div class="col pb-2">
                                    <div class="form-outline">
                                        <input type="date" name="date" id="date" class="form-control form-control-lg" />
                                        <label class="form-helper" for="date">Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2 mb-2">
                                <div class="mb-2 pb-1 d-flex align-items-center justify-content-center">Issued Receipt </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">


                                    <div class="form-check form-check-inline mr-2">
                                        <input class="form-check-input" type="radio" name="issue_receipt" id="issue_receipt" value="Yes" />
                                        <label class="form-check-label" for="issue_receipt">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="issue_receipt" id="issue_receipt" value="No" />
                                        <label class="form-check-label" for="issue_receipt">No</label>
                                    </div>
                                </div>
                            </div>
                            <script>
                                document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                    new mdb.Input(formOutline).update();
                                });
                            </script>
                            <div class="mt-5 pt-2 mb-5">

                                <button class="btn btn-success pr-5 btn-lg" name="addpaymentrecord" class="" style="width: 100px;"> Add </button>
                                <a class="btn btn-danger pl-5  btn-lg" style="width: 100px;" href="financialrecords.php" role="button">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>