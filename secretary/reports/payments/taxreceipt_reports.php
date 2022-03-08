<?php
// Template from:
// Table V03
// https://colorlib.com/wp/bootstrap-tables/

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Secretary') {
    }
} else {
    header("location: ../../../index.php");
}

require_once("../../../dbconnection.php");
require_once("logo.php");

if (isset($_POST['search'])) {
    $searchphrase = $_POST['search'];
    $query = "SELECT * from tax_receipt WHERE payor like '%$searchphrase%' OR nature_of_collection like '%$searchphrase%' OR account_code like '%$searchphrase%' OR payment_method like '%$searchphrase%' OR total_amount like '%$searchphrase%' OR drawee_bank like '%$searchphrase%' OR number_drawee like '%$searchphrase%' OR drawee_date like '%$searchphrase%' OR date_issued like '%$searchphrase%' OR agency like '%$searchphrase%' OR fund like '%$searchphrase%'";
    $result = mysqli_query($conn, $query);
} else {
    $query = "SELECT * from tax_receipt";
    $result = mysqli_query($conn, $query);
    $searchphrase = "";
}
?>

<!DOCTYPE html>

<head>


    <link rel="stylesheet" a href="../../bootstrap-5.1.1-dist/css/bootstrap.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link rel="stylesheet" a href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" a href="../../citizenrecords.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>


    <title>
        Tax Receipt Payment Records - Barangay Records Management
    </title>
</head>

<body>
    <div class="card">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <br>
                    <h2 class="heading-section mt-3"> Tax Receipt Payment Records</h2>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row justify-content-md-center">
                        <div class="col justify-content-md-start mr-5">
                            <form action="" method="POST" class="d-grid gap-2 d-md-flex justify-content-start mt-0 m-0 mb-0">
                                <input type="text" name="search" value="<?php echo $searchphrase; ?>" placeholder="Search" class="form-control" style="width: 200px;">
                                <button class="btn btn-primary my-2 my-sm-0 inline" name="submit" class="" id="search" type="submit"> Search </button>
                            </form>
                        </div>
                        <div class="col mr-5">
                        </div>
                        <div class="col mr-5">
                        </div>
                        <div class="col mr-5">
                        </div>
                        <div class="col mr-5">
                        </div>
                        <div class="col justify-content-lg-end mb-3">
                            <a class="btn btn-danger me-md-2" href="../reports.php" type="button">Back</a>
                        </div>
                    </div>

                    <div class="table-wrap">

                        <table class="table">

                            <thead class="thead-primary">

                                <tr>
                                    <th>Payor</th>
                                    <th>Agency</th>
                                    <th>Nature of Collection</th>
                                    <th>Payment Method</th>
                                    <th>Total Amount</th>
                                    <th>Drawee Bank (for Money Order)</th>
                                    <th>Drawee Number</th>
                                    <th>Drawee Date</th>
                                    <th>Date Issued</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $Payor = $row['payor'];
                                $Agency = $row['agency'];
                                $Natureofcollection = $row['nature_of_collection'];
                                $Paymentmethod = $row['payment_method'];
                                $Totalamount = $row['total_amount'];
                                $Draweebank = $row['drawee_bank'];
                                $Draweenumber = $row['number_drawee'];
                                $Draweedate = $row['drawee_date'];
                                $Date = $row['date_issued'];
                                $space = " ";
                                $comma = ",";
                            ?>

                                <tbody>

                                    <tr>
                                        <td class="col-2">
                                            <?php
                                            echo $Payor;
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Agency;
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Natureofcollection
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Paymentmethod
                                            ?>
                                        </td>

                                        <td class="col-2">
                                            <?php
                                            echo $Totalamount
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Draweebank
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Draweenumber
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Draweedate
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Date
                                            ?>
                                        </td>

                                    <?php
                                }
                                    ?>
                                    </td>
                                    </tr>
                                </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        </section>


        <script src="../template/useraccounts/js/jquery.min.js"></script>
        <script src="../template/useraccounts/js/popper.js"></script>
        <script src="../template/useraccounts/js/bootstrap.min.js"></script>
        <script src="../template/useraccounts/js/main.js"></script>

</body>

</html>
<?php
?>