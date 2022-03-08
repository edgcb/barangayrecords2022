<?php

session_start();
require_once("../dbconnection.php");

if (!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit;
}

$query = $conn->query("select * from calendar order by id");


$query1 = "select (SELECT Count(*) FROM citizen_records) as citizen,
(SELECT Count(*) FROM incident_reports) as incident";
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

    <!-- Fullcalendar -->
    <link rel='stylesheet' type='text/css' href='../api/fullcalendar.css'>
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" a href="../bootstrap-5.1.1-dist/css/bootstrap.css" /> -->
    <!-- JQuery -->
    <script src="../api/jquery-3.6.0.min.js"></script>
    <!-- JQueryUI -->
    <script src="../api/jquery-ui.min.js"></script>
    <!-- MomentJS -->
    <script src="../api/moment.min.js"></script>
    <!-- Fullcalendar -->
    <script src="../api/fullcalendar.min.js"></script>



    <!-- <link rel="stylesheet" a href="../bootstrap-5.1.1-dist/css/bootstrap.css" /> -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" a href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
    <!-- CSS -->
    <!-- <link rel="stylesheet" a href="calendar/calendar.css" /> -->

    <!-- Font Awesome
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" /> -->
    <!-- MDBootstrap -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script> -->




</head>

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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fa fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Captain
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="citizenrecords.php">
                    <!-- DRAFT -->
                    <!-- data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" -->
                    <i class="fa fa-users"></i>
                    <span>Citizen Records</span>
                </a>
                <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="../new-template/buttons.html">Buttons</a>
                        <a class="collapse-item" href="../new-template/cards.html">Cards</a>
                    </div>
                </div> -->
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
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
            <!-- <li class="nav-item">
            <div id="collapseIndividual" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Individual</h6>
                    <a class="collapse-item" href="../new-template/utilities-color.html" >Individual</a>
                    <a class="collapse-item" href="../new-template/utilities-border.html">Business</a>
                    <a class="collapse-item" href="../new-template/utilities-animation.html">Tax Payments</a>
                    <a class="collapse-item" href="../new-template/utilities-other.html">Brgy. Certificates Payment</a>
                </div>
            </div>
            </li> -->
            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="../new-template/utilities-color.html">Colors</a>
                        <a class="collapse-item" href="../new-template/utilities-border.html">Borders</a>
                        <a class="collapse-item" href="../new-template/utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="../new-template/utilities-other.html">Other</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Addons
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="../new-template/login.html">Login</a>
                        <a class="collapse-item" href="../new-template/register.html">Register</a>
                        <a class="collapse-item" href="../new-template/forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="../new-template/404.html">404 Page</a>
                        <a class="collapse-item" href="../new-template/blank.html">Blank Page</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="../new-template/charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="../new-template/tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="new-template/img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

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
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i> -->
                        <!-- Counter - Alerts -->
                        <!-- <span class="badge badge-danger badge-counter">3+</span> -->
                        </a>
                        <!-- Dropdown - Alerts -->
                        <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header"> -->
                        <!-- Alerts Center -->
                        <!-- </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li> -->

                        <!-- Nav Item - Messages -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i> -->
                        <!-- Counter - Messages -->
                        <!-- <span class="badge badge-danger badge-counter">7</span> -->
                        </a>
                        <!-- Dropdown - Messages -->
                        <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li> -->

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
                        <h1 class="h3 mb-0 text-gray-800">Home</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total Citizens Card Count -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Citizens </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result1)) {
                                                    $citizen = $row['citizen'];
                                                    $incident = $row['incident'];
                                                    echo $citizen;
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sample 2 -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Incidents </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    echo $incident;
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sample 3 -->
                        <div class="col-xl-4 col-md-6 mb-4">
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
                        </div>


                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-6 m-auto">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Calendar</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <script>
                                            $(document).ready(function() {
                                                var calendar = $('#calendar').fullCalendar({

                                                    editable: true,
                                                    header: {

                                                        left: 'prev, today',
                                                        center: 'title',
                                                        right: 'next'
                                                    },
                                                    events: [<?php while ($row = $query->fetch_object()) { ?> {
                                                            id: '<?php echo $row->id; ?>',
                                                            title: '<?php echo $row->event_name; ?>',
                                                            start: '<?php echo $row->start_date; ?>',
                                                            end: '<?php echo $row->end_date; ?>',
                                                        }, <?php } ?>],
                                                    selectable: true,
                                                    selectHelper: true,

                                                    select: function(start, end) {
                                                        $('#modalTitle').html(event.title);
                                                        $('#modalBody').html(event.description);
                                                        $('#eventUrl').attr('href', event.url);
                                                        $('#calendarAddModal').modal();

                                                        // var title = prompt("Enter the name of Event");
                                                        // if (title) {
                                                        //     var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                                                        //     var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                                                        //     $.ajax({
                                                        //         url: "calendar/calendar_add.php",
                                                        //         type: "POST",
                                                        //         data: {
                                                        //             title: title,
                                                        //             start: start,
                                                        //             end: end,
                                                        //         },
                                                        //         success: function() {
                                                        //             calendar.fullCalendar('refetchEvents');
                                                        //             alert("Event has been added.");
                                                        //             location.reload();
                                                        //         }
                                                        //     })
                                                        // }
                                                    },
                                                    editable: true,
                                                    // eventResize: function(event) {
                                                    //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                                                    //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                                                    //     var title = event.title;
                                                    //     var id = event.id;
                                                    //     $.ajax({
                                                    //         url: "calendar/calendar_edit.php",
                                                    //         type: "POST",
                                                    //         data: {
                                                    //             title: title,
                                                    //             start: start,
                                                    //             end: end,
                                                    //             id: id
                                                    //         },
                                                    //         success: function() {
                                                    //             calendar.fullCalendar('refetchEvents');
                                                    //             alert('Event has been updated.');
                                                    //             location.reload();
                                                    //         }
                                                    //     })
                                                    // },

                                                    eventDrop: function(event) {
                                                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                                                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                                                        var title = event.title;
                                                        var id = event.id;
                                                        $.ajax({
                                                            url: "calendar/calendar_edit.php",
                                                            type: "POST",
                                                            data: {
                                                                title: title,
                                                                start: start,
                                                                end: end,
                                                                id: id
                                                            },
                                                            success: function() {
                                                                calendar.fullCalendar('refetchEvents');
                                                                alert("Event has been updated.");
                                                                location.reload();
                                                            }
                                                        });
                                                    },

                                                    eventClick: function(event) {
                                                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                                                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                                                        var title = event.title;
                                                        var id = event.id;
                                                        $.ajax({
                                                            url: 'calendar/editevent.php',
                                                            type: "post",
                                                            data: {
                                                                id: id
                                                            },
                                                            success: function(data) {
                                                                $('#employee_detail').html(data);
                                                                // $('#dataModal').modal("show");
                                                                $('#dataModal').modal();
                                                            }
                                                            // $('#event_id').val(event.id);
                                                            // $('#modalTitle').html(event.title);
                                                            // $('#modalBody').html(data.extraDetails); //or whatever fields you are returning
                                                            // $('#eventUrl').attr('href', event.url);
                                                            // $('#calendarEditModal').modal();
                                                        });

                                                        // $('#event_id').val(event.id);
                                                        // $('#calendarEditModal').modal();
                                                        // $('#id').val(event.id);
                                                        // $('#modalBody').html(event.description);
                                                        // $('#eventUrl').attr('href', event.url);
                                                        // calendar.getEventById( id )


                                                        // 

                                                        // if (confirm("Do you want to DELETE this event?")) {
                                                        //     var id = event.id;
                                                        //     $.ajax({
                                                        //         url: "calendar/calendar_event_delete.php",
                                                        //         type: "POST",
                                                        //         data: {
                                                        //             id: id
                                                        //         },
                                                        //         success: function() {
                                                        //             calendar.fullCalendar('refetchEvents');
                                                        //             alert("Event has been Deleted.");
                                                        //             location.reload();
                                                        //         }
                                                        //     })
                                                        // }
                                                    },

                                                });
                                            });
                                        </script>

                                        <div id="calendarAddModal" class="modal fade">
                                            <?php


                                            ?>

                                            <div class="modal-dialog mb-5">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                                                    </div>
                                                    <div id="modalBody" class="modal-body">
                                                        <form action="calendar/calendar_add.php" method="POST" autocomplete="off">
                                                            <div class="row">
                                                                <div class="col-md-12 mb-4">
                                                                    <div class="form-outline">
                                                                        <input type="text" name="event_name" placeholder="Event name" id="event_name" class="form-control form-control-lg" />

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 mb-4">
                                                                    <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                                                        <label for="start_date" name="start_date" class="form-label"> Start Date</label>
                                                                        <input type="datetime-local" name="start_date" class="form-control form-control-lg" id="start_date" />

                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 mb-4">
                                                                    <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                                                        <label for="end_date" name="end_date" class="form-label"> End Date</label>
                                                                        <input type="datetime-local" name="end_date" class="form-control form-control-lg" id="end_date" />

                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div class="modal-footer">
                                                                <button class="btn btn-success" name="addevent" value="Submit" class="">Add</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="dataModal" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Event</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                    </div>
                                                    <form method="POST" action="calendarupdateevent.php">
                                                    <div class="modal-body" id="employee_detail">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" name="updateevent" value="Submit" class="">Update</button>
                                                        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-dismiss="modal">Close</a>

                                                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                                                    </div>
                                                    <div id="modalBody" class="modal-body">
                                                        <form action="updateevent.php?id=<?php echo $id ?>" method="POST" autocomplete="off">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-4" style="width:1000px">
                                                                    <div class="form-outline">
                                                                        <label class="form-label" for="event_name">Event Name</label>
                                                                        <input type="text" name="event_name" value="<?php echo $Eventname ?>" id="event_name" class="form-control form-control-lg" />

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 mb-4" style="width:1000px">
                                                                    <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                                                        <label for="start_date" name="start_date" class="form-label"> Start Date (click the calendar button on the right) </label>
                                                                        <input type="datetime-local" name="start_date" value="<?php echo $Startdate ?>" class="form-control form-control-lg" id="start_date" />
                                                                        <label for="start_date" name="start_date" id="current_start_date" class="form-label"> Current Start Date: <b><?php echo $Startdate ?></b> </label>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" name="updateevent" value="Submit" class="">Update</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
                                                    </div>
                                                </div>
                                                </form>
                                            </div> -->


                                        <div id="calendar" class="justify-content-center mb-5"></div>


                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Incident Types (If can be worked out)</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
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
    <!-- <script src="../new-template/vendor/jquery/jquery.min.js"></script> -->
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

</body>

</html>
<?php
                                                }
