<?php
require_once("../dbconnection.php");
// require_once("logo.php");

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Admin') {
    }
} else {
    header("location: ../index.php");
}

// OLD template
// Template from:
// https://mdbootstrap.com/docs/standard/extended/registration/
?>




<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add User - Barangay Records Management</title>

    <!-- Custom fonts for this template-->
    <link href="../new-template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">



    <!-- Custom styles for this template-->
    <link href="../new-template/css/sb-admin-2.min.css" rel="stylesheet">

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
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fa fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="useraccounts.php">
                    <!-- DRAFT -->
                    <!-- data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" -->
                    <i class="fa fa-users"></i>
                    <span>User Accounts</span>
                </a>
                <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="../new-template/buttons.html">Buttons</a>
                        <a class="collapse-item" href="../new-template/cards.html">Cards</a>
                    </div>
                </div> -->
            </li>

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
            <!-- <li class="nav-item"> -->
            <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages"> --> -->
            <!-- <i class="fas fa-fw fa-folder"></i> -->
            <!-- <span>Pages</span> -->
            </a>
            <!-- <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar"> 
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
                </div> -->
            </li>

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
                <div class="container-fluid mb-4">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-5">
                        <h1 class="h3 mb-0 text-gray-800">Add User</h1>
                    </div>


                    <!-- Content Row -->
                    <div class="row align-items-center m-auto">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6 m-auto">
                            <div class="card shadow mb-4 m-auto" style="height: 35rem;">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">User's Information</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <form action="" name="contentForm" method="" role="form" class="user" novalidate="true" data-toggle="validator" novalidate="true">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Full Name" value="" required="required" data-error="Please enter the user's full name">
                                                    <div class="help-block with-errors"></div>

                                                </div>

                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-user" name="contact" id="contact" placeholder="Contact Number" required="required" data-error="Please enter the user's phone number">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email Address" required="required" data-error="Please enter user's email address">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group row d-flex justify-content-center align-items-center mb-2"> Gender </div>
                                            <div class="col-sm-12 d-flex align-items-center justify-content-center mb-3">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" value="Male" name="sex" id="sex" autocomplete="on" required/>
                                                    <label class="form-check-label" for="sex">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline ">
                                                    <input type="radio" class="form-check-input" value="Female" name="sex" id="sex" autocomplete="on" required/>
                                                    <label class="form-check-label" for="sex">Female</label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="date" class="form-control form-control-user" name="birthdate" id="birthdate" required="required" data-error="Please enter user's birthdate" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-user" name="address" id="address" placeholder="Address" required="required" data-error="Please enter user's address">
                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required="required" data-error="Please enter the password">
                                                </div>
                                                <div class=" col-sm-6">
                                                        <input type="password" class="form-control form-control-user" name="repeatpassword" id="repeatpassword" placeholder="Repeat Password" required="required" data-error="Please repeat the password">
                                                    </div>
                                                </div>

                                                <div class="row d-flex justify-content-center align-items-center">
                                                    <div class="mb-2 pb-1 d-flex justify-content-center align-items-center font-weight-bold"> User Type </div>
                                                    <div class="col-12 d-flex align-items-center justify-content-center">


                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="usertype" id="usertype" value="Captain" />
                                                            <label class="form-check-label" for="usertype">Brgy. Captain</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="usertype" id="usertype" value="Secretary" />
                                                            <label class="form-check-label" for="usertype">Brgy. Secretary</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="usertype" id="usertype" value="Treasurer" />
                                                            <label class="form-check-label" for="usertype">Brgy. Treasurer</label>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-center align-items-center mt-4">
                                                    <div class="mr-3">
                                                        <button class="btn btn-success btn-user justify-content-center disabled" type="submit" name="" style="width: 150px;" value="Submit"> Add User

                                                        </button>
                                                        <a class="btn btn-danger btn-user" style="width: 150px;" href="useraccounts.php" role="button">Cancel</a>

                                                        <input class="submit center-block btn btn-primary disabled" value="Submit" type="submit">
                                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- </container-fluid> -->
                <br>

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

                    <!-- <a href="../logout.php" class="btn btn-squared-default-plain btn-danger">
                    <br>
                    <br>
                    <h6 class="text-start"> Log out </h6> -->
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

    

    <!-- <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script> -->


</body>

</html>



















<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
<!-- <head>
    <link rel="stylesheet" a href="bootstrap-5.1.1-dist/css/bootstrap.css" /> -->

<!-- Font Awesome -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" /> -->
<!-- Google Fonts -->
<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" /> -->
<!-- MDBootstrap -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" /> -->


