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
    $query = "SELECT * from busclearance_records WHERE name like '%$searchphrase%' OR address like '%$searchphrase%' OR typeofbusiness like '%$searchphrase%' OR owner like '%$searchphrase%' OR residenceaddress like '%$searchphrase%' OR or_number like '%$searchphrase%' OR rescert like '%$searchphrase%' OR appliedfor like '%$searchphrase%' OR date like '%$searchphrase%' OR amount like '%$searchphrase%'";
    $result = mysqli_query($conn, $query);
} else {
    $query = "SELECT * from busclearance_records";
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
        Business Clearance Records - Barangay Records Management
    </title>
</head>


<body>
    <div class="card">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <br>
                    <h2 class="heading-section mt-3"> Business Clearance Records</h2>

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
                            <a class="btn btn-danger me-md-2" href="business_reports.php" type="button">Back</a>
                        </div>
                    </div>

                    <div class="table-wrap">

                        <table class="table">

                            <thead class="thead-primary">

                                <tr>
                                    <th>Business Name</th>
                                    <th>Address</th>
                                    <th>Type of Business</th>
                                    <th>Owner</th>
                                    <th>Residence Address</th>
                                    <th>Applied For</th>
                                    <th>Date Issued</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $Businessname = $row['name'];
                                $Address = $row['address'];
                                $Typeofbusiness = $row['typeofbusiness'];
                                $Owner = $row['owner'];
                                $Residenceaddress = $row['residenceaddress'];
                                $Appliedfor = $row['appliedfor'];
                                $Rescert = $row['rescert'];
                                $Or = $row['or_number'];
                                $Amount = $row['amount'];
                                $Date = $row['date'];
                                $space = " ";
                                $comma = ",";
                            ?>

                                <tbody>

                                    <tr>
                                    <td class="col-2">
                                            <?php
                                            echo $Businessname;
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Address;
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                           echo $Typeofbusiness
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Owner
                                            ?>
                                        </td>

                                        <td class="col-2">
                                            <?php
                                            echo $Residenceaddress
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Appliedfor
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