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
        Barangay Clearance - Barangay Records Management
    </title>
</head>

<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Barangay Clearance</h3>
                        <form action="../mpdf.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="firstname_clearance" name="firstname_clearance" value="<?php echo $Firstname ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="firstname_clearance">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="middlename_clearance" name="middlename_clearance" value="<?php echo $Middlename ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="middlename_clearance">Middle Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="lastname_clearance" name="lastname_clearance" value="<?php echo $Lastname ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="lastname_clearance">Last Name</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <?php

                                        $calculatedAge = (date('Y') - date('Y', strtotime($Birthdate)));

                                        ?>
                                        <input type="number" id="age_clearance" name="age_clearance" value="<?php echo $calculatedAge; ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="age_clearance">Age</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">


                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="cedula_clearance" name="cedula_clearance" class="form-control form-control-lg" />
                                        <label class="form-label" for="cedula_clearance">Community Tax No.</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="cedulaissued_clearance" name="cedulaissued_clearance" class="form-control form-control-lg" />
                                        <label class="form-label" for="cedulaissued_clearance">Issued at (Community Tax)</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="">
                                        <select id="monthcedula" name="monthcedula" class="btn-light btn-outline-dark form-control form-control-md">
                                            <option value="" disabled selected>Month</option>
                                            <option value="1"> January </option>
                                            <option value="2"> February </option>
                                            <option value="3"> March </option>
                                            <option value="4"> April </option>
                                            <option value="5"> May </option>
                                            <option value="6"> June </option>
                                            <option value="7"> July </option>
                                            <option value="8"> August </option>
                                            <option value="9"> September </option>
                                            <option value="10"> October </option>
                                            <option value="11"> November </option>
                                            <option value="12"> December </option>
                                        </select>
                                        <label class="form-label" for="monthcedula"></label>
                                        <div class="form-helper">Community Tax Certificate Issue Date (Month)</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 ">
                                    <div class="">
                                        <select id="daycedula" name="daycedula" class="btn-light btn-outline-dark form-control form-control-md">
                                            <option value="" disabled selected>Day</option>
                                            <option value="1"> 1 </option>
                                            <option value="2"> 2 </option>
                                            <option value="3"> 3 </option>
                                            <option value="4"> 4 </option>
                                            <option value="5"> 5 </option>
                                            <option value="6"> 6 </option>
                                            <option value="7"> 7 </option>
                                            <option value="8"> 8 </option>
                                            <option value="9"> 9 </option>
                                            <option value="10"> 10 </option>
                                            <option value="11"> 11 </option>
                                            <option value="12"> 12 </option>
                                            <option value="13"> 13 </option>
                                            <option value="14"> 14 </option>
                                            <option value="15"> 15 </option>
                                            <option value="16"> 16 </option>
                                            <option value="17"> 17 </option>
                                            <option value="18"> 18 </option>
                                            <option value="19"> 19 </option>
                                            <option value="20"> 20 </option>
                                            <option value="21"> 21 </option>
                                            <option value="22"> 22 </option>
                                            <option value="23"> 23 </option>
                                            <option value="24"> 24 </option>
                                            <option value="25"> 25 </option>
                                            <option value="26"> 26 </option>
                                            <option value="27"> 27 </option>
                                            <option value="28"> 28 </option>
                                            <option value="29"> 29 </option>
                                            <option value="30"> 30 </option>
                                            <option value="31"> 31 </option>
                                        </select>
                                        <label class="form-label" for="daycedula"></label>
                                        <div class="form-helper">Community Tax Certificate Issue Date (Day)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="">
                                        <select id="yearcedula" name="yearcedula" class="btn-light btn-outline-dark form-control form-control-md">
                                            <option value="" disabled selected>Year</option>
                                            <option value="2021"> 2021 </option>
                                            <option value="2022"> 2022 </option>
                                            <option value="2023"> 2023 </option>
                                            <option value="2024"> 2024 </option>
                                            <option value="2025"> 2025 </option>
                                            <option value="2026"> 2026 </option>
                                            <option value="2027"> 2027 </option>
                                            <option value="2028"> 2028 </option>
                                            <option value="2029"> 2029 </option>
                                            <option value="2030"> 2030 </option>
                                            <option value="2031"> 2031 </option>
                                            <option value="2032"> 2032 </option>
                                            <option value="2033"> 2033 </option>
                                            <option value="2034"> 2034 </option>
                                            <option value="2035"> 2035 </option>
                                            <option value="2036"> 2036 </option>
                                            <option value="2037"> 2037 </option>
                                            <option value="2038"> 2038 </option>
                                            <option value="2039"> 2039 </option>
                                            <option value="2040"> 2040 </option>
                                        </select>
                                        <label class="form-label" for="yearcedula"></label>
                                        <div class="form-helper">Community Tax Certificate Issue Date (Year)</div>
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
                                        <input type="text" id="purpose_clearance" name="purpose_clearance" class="form-control form-control-lg" />
                                        <label class="form-label" for="purpose_clearance">Purpose</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <input type="text" id="ornumber_clearance" name="ornumber_clearance" class="form-control form-control-lg" />
                                        <label class="form-label" for="ornumber_clearance">OR Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">




                            </div>

                            <div class="row">
                                <div class="col-md-6 mt-4">
                                        <div class="form-outline">
                                            <input type="number" id="amount" name="amount_clearance" class="form-control form-control-lg" />
                                            <label class="form-label" for="amount_clearance">Amount Paid</label>
                                        </div>
                                    </div>
                                    <div class="col mt-4">
                                        <div class="form-outline">
                                            <textarea class="form-control" name="address_clearance" id="address_clearance" rows="3"><?php echo $Address; ?></textarea>
                                            <label class="form-label" for="address_clearance">Address</label>
                                        </div>
                                    </div>


                                </div>
                                <script>
                                    document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                        new mdb.Input(formOutline).update();
                                    });
                                </script>

                                <div class="row mt-2">
                                    <div class="mb-2 pb-1 d-flex align-items-center justify-content-center">Civil Status </div>
                                    <div class="col-12 d-flex align-items-center justify-content-center">


                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="civilstatus_clearance" <?php if ($Civilstatus == "Single") echo "checked"; ?> id="civilstatus_clearance" value="Single" />
                                            <label class="form-check-label" for="civilstatus_clearance">Single</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="civilstatus_clearance" <?php if ($Civilstatus == "Married") echo "checked"; ?> id="civilstatus_clearance" value="Married" />
                                            <label class="form-check-label" for="civilstatus_clearance">Married</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="civilstatus_clearance" <?php if ($Civilstatus == "Widowed") echo "checked"; ?> id="civilstatus_clearance" value="Widowed" />
                                            <label class="form-check-label" for="civilstatus_clearance">Widowed</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="civilstatus_clearance" <?php if ($Civilstatus == "Divorced") echo "checked"; ?> id="civilstatus_clearance" value="Divorced" />
                                            <label class="form-check-label" for="civilstatus_clearance">Divorced</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-5 pt-2 mb-5">
                                    <button class="btn btn-success pr-5 btn-lg" name="generate_clearance" class="" style="width: 140px;"> Generate </button>
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