<!-- MDBootstrap -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script> -->

<!-- <link rel="stylesheet" href="adduser.css"> -->

<!-- <title>
        Add user - Barangay Records Management System
    </title>
</head>

<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add User Account</h3>
                        <form action="adduservalidate.php" method="POST" autocomplete="off"> -->

<?php
// Empty Fields
if (isset($_GET['empty'])) {
    $Message = $_GET['empty'];
    $Message = "Please fill out empty fields";
?>
    <div class="alert alert-danger text-center">
        <?php echo $Message ?>
    </div>
<?php
}

?>


<!-- Invalid Character -->
<?php

if (isset($_GET['invalid'])) {
    $Message = $_GET['invalid'];
    $Message = "Invalid Characters.";
?>
    <div class="alert alert-danger text-center">
        <?php echo $Message ?>
    </div>
<?php
}

?>


<!-- Invalid Email -->
<?php

if (isset($_GET['VerifyEmail'])) {
    $Message = $_GET['VerifyEmail'];
    $Message = "The email you have entered is invalid.";
?>
    <div class="alert alert-danger text-center">
        <?php echo $Message ?>
    </div>
<?php
}

?>

<!-- Invalid Email (Already Taken) -->
<?php

if (isset($_GET['EmailTaken'])) {
    $Message = $_GET['EmailTaken'];
    $Message = "The email address you have provided was already taken. Please enter another email address";
?>
    <div class="alert alert-danger text-center">
        <?php echo $Message ?>
    </div>
<?php
}

?>

<!-- Retype Password -->
<?php

if (isset($_GET['repeatpassword'])) {
    $Message = $_GET['repeatpassword'];
    $Message = "Password does not match. Please try again";
?>
    <div class="alert alert-danger text-center">
        <?php echo $Message ?>
    </div>
<?php
}

?>

<!-- Successfully Registered -->
<?php
if (isset($_GET['successful'])) {
    $Message = $_GET['successful'];
    $Message = "User have been successfully added";
?>
    <div class="alert alert-success text-center">
        <?php echo $Message ?>
    </div>
<?php
}

?>
<!-- <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="name" id="name" class="form-control form-control-lg" />
                                        <label class="form-label" for="name">Name</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" id="contact" name="contact" class="form-control form-control-lg" />
                                        <label class="form-label" maxlength="13" for="contact">Contact No.</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 ">

                                    <div class="mb-2 pb-1"> Sex </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="sex" value="Male" />
                                        <label class="form-check-label" for="sex">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="sex" value="Female" />
                                        <label class="form-check-label" for="sex">Female</label>
                                    </div> -->

<!-- d-flex align-items-center -->

<!-- </div>
                                <div class="col-md-6 mb-4">

                                    <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                        <label for="birthdate" name="birthdate" class="form-label"> Birthdate (click the calendar button on the right) </label>
                                        <input type="date" name="birthdate" class="form-control form-control-lg" id="birthdate" />
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="email"> Email address </label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="password" name="password" id="password" class="form-control form-control-lg amber-border" />
                                        <label class="form-label" for="password"> Password </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                                        <label class="form-label" for="address">Address</label>
                                    </div> -->

<!-- <div class="form-outline">
                                        <input type="email" id="name" class="form-control form-control-lg" />
                                        <label class="form-label" for="firstName"> Address </label>
                                    </div> -->
<!-- </div>

                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="password" name="repeatpassword" id="repeatpassword" class="form-control form-control-lg amber-border" />
                                        <label class="form-label" for="repeatpassword"> Repeat Password </label>

                                        <script>
                                            document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                                new mdb.Input(formOutline).update();
                                            });
                                        </script>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 pb-1 d-flex align-items-center justify-content-center font-weight-bold"> User Type </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">


                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="usertype" id="usertype" value="Captain" />
                                        <label class="form-check-label" for="usertype">Brgy. Captain</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="usertype" id="usertype" value="Secretary" />
                                        <label class="form-check-label" for="usertype">Brgy. Secretary</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="usertype" id="usertype" value="Treasurer" />
                                        <label class="form-check-label" for="usertype">Brgy. Treasurer</label>
                                    </div>

                                </div>
                            </div>


                            <div class="mt-4 pt-2">

                                <button class="btn btn-success pr-5 btn-lg" name="adduser" value="Submit" class="" style="width: 120px;"> Add User </button>
                                <a class="btn btn-danger pl-5  btn-lg" style="width: 100px;" href="useraccounts.php" role="button">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>

</html> -->