?>

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

<!-- 
<head>
    <link rel="stylesheet" a href="../bootstrap-5.1.1-dist/css/bootstrap.css" />
    <title>
        Brgy. Captain - Barangay Records Management
    </title>
</head>

<!DOCTYPE html>


<div class="container">
    <div class="row">
        <div class="col">
            <br>
            <p class="fs-3 mb-0">
                <br>
            <div class="fs-6 mt-1">
                Brgy. Captain
            </div>
            </p>


        </div>
    </div>


    <div class="container text-center">


        <br>
        <div class="row">
            <div class="col">

                <a href="citizenrecords.php" class="btn btn-squared-default-plain btn-primary">
                    <br>

                    <h6 class="text-start"> Citizen Records </h6>
                </a>
                <a href="incidentreports.php" class="btn btn-squared-default-plain btn-primary">
                    <br>

                    <h6 class="text-start"> Incident Reports </h6>
                </a>

                <a href="editaccount.php?getID=<?php echo $_SESSION['id'] ?>" class="btn btn-squared-default-plain btn-primary">
                    <br>

                    <h6 class="text-start"> Edit Account </h6>
                </a>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <a href="calendar/calendar.php" class="btn btn-squared-default-plain btn-primary">
                    <br>
                    <br>
                    <h6 class="text-start"> Calendar </h6>
                </a>
                <a href="reports/reports.php" class="btn btn-squared-default-plain btn-primary">
                    <br>
                    <br>
                    <h6 class="text-start"> Reports </h6>
                </a>
                <a href="../logout.php" class="btn btn-squared-default-plain btn-danger">
                    <br>
                    <br>
                    <h6 class="text-start"> Log out </h6>
                </a>

                </p>
            </div>
        </div>
    </div>

    <style>
        .btn-squared-default {
            width: 100px !important;
            height: 100px !important;
            font-size: 10px;
        }

        .btn-squared-default:hover {
            border: 3px solid white;
            font-weight: 800;
        }

        .btn-squared-default-plain {
            width: 100px !important;
            height: 100px !important;
            font-size: 10px;
        }

        .btn-squared-default-plain:hover {
            border: 0px solid white;
        }
    </style> -->