<?php
// Template from:
// Table V03
// https://colorlib.com/wp/bootstrap-tables/

session_start();
require_once('../logo.php');
require_once("../dbconnection.php");

if (isset($_POST['search'])) {
    $searchphrase = $_POST['search'];
    $query = "SELECT * from citizen_records WHERE first_name like '%$searchphrase%' OR middle_name like '%$searchphrase%' OR last_name like '%$searchphrase%' OR address like '%$searchphrase%' OR zone like '%$searchphrase%'";
    $result = mysqli_query($conn, $query);
} else {
    $query = "SELECT * from citizen_records";
    $result = mysqli_query($conn, $query);
    $searchphrase = "";
}

?>

<head>
    <!-- Bootstrap -->
    <link rel="stylesheet" a href="../bootstrap-5.1.1-dist/css/bootstrap.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link rel="stylesheet" a href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" a href="barangaycertificates.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

    <title>
        Barangay Certificates - Barangay Records Management
    </title>
</head>

<!DOCTYPE html>
<html lang="en">

<body>
    <div class="card">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <br>
                    <h2 class="heading-section mt-3">Barangay Certificates</h2>
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
                        <div class="col justify-content-lg-end mb-4">
                            <a class="btn btn-danger me-md-2 " href="index.php" type="button">Back</a>
                        </div>
                    </div>

                    <div class="table-wrap">

                        <table class="table">

                            <thead class="thead-primary">

                                <tr>
                                    <th>Name</th>
                                    <th>Zone</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Gender</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $Firstname = $row['first_name'];
                                $Middlename = $row['middle_name'];
                                $Lastname = $row['last_name'];
                                $Sex = $row['sex'];
                                $Birthdate = $row['birthdate'];
                                $Address = $row['address'];
                                $Zone = $row['zone'];
                                $Civilstatus = $row['civil_status'];
                                $Occupation = $row['occupation'];
                                $Citizenship = $row['citizenship'];
                                $Contact = $row['contact'];
                                $space = " ";
                                $comma = ",";
                            ?>

                                <tbody>

                                    <tr>
                                        <td>
                                            <?php
                                            echo $Lastname, $comma, $space, $Firstname, $space, $Middlename;
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Zone
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo $Address
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo $Contact
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Sex
                                            ?>
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-mdb-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-certificate"></i> Get Certificate
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li><a class="dropdown-item disabled" href="#">INDIVIDUAL</a></li>
                                                    <li><a class="dropdown-item" href="certificates/individual/barangaycertification.php?fetchID=<?php echo $id ?>">Barangay Certification</a></li>
                                                    <li><a class="dropdown-item" href="certificates/individual/barangayclearance.php?fetchID=<?php echo $id ?>">Barangay Clearance</a></li>
                                                    <li><a class="dropdown-item" href="certificates/individual/indigencycertificate.php?fetchID=<?php echo $id ?>">Indigency Certificate</a></li>
                                                    <li><a class="dropdown-item" href="certificates/individual/certificateofresidency.php?fetchID=<?php echo $id ?>">Certificate of Residency</a></li>
                                                    <li><a class="dropdown-item" href="certificates/individual/healthcertificate.php?fetchID=<?php echo $id ?>">Health Certificate</a></li>
                                                    <li><a class="dropdown-item" href="certificates/individual/certificateofgoodmoral.php?fetchID=<?php echo $id ?>">Certificate of Good Moral</a></li>
                                                    <li><a class="dropdown-item" href="certificates/individual/cedula.php?fetchID=<?php echo $id ?>">Cedula</a></li>
                                                    <li><a class="dropdown-item disabled" href="#">BUSINESS</a></li>
                                                    <li><a class="dropdown-item" href="certificates/business/businessclearance.php?fetchID=<?php echo $id ?>">Business Clearance</a></li>
                                                    <li><a class="dropdown-item" href="certificates/business/cessationbusiness.php?fetchID=<?php echo $id ?>">Cessation of Business</a></li>
                                                </ul>
                                            </div>
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