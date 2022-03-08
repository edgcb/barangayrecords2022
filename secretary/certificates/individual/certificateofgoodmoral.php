<?php
// Template from:
// https://mdbootstrap.com/docs/standard/extended/registration/

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Secretary') {
    }
} else {
    header("location: ../../../index.php");
}

require_once('logo.php');
require_once("../../../dbconnection.php");

$id = $_GET['fetchID'];
$query = "SELECT * from citizen_records where id = '" . $id . "'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $Firstname = $row['first_name'];
    $Middlename = $row['middle_name'];
    $Lastname = $row['last_name'];
    $Sex = $row['sex'];
    $Birthdate = $row['birthdate'];
    $Address = $row['address'];
    $Zone = $row['zone'];
    $Contact = $row['contact'];
    $Civilstatus = $row['civil_status'];
    $Occupation = $row['occupation'];
    $Citizenship = $row['citizenship'];
    $space = " ";
    $comma = ",";
}

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

    <link rel="stylesheet" href="../certificate.css">

    <title>
        Certificate of Good Moral - Barangay Records Management
    </title>
</head>

<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Certificate of Good Moral</h3>
                        <form action="../mpdf.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="row">
                            <div class="col-md-6 mb-4">
                                    <div class="form-outline">

                                        <input type="text" name="firstname_goodmoral" value="<?php echo $Firstname ?>" id="firstname_goodmoral" class="form-control form-control-lg" />
                                        <label class="form-label" for="firstname_goodmoral">First Name</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="middlename_goodmoral" value="<?php echo $Middlename ?>" id="middlename_goodmoral" class="form-control form-control-lg" />
                                        <label class="form-label" for="middlename_goodmoral">Middle Name</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                        <input type="text" name="lastname_goodmoral" value="<?php echo $Lastname ?>" id="lastname_goodmoral" class="form-control form-control-lg" />
                                        <label class="form-label" for="lastname_goodmoral">Last Name</label>
                                    </div>    
                            </div>
                            <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="file" name="uploadfile" id="uploadfile" class="form-control form-control-lg" />
                                        <label class="form-label" for="uploadfile"> </label>
                                        <div class="form-helper">Photo</div>
                                    </div>
                                </div>
                                <div class="col pb-2">
                                    <div class="form-outline">
                                        <input type="text" id="purpose_goodmoral" name="purpose_goodmoral" class="form-control form-control-lg" />
                                        <label class="form-label" for="purpose_goodmoral">Purpose</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pb-2 mt-4">

                                    <div class="form-outline">
                                        <textarea class="form-control" name="address_goodmoral" id="address_goodmoral" rows="3"><?php echo $Address; ?></textarea>
                                        <label class="form-label" for="address_goodmoral">Address</label>
                                    </div>
                                </div>
                            </div>
                    <div class="row mt-2">
                        <div class="mb-2 pb-1 d-flex align-items-center justify-content-center">Sex </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender_goodmoral" id="gender_goodmoral" <?php if ($Sex == "Male") echo "checked"; ?> value="him" />
                                <label class="form-check-label" for="gender_goodmoral">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender_goodmoral" id="gender_goodmoral" <?php if ($Sex == "Female") echo "checked"; ?> value="her" />
                                <label class="form-check-label" for="gender_goodmoral">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="mb-2 pb-1 d-flex align-items-center justify-content-center">Civil Status </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="civilstatus_goodmoral" <?php if ($Civilstatus == "Single") echo "checked"; ?> id="civilstatus_goodmoral" value="Single" />
                                <label class="form-check-label" for="civilstatus_goodmoral">Single</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="civilstatus_goodmoral" <?php if ($Civilstatus == "Married") echo "checked"; ?> id="civilstatus_goodmoral" value="Married" />
                                <label class="form-check-label" for="civilstatus_goodmoral">Married</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="civilstatus_goodmoral" <?php if ($Civilstatus == "Widowed") echo "checked"; ?> id="civilstatus_goodmoral" value="Widowed" />
                                <label class="form-check-label" for="civilstatus_goodmoral">Widowed</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="civilstatus_goodmoral" <?php if ($Civilstatus == "Divorced") echo "checked"; ?> id="civilstatus_goodmoral" value="Divorced" />
                                <label class="form-check-label" for="civilstatus_goodmoral">Divorced</label>
                            </div>
                            <script>
                                document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                    new mdb.Input(formOutline).update();
                                });
                            </script>
                        </div>
                    </div>

                    <div class="mt-5 pt-2 mb-5">

                        <button class="btn btn-success pr-5 btn-lg" name="generate_goodmoral" class="" style="width: 140px;"> Generate </button>
                        <a class="btn btn-danger pl-5  btn-lg" style="width: 100px;" href="../../barangaycertificates.php" role="button">Back</a>
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