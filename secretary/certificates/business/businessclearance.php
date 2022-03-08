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
    $Address = $row['address'];
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
    <!-- Template CSS -->
    <link rel="stylesheet" href="../certificate.css">
    <title>
        Business Clearance - Barangay Records Management
    </title>
</head>

<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Business Clearance</h3>
                        <form action="../mpdf.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">

                                        <input type="text" name="name_busclearance" id="name_busclearance" class="form-control form-control-lg" />
                                        <label class="form-label" for="name_busclearance">Business Name / Trade Activity</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <textarea class="form-control" name="address_busclearance" id="address_busclearance" rows="3"></textarea>
                                        <label class="form-label" for="address_busclearance">Address</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="type_busclearance" id="type_busclearance" class="form-control form-control-lg" />
                                        <label class="form-label" for="type_busclearance">Type of Business</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="file" name="uploadfile" id="uploadfile" class="form-control form-control-lg" />
                                        <label class="form-label" for="uploadfile"> </label>
                                        <div class="form-helper">Photo</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-outline">
                                        <input type="text" id="owner_busclearance" name="owner_busclearance" value="<?php echo $Firstname, $space, $Middlename, $space, $Lastname ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="owner_busclearance">Proprietor / Operator / Manager</label>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-2">

                                    <div class="form-outline">
                                        <textarea class="form-control" name="resaddress_busclearance" id="resaddress_busclearance" rows="3"><?php echo $Address ?></textarea>
                                        <label class="form-label" for="resaddress_busclearance">Residence Address</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <input type="text" id="purpose_busclearance" name="purpose_busclearance" class="form-control form-control-lg" />
                                        <label class="form-label" for="purpose_busclearance">Applied for</label>
                                    </div>
                                </div>

                                <div class="col-md-6 pb-2">

                                    <div class="form-outline">
                                        <input type="text" id="res_cert_busclearance" name="res_cert_busclearance" class="form-control form-control-lg" />
                                        <label class="form-label" for="res_cert_busclearance">Res. Cert No.</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <input type="text" id="or_busclearance" name="or_busclearance" class="form-control form-control-lg" />
                                        <label class="form-label" for="or_busclearance">OR No.</label>
                                    </div>
                                </div>

                                <div class="col-md-6 pb-2">

                                    <div class="form-outline">
                                        <input type="text" id="amount_busclearance" name="amount_busclearance" class="form-control form-control-lg" />
                                        <label class="form-label" for="amount_busclearance">Amount Paid</label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 d-flex align-items-center justify-content-center">

                                        <div class="form-outline">
                                            <input type="text" id="controlno_busclearance" name="controlno_busclearance" class="form-control form-control-lg" />
                                            <label class="form-label" for="controlno_busclearance">Control No.</label>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                        new mdb.Input(formOutline).update();
                                    });
                                </script>

                            </div>
                            <div class="mt-5 pt-2 mb-5">

                                <button class="btn btn-success pr-5 btn-lg" name="generate_busclearance" class="" style="width: 140px;"> Generate </button>
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