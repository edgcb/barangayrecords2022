<?php
// Template from:
// Table V03
// https://colorlib.com/wp/bootstrap-tables/

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Captain') {
    }
} else {
    header("location: ../index.php");
}


require_once("../dbconnection.php");

if (isset($_POST['search'])) {
    $searchphrase = $_POST['search'];
    $query = "SELECT * from incident_reports WHERE involved1 like '%$searchphrase%' OR involved2 like '%$searchphrase%' OR involved3 like '%$searchphrase%' OR involved4 like '%$searchphrase%' OR involved5 like '%$searchphrase%' OR involved6 like '%$searchphrase%' OR type_of_incident like '%$searchphrase%' OR location like '%$searchphrase%' OR date like '%$searchphrase%'";
    $result = mysqli_query($conn, $query);
} else {
    $query = "SELECT * from incident_reports";
    $result = mysqli_query($conn, $query);
    $searchphrase = "";
}

$query1 = "select (SELECT Count(*) FROM incident_reports) as incidents";
$result1 = mysqli_query($conn, $query1);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Captain - Barangay Records Management</title>


    <!-- Custom fonts for this template-->
    <link href="../new-template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../new-template/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../new-template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="../pacol.png" class="" style="width:55px;height:55px;">
                </div>
                <div class="sidebar-brand-text text-capitalize">Barangay Records Management <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fa fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Barangay
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="citizenrecords.php">
                    <!-- DRAFT -->
                    <!-- data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" -->
                    <i class="fa fa-users"></i>
                    <span>Citizen Records</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="incidentreports.php">
                    <!-- DRAFT -->
                    <!-- data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" -->
                    <i class="fa fa-flag"></i>
                    <span>Incident Reports</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-list-alt"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reports</h6>
                        <a class="collapse-item" href="#" class="dropdown-toggle" data-toggle="collapse" role="button" aria-haspopup="true" data-target="#collapseIndividual" aria-expanded="true" aria-controls="collapseIndividual">Individual</a>

                        <ul class="submenu dropdown-menu" id="collapseIndividual">
                            <a class="dropdown-item" href="reports/individual/barangaycertification_reports.php">Barangay<br>Certification</a>
                            <a class="dropdown-item" href="reports/individual/barangayclearance_reports.php">Barangay<br>Clearance</a>
                            <a class="dropdown-item" href="reports/individual/indigencycertificate_reports.php">Indigency<br>Certificate</a>
                            <a class="dropdown-item" href="reports/individual/certificateofresidency_reports.php">Certificate of<br>Residency</a>
                            <a class="dropdown-item" href="reports/individual/healthcertificate_reports.php">Health Certificate</a>
                            <a class="dropdown-item" href="reports/individual/certificateofgoodmoral_reports.php">Certificate of<br>Good Moral</a>
                            <a class="dropdown-item" href="reports/individual/cedula_reports.php">Cedula</a>

                        </ul>


                        <a class="collapse-item" href="#" class="dropdown-toggle" data-toggle="collapse" role="button" aria-haspopup="true" data-target="#collapseBusiness" aria-expanded="true" aria-controls="collapseBusiness">Business</a>

                        <ul class="submenu dropdown-menu" id="collapseBusiness">
                            <a class="dropdown-item" href="reports/business/businessclearance_reports.php">Business<br>Clearance</a>
                            <a class="dropdown-item" href="reports/business/cessationbusiness_reports.php">Cessation<br>of Business</a>


                        </ul>

                        <a class="collapse-item" href="reports/payments/taxreceipt_reports.php">Tax Payments</a>
                        <a class="collapse-item" href="reports/payments/certreceipt_reports.php">Brgy.<br>Certificates Payment</a>
                    </div>
                </div>



            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form action="" method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <!-- 
                                                        <form action="" method="POST" class="d-grid gap-2 d-md-flex justify-content-start mt-0 m-0 mb-0">
                                <input type="text" name="search" value="<?php echo $searchphrase; ?>" placeholder="Search" class="form-control" style="width: 200px;">
                                <button class="btn btn-primary my-2 my-sm-0 inline" name="submit" class="" id="search" type="submit"> Search </button>
                            </form>
                         -->

                        <div class="input-group">
                            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                        </li>
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo "" . $_SESSION['Name']; ?> </span>
                                <img class="img-profile rounded-circle" src="../new-template/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="editaccount.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Incident Reports</h1>
                        <a href="addcitizen.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-flag fa-sm text-white-50"></i> Add Incident</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total Citizens Card Count -->
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Incident</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result1)) {
                                                    $incidents = $row['incidents'];
                                                    echo $incidents;
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-flag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sample 2 -->
                        <!-- <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Incidents (If can be worked out) </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Sample 3 -->
                        <!-- <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reports (If applicable/ can be worked out)
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                    </div>

                    <!-- Content Row -->

                    <div class="row">



                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-6 m-auto">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Incidents</h6>
                                    <style>
                                        #dataTable_filter {
                                            float: right;
                                        }
                                    </style>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        </div>
                                        <div class="row-xl-11">
                                            <div class="col-sm-12 m-auto">
                                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name of Citizen" style="width: 90px;">Type of Incident</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Zone Number of the Citizen" style="width: 60px;">Involved</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Address of the Citizen" style="width: 65px;">Location</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Contact of the Citizen" style="width: 70px;">Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Gender of the Citizen" style="width: 30px;">Time</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Edit details of the Citizen" style="width: 66px;">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">Type of Incident</th>
                                                            <th rowspan="1" colspan="1">Involved</th>
                                                            <th rowspan="1" colspan="1">Location</th>
                                                            <th rowspan="1" colspan="1">Date</th>
                                                            <th rowspan="1" colspan="1">Time</th>
                                                            <th rowspan="1" colspan="1">Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $id = $row['id'];
                                                            $Date = $row['date'];
                                                            $Time = $row['time'];
                                                            $Involved1 = $row['involved1'];
                                                            $Involved2 = $row['involved2'];
                                                            $Involved3 = $row['involved3'];
                                                            $Involved4 = $row['involved4'];
                                                            $Involved5 = $row['involved5'];
                                                            $Involved6 = $row['involved6'];
                                                            $Location = $row['location'];
                                                            $Typeofincident = $row['type_of_incident'];
                                                            $Details = $row['details'];
                            
                                                            $space = " ";
                                                            $comma = ",";


                                                            ?>
                                                            <tr> 
                                                            <td><?php echo $Typeofincident;  ?> </td>
                                                            <td><?php echo $Involved1, $comma, $space, $Involved2, $comma, $space, $Involved3, $comma, $space, $Involved4,  $comma, $space,  $Involved5,  $comma, $space,  $Involved6 ;  ?></td>
                                                            <td><?php echo $Location;  ?></td>
                                                            <td><?php echo $Date; ?></td>
                                                            <td><?php echo $Time; ?></td>
                                                            <td> <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="editincident.php?fetchID=<?php echo $id ?>" role="button"> <i class="fas fa-edit"></i> Edit</a>  </td>
                                                            </tr>                                                    

                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.container-fluid -->

                            </div>
                            <!-- End of Main Content -->

                            <!-- Footer -->
                            <footer class="sticky-footer bg-white">
                                <div class="container my-auto">
                                    <div class="copyright text-center my-auto">
                                        <span>Copyright &copy; Template 2022</span>
                                    </div>
                                </div>
                            </footer>
                            <!-- End of Footer -->

                        </div>
                        <!-- End of Content Wrapper -->

                    </div>
                    <!-- End of Page Wrapper -->

                    <!-- Scroll to Top Button-->
                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                    </a>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">Are you sure you would like to log out? You will be returned to Login page.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" href="../logout.php">Logout</a>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Bootstrap core JavaScript-->
                    <script src="../new-template/vendor/jquery/jquery.min.js"></script>
                    <script src="../new-template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="../new-template/vendor/jquery-easing/jquery.easing.min.js"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="../new-template/js/sb-admin-2.min.js"></script>

                    <!-- Page level plugins -->
                    <script src="../new-template/vendor/chart.js/Chart.min.js"></script>

                    <!-- Page level custom scripts -->
                    <script src="../new-template/js/demo/chart-area-demo.js"></script>
                    <script src="../new-template/js/demo/chart-pie-demo.js"></script>


                    <!-- Page level plugins -->
                    <script src="../new-template/vendor/datatables/jquery.dataTables.min.js"></script>
                    <script src="../new-template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

                    <!-- Page level custom scripts -->
                    <script src="../new-template/js/demo/datatables-demo.js"></script>



