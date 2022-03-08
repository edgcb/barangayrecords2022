<?php
// Template from:
// https://mdbootstrap.com/docs/standard/extended/registration/

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Treasurer') {
    }
} else {
    header("location: ../../index.php");
}

require_once('logo.php');
require_once("../../dbconnection.php");

?>

<head>
     <!-- Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDBootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDBootstrap JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

    <link rel="stylesheet" href="receipt.css">
    <title>
        Brgy. Certificate Payments Receipt - Barangay Records Management
    </title>
</head>

<!DOCTYPE html>


<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Brgy. Certificate Payments Receipt</h3>
                        <form action="mpdf.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="agency_certreceipt" id="agency_certreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="agency_certreceipt">Agency</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="payor_certreceipt" id="payor_certreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="payor_certreceipt">Payor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mt-5">
                                    <div class="form-outline">
                                        <input type="text" name="fund_certreceipt" id="fund_certreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="fund_certreceipt">Fund</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 ">

                                    <div class="mb-2 pb-1"> Payment Method </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cash_certreceipt" id="cash_certreceipt" value="Cash" />
                                        <label class="form-check-label" for="cash_certreceipt">Cash</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="check_certreceipt" id="check_certreceipt" value="Check" />
                                        <label class="form-check-label" for="check_certreceipt">Check</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="moneyorder_certreceipt" id="moneyorder_certreceipt" value="Money Order" />
                                        <label class="form-check-label" for="moneyorder_certreceipt">Money Order</label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col mb-3 pb-2">
                                <div class="">
                                        <select id="cert1_certreceipt" name="cert1_certreceipt" class="btn-light btn-outline-dark form-control form-control-md">
                                            <option value="" disabled selected>Choose Certficate</option>
                                            <option value="">-- INDIVIDUAL --</option>
                                            <option value="barangaycert_certreceipt"> Barangay Certification </option>
                                            <option value="barangayclearance_certreceipt"> Barangay Clearance </option>
                                            <option value="indigencycert_certreceipt"> Indigency Certificate </option>
                                            <option value="certresidency_certreceipt"> Certificate of Residency </option>
                                            <option value="healthcertificate_certreceipt"> Health Certificate </option>
                                            <option value="goodmoral_certreceipt"> Certificate of Good Moral </option>
                                            <option value="cedula_certreceipt"> Cedula </option>
                                            <option value=""> -- BUSINESS -- </option>
                                            <option value="busclearance_certreceipt"> Business Clearance </option>
                                            <option value="cessation_certreceipt"> Cessation of Business </option>
                                        </select>
                                        <label class="form-label" for="cert1_certreceipt"></label>
                                        <div class="form-helper">Certificate</div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="draweebank_certreceipt" id="draweebank_certreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="draweebank_certreceipt">Drawee Bank</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="number_certreceipt" id="number_certreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="number_certreceipt">Number (Drawee Bank)</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col pb-2">
                                    <div class="form-outline">
                                        <input type="date" id="date_certreceipt" name="date_certreceipt" class="form-control form-control-lg" />
                                        <div class="form-helper">Date (Drawee Bank)</div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                    new mdb.Input(formOutline).update();
                                });
                            </script>
                            <div class="mt-5 pt-2 mb-5">

                                <button class="btn btn-success pr-5 btn-lg" name="generate_certreceipt" class="" style="width: 140px;"> Generate </button>
                                <a class="btn btn-danger pl-5  btn-lg" style="width: 100px;" href="../barangaypayments.php" role="button">Back</a>
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