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
    $Zone = $row['zone'];
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
        Cessation of Business - Barangay Records Management
    </title>
</head>

<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Cessation of Business</h3>
                        <form action="../mpdf.php?id=<?php echo $id ?>" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="name_cessationbusiness" id="name_cessationbusiness" class="form-control form-control-lg" />
                                        <label class="form-label" for="name_cessationbusiness">Business Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <textarea class="form-control" name="address_cessationbusiness" id="address_cessationbusiness" rows="3"></textarea>
                                        <label class="form-label" for="address_cessationbusiness">Address of Business</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="owner_cessationbusiness" value="<?php echo $Firstname, $space, $Middlename, $space, $Lastname?>" id="owner_cessationbusiness" class="form-control form-control-lg" />
                                        <label class="form-label" for="owner_cessationbusiness">Owner of Business</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 pb-2 mb-4">
                                    <div class="form-outline">
                                        <textarea class="form-control" name="resaddress_cessationbusiness" id="resaddress_cessationbusiness" rows="3"><?php echo $Address ?></textarea>
                                        <label class="form-label" for="resaddress_cessationbusiness">Address of Owner</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 ">
                                    <div class="">
                                        <select id="month_cessation" name="month_cessation" class="btn-light btn-outline-dark form-control form-control-md">
                                            <option value="" disabled selected>Month</option>
                                            <option value="January"> January </option>
                                            <option value="February"> February </option>
                                            <option value="March"> March </option>
                                            <option value="April"> April </option>
                                            <option value="May"> May </option>
                                            <option value="June"> June </option>
                                            <option value="July"> July </option>
                                            <option value="August"> August </option>
                                            <option value="September"> September </option>
                                            <option value="October"> October </option>
                                            <option value="November"> November </option>
                                            <option value="December"> December </option>
                                        </select>
                                        <label class="form-label" for="month_cessation"></label>
                                        <div class="form-helper">Date of Cessation (Month)</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 ">
                                    <div class="">
                                        <select id="day_cessation" name="day_cessation" class="btn-light btn-outline-dark form-control form-control-md">
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
                                        <label class="form-label" for="day_cessation"></label>
                                        <div class="form-helper">Date of Cessation (Day)</div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <input type="text" id="year_cessation" name="year_cessation" class="form-control form-control-lg" />
                                        <label class="form-label" for="year_cessation">Date of Cessation (Year) </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <input type="text" id="purpose_cessationbusiness" name="purpose_cessationbusiness" class="form-control form-control-lg" />
                                        <label class="form-label" for="purpose_cessationbusiness">Purpose</label>
                                    </div>
                                </div>
                            </div>
                            <script>
                                document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                    new mdb.Input(formOutline).update();
                                });
                            </script>


                            <div class="mt-5 pt-2 mb-5">

                                <button class="btn btn-success pr-5 btn-lg" name="generate_cessationbusiness" class="" style="width: 140px;"> Generate </button>
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