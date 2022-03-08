<?php
require_once("../dbconnection.php");
require_once("logo.php");

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Treasurer') {
    }
} else {
    header("location: index.php");
}

$id = $_GET['fetchID'];
$query = "SELECT * from payments where id = '" . $id . "'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $Typeofpayment = $row['type_of_payment'];
    $Amount = $row['amount'];
    $Date = $row['date'];
    $issue_receipt = $row['issue_receipt'];
}

?>

<head>
    <link rel="stylesheet" a href="../bootstrap-5.1.1-dist/css/bootstrap.css" />
    <title>
        Edit Payment Record - Barangay Records Management System
    </title>
</head>

<body class=text-dark>
    <div class="col-lg-3 m-4 p-3">
        <p class="fs-2"> Edit Payment Record </p>
    </div>

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

    <!-- Successfully Registered -->
    <?php
    if (isset($_GET['successful'])) {
        $Message = $_GET['successful'];
        $Message = "Payment record has been successfully updated";
    ?>
        <div class="alert alert-success text-center">
            <?php echo $Message ?>
        </div>
    <?php
    }

    ?>

    <div class="card-body">
        <div class="row justify-content-center mt-auto">
            <div class="col-6" style="width: 500px;">
                <form action="editpaymentrecordvalidate.php?id=<?php echo $id ?>" method="POST">
                    <label> Type of Payment </label>
                    <br>
                    <div class="btn-group btn-group-toggle mt-2" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="type_of_payment"  <?php if ($Typeofpayment == "Brgy. Clearance") echo "checked"; ?>  value="Brgy. Clearance" autocomplete="off"> Brgy. Clearance
                        </label>
                        <label class="btn btn-success">
                            <input type="radio" name="type_of_payment" <?php if ($Typeofpayment == "Tax Payment") echo "checked"; ?> value="Tax Payment" autocomplete="off"> Tax Payment
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="type_of_payment" <?php if ($Typeofpayment == "Business Permit") echo "checked"; ?> value="Business Permit" autocomplete="off"> Business Permit
                        </label>
                        <label class="btn btn-success">
                            <input type="radio" name="type_of_payment" <?php if ($Typeofpayment == "Indigency Certificate") echo "checked"; ?>  value="Indigency Certificate" autocomplete="off"> Indigency Certificate
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="type_of_payment"  <?php if ($Typeofpayment == "Cedula") echo "checked"; ?>  value="Cedula" autocomplete="off"> Cedula
                        </label>
                    </div>

                    <label>Amount*</label>
                    <input type="text" name="amount" placeholder="Amount of Payment" class="form-control mb-2" value="<?php echo $Amount ?>">

                    <label>Date*</label>
                    <input type="date" name="date" placeholder="Date" class="form-control mb-2" value="<?php echo $Date ?>">

                    <label>Issued Receipt*</label>
                    <br>
                    <div class="btn-group btn-group-toggle mt-2" data-toggle="buttons">
                        <label class="btn btn-success">
                            <input type="radio" name="issue_receipt" <?php if ($issue_receipt == "Yes") echo "checked"; ?> value="Yes" autocomplete="off"> Yes
                        </label>
                        <label class="btn btn-danger">
                            <input type="radio" name="issue_receipt" <?php if ($issue_receipt == "No") echo "checked"; ?> value="No" autocomplete="off"> No
                        </label>
                    </div>
                    <p class="text-danger"> *Required fields </p>
            </div>
            <br>
            <div class="btn-toolbar row justify-content-center">
                <button class="btn btn-primary pr-5" name="editpaymentrecord" class="" style="width: 100px;"> Confirm </button>
                <div class="w-25"></div>
                <a class="btn btn-danger pl-5" style="width: 100px;" href="financialrecords.php" role="button">Back</a>
                </form>
            </div>
        </div>