</body>

</html>
<?php
                                                }
?>



<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  -->
<!--  -->


<!-- <!DOCTYPE html>
<html lang="en">

<head> -->

    <!-- <link rel="stylesheet" a href="../bootstrap-5.1.1-dist/css/bootstrap.css" /> -->

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" a href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
    <!-- CSS -->
    <!-- <link rel="stylesheet" a href="citizenrecords.css" /> -->

    <!-- Font Awesome -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" /> -->
    <!-- MDBootstrap -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" /> -->
    <!-- MDBootstrap -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script> -->

    <!-- <title>
        Incident Reports - Barangay Records Management
    </title> 
</head>

<body>
    <div class="card">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <br>
                    <h2 class="heading-section mt-3">Incident Reports</h2>
                </div>
            </div>
            <div class="row"> -->

                <!-- Successfully Added -->
                <?php
                if (isset($_GET['incidentadded'])) {
                    $Message = $_GET['incidentadded'];
                    $Message = "Incident have been successfully added";
                ?>
                    <div class="alert alert-success text-center">
                        <?php echo $Message ?>
                    </div>
                <?php
                }

                ?>

                <?php
                // Citizen updated

                if (isset($_GET['incidentupdated'])) {
                    $Message = $_GET['incidentupdated'];
                    $Message = "Incident's information has been updated";
                ?>
                    <div class="alert alert-success text-center">
                        <?php echo $Message ?>
                    </div>
                <?php
                }
                ?>

                <!-- <div class="col-md-12">
                    <div class="row justify-content-md-center">
                        <div class="col justify-content-md-start mr-3">
                            <form action="" method="POST" class="d-grid gap-2 d-md-flex justify-content-start mt-0 m-0 mb-0">
                                <input type="text" name="search" value="<?php echo $searchphrase; ?>" placeholder="Search" class="form-control" style="width: 200px;">
                                <button class="btn btn-primary my-2 my-sm-0 inline" name="submit" class="" id="search" type="submit"> Search </button>
                            </form>
                        </div>
                        <div class="col mr-0">
                        </div>
                        <div class="col">
                        </div>
                        <div class="col justify-content-lg-end mb-3">
                            <a class="btn btn-danger me-md-2 " href="index.php" type="button">Back</a>
                            <a class="btn btn-dark" href="reportincident.php" type="button">Report Incident</a>
                        </div>
                    </div>

                    <div class="table-wrap">

                        <table class="table">

                            <thead class="thead-primary">

                                <tr>
                                    <th>Type of <br>
                                        Incident
                                    </th>
                                    <th class="text-center">Involved</th>
                                    <th class="text-center">Location</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Actions</th>

                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $Date = $row['date'];
                                $Time = $row['time'];
                                $Involved1 = $row['involved1'];
                                $Involved2 = $row['involved2'];
                                $Involved3 = $row['involved3'];
                                $Involved4 = $row['involved4'];
                                $Involved5 = $row['involved5'];
                                $Involved6 = $row['involved6'];
                                $Location = $row['location'];
                                $Typeofincident = $row['type_of_incident'];
                                $Details = $row['details'];

                                $space = " ";
                                $comma = ",";
                            ?>

                                <tbody>

                                    <tr>
                                        <td class="col-1">
                                            <?php
                                            echo $Typeofincident;
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo $Involved1;
                                            ?>
                                            <br>
                                            <?php
                                            echo $Involved2;
                                            ?>
                                            <br>
                                            <?php
                                            echo $Involved3
                                            ?>
                                            <br>
                                            <?php
                                            echo $Involved4
                                            ?>
                                            <br>
                                            <?php
                                            echo $Involved5
                                            ?>
                                            <br>
                                            <?php
                                            echo $Involved6
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo $Location
                                            ?>
                                        </td>

                                        <td class="col-2">
                                            <?php
                                            echo $Date
                                            ?>
                                        </td>

                                        <td class="col-1">
                                            <?php
                                            echo $Time
                                            ?>
                                        </td>

                                        <td>
                                            <div class="span2">
                                                <a class="btn btn-primary text-light" href="editincident.php?fetchID=<?php echo $id ?>" role="button"> <i class="fas fa-edit"></i> Edit</a>


                                                <a class="btn btn-danger text-light" onclick="deleteconfirm()" role="button"> <i class="fas fa-times"></i> Delete</a>
                                                <script>
                                                    function deleteconfirm() {
                                                        // var result;
                                                        var del = confirm("Are you sure you want to DELETE this INCIDENT on the record? This action cannot be UNDONE!");
                                                        if (del == true) {
                                                            window.location = "deleteincident.php?deleteincident=<?php echo $id ?>"
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

</html> -->
