<?php
// Template from:
// Table V03
// https://colorlib.com/wp/bootstrap-tables/

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Treasurer') {
    }
} else {
    header("location: index.php");
}

require_once('../logo.php');
require_once("../dbconnection.php");

if (isset($_POST['search'])) {
    $searchphrase = $_POST['search'];
    $query = "SELECT * from payments WHERE type_of_payment like '%$searchphrase%' OR date like '%$searchphrase%' OR issue_receipt like '%$searchphrase%'";
    $result = mysqli_query($conn, $query);
} else {
    $query = "SELECT * from payments";
    $result = mysqli_query($conn, $query);
    $searchphrase = "";
}

?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link rel="stylesheet" a href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" a href="financialrecords.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <title>
        Financial Records - Barangay Records Management
    </title>
</head>


<body>
    <div class="card">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <br>
                    <h2 class="heading-section mt-3">Financial Records</h2>
                </div>
            </div>
            <div class="row">

                <?php
                // Payment record updated

                if (isset($_GET['paymentrecordupdated'])) {
                    $Message = $_GET['paymentrecordupdated'];
                    $Message = "Payment record has been updated";
                ?>
                    <div class="alert alert-success text-center">
                        <?php echo $Message ?>
                    </div>
                <?php
                }
                ?>

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
                        <div class="col mr-1">
                        </div>
                        <div class="col justify-content-lg-end mb-4">
                            <a class="btn btn-danger me-md-2 " href="index.php" type="button">Back</a>
                            <a class="btn btn-success" href="addpaymentrecord.php" type="button">Add Record</a>
                        </div>
                    </div>

                    <div class="table-wrap">

                        <table class="table">

                            <thead class="thead-primary">

                                <tr>
                                    <th>Type of Payment</th>
                                    <th>Total Amount</th>
                                    <th>Issued Receipt</th>
                                    <th>Date (Year/Month/Day)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $Typeofpayment = $row['type_of_payment'];
                                $Amount = $row['amount'];
                                $Date = $row['date'];
                                $issue_receipt = $row['issue_receipt'];
                            ?>

                                <tbody>

                                    <tr>
                                        <td>
                                            <?php
                                            echo $Typeofpayment
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Amount
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $issue_receipt
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Date
                                            ?>
                                        </td>
                                        <td class="col-3">
                                            <div class="span2">
                                                <a class="btn btn-primary text-light" href="editpaymentrecord.php?fetchID=<?php echo $id ?>" role="button"> <i class="fas fa-edit"></i> Edit</a>


                                                <a class="btn btn-danger text-light" onclick="deleteconfirm()" role="button"> <i class="fas fa-times"></i> Delete</a>
                                                <script>
                                                    function deleteconfirm() {
                                                        // var result;
                                                        var del = confirm("Are you sure you want to DELETE this FINANCIAL RECORD? This action cannot be UNDONE!");
                                                        if (del == true) {
                                                            window.location = "deletepaymentrecord.php?deletepaymentrecord=<?php echo $id ?>"
                                                        } else {
                                                            return false;

                                                        }
                                                    }
                                                </script>
                                            </div>
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