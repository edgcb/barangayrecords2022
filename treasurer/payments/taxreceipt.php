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
        Tax Receipt - Barangay Records Management
    </title>
</head>

<!DOCTYPE html>


<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Tax Receipt</h3>
                        <form action="mpdf.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="agency_taxreceipt" id="agency_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="agency_taxreceipt">Agency</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="payor_taxreceipt" id="payor_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="payor_taxreceipt">Payor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mt-5">
                                    <div class="form-outline">
                                        <input type="text" name="fund_taxreceipt" id="fund_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="fund_taxreceipt">Fund</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 ">

                                    <div class="mb-2 pb-1"> Payment Method </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cash_taxreceipt" id="cash_taxreceipt" value="Cash" />
                                        <label class="form-check-label" for="sex">Cash</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="check_taxreceipt" id="check_taxreceipt" value="Check" />
                                        <label class="form-check-label" for="sex">Check</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="moneyorder_taxreceipt" id="moneyorder_taxreceipt" value="Money Order" />
                                        <label class="form-check-label" for="sex">Money Order</label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col mb-3 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="natureofcollection_taxreceipt" id="natureofcollection_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="natureofcollection_taxreceipt">Nature of Collection 1</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="accountcode_taxreceipt" id="accountcode_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="accountcode_taxreceipt">Account Code 1</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="amount1_taxreceipt" id="amount1_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="amount1_taxreceipt">Amount 1</label>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col mb-3 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="natureofcollection2_taxreceipt" id="natureofcollection2_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="natureofcollection2_taxreceipt">Nature of Collection 2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="accountcode2_taxreceipt" id="accountcode2_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="accountcode2_taxreceipt">Account Code 2</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="amount2_taxreceipt" id="amount2_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="amount2_taxreceipt">Amount 2</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col mb-3 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="natureofcollection3_taxreceipt" id="natureofcollection3_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="natureofcollection3_taxreceipt">Nature of Collection 3</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="accountcode3_taxreceipt" id="accountcode3_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="accountcode3_taxreceipt">Account Code 3</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="amount3_taxreceipt" id="amount3_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="amount3_taxreceipt">Amount 3</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col mb-3 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="natureofcollection4_taxreceipt" id="natureofcollection4_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="natureofcollection4_taxreceipt">Nature of Collection 4</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="accountcode4_taxreceipt" id="accountcode4_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="accountcode4_taxreceipt">Account Code 4</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="amount4_taxreceipt" id="amount4_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="amount4_taxreceipt">Amount 4</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="draweebank_taxreceipt" id="draweebank_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="draweebank_taxreceipt">Drawee Bank</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="number_taxreceipt" id="number_taxreceipt" class="form-control form-control-lg" />
                                        <label class="form-label" for="number_taxreceipt">Number (Drawee Bank)</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col pb-2">
                                    <div class="form-outline">
                                        <input type="date" id="date_taxreceipt" name="date_taxreceipt" class="form-control form-control-lg" />
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

                                <button class="btn btn-success pr-5 btn-lg" name="generate_taxreceipt" class="" style="width: 140px;"> Generate </button>
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