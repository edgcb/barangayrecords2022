<?php
// Template from:
// Table V03
// https://colorlib.com/wp/bootstrap-tables/
// session_start();

require_once("../dbconnection.php");

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Admin') {
    }
} else {
    header("location: ../index.php");
}


// User accounts

// $multi_query = "SELECT Count(*) FROM users WHERE usertype IN ('Captain', 'Secretary', 'Treasurer'); SELECT Count(*) FROM users WHERE status = 'Active'; SELECT Count(*) FROM users WHERE status = 'Inactive'";

$query1 = "select (SELECT Count(*) FROM users WHERE usertype IN ('Captain', 'Secretary', 'Treasurer')) as users,
(SELECT Count(*) FROM users WHERE status = 'Active') as active,
(SELECT Count(*) FROM users WHERE status = 'Inactive') as inactive";

$result1 = mysqli_query($conn, $query1);

// $query = "SELECT Count(*) FROM users WHERE usertype IN ('Captain', 'Secretary', 'Treasurer');";
// $query .= "SELECT Count(*) FROM users WHERE status = 'Active';";
// $query .= "SELECT Count(*) FROM users WHERE status = 'Inactive'";
// $query .= "SELECT * from users EXCEPT SELECT * FROM users WHERE usertype = 'Admin'";

$query2 = "SELECT * from users EXCEPT SELECT * FROM users WHERE usertype = 'Admin'";
$result2 = mysqli_query($conn, $query2);
?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Barangay Records Management</title>


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
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider">

            

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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Accounts</h1>
                        <a href="adduser.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add User</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result1)) {
                                                    $users = $row['users'];
                                                    $active = $row['active'];
                                                    $inactive = $row['inactive'];
                                                    echo $users;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Active Accounts</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    echo $active;
                                                ?>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Inactive Accounts
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                    echo $inactive;
                                                }

                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Sample 4</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                                    <div class="dropdown no-arrow">
                                        <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i> -->
                                        <!-- </a> -->
                                        <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <div class="table-wrap">

                                            <table class="table">

                                                <thead class="thead-primary">

                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Address</th>
                                                        <th>Role</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>

                                                    </tr>
                                                </thead>
                                                <?php
                                                //  while (mysqli_next_result($conn));   
                                                while ($row = mysqli_fetch_assoc($result2)) {
                                                    $id = $row['id'];
                                                    $Name = $row['name'];
                                                    $Contact = $row['contact'];
                                                    $Address = $row['address'];
                                                    $Status = $row['status'];
                                                    $Role = $row['usertype'];
                                                ?>

                                                    <tbody>

                                                        <tr>
                                                            <td style="width:25%">
                                                                <?php
                                                                echo $Name
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $Contact
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                echo $Address
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                echo $Role
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                echo $Status
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <div class="span2">
                                                                    <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="edituser.php?fetchID=<?php echo $id ?>" role="button"> <i class="fas fa-edit"></i> Edit</a>


                                                                    <?php if ($Status == 'Active') {
                                                                        echo '<a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" style="width:100px;" onclick="deactivateconfirm(\'' . $id . '\')" role="button"> <i class="fas fa-times"></i> Deactivate</a>';
                                                                    } else {
                                                                        echo '<a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" style="width:100px;" onclick="activateconfirm(\'' . $id . '\')" role="button"> <i class="fas fa-check"></i> Activate</a>'
                                                                    ?>

                                                                </div>

                                                            </td>
                                                        </tr>
                                                <?php
                                                                    }
                                                                }

                                                ?>
                                                    </tbody>

                                            </table>
                                        </div>

                                        <script>
                                            function deactivateconfirm(id) {
                                                // Deactivate function
                                                var del = confirm("Are you sure you want to DEACTIVATE this account?");
                                                if (del == true) {
                                                    window.location = 'deactivateaccount.php?deactivateaccount=' + id;
                                                } else {
                                                    return false;
                                                }
                                            }

                                            function activateconfirm(id) {
                                                // Activate function
                                                var del = confirm("Are you sure you want to ACTIVATE this account?");
                                                if (del == true) {
                                                    window.location = 'activateaccount.php?activateaccount=' + id;
                                                } else {
                                                    return false;
                                                }
                                            }
                                        </script>

                                        <!-- <canvas id="myAreaChart"></canvas> -->
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
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure you would like to log out? You will be returned to Login page.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="../logout.php">Logout</a>

                        <!--                 <a href="../logout.php" class="btn btn-squared-default-plain btn-danger">
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

</body>

</html>





<!-- 
<head>
    <title>
        User Accounts - Barangay Records Management System
    </title>

    <link rel="stylesheet" a href="../bootstrap-5.1.1-dist/css/bootstrap.css" />

    <!DOCTYPE html>
    <html lang="en">

    <title>User Accounts - Barangay Records Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
<!-- <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'> -->
<!-- Font Awesome -->
<!-- <link rel="stylesheet" a href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
<!-- CSS -->
<!-- <link rel="stylesheet" a href="../template/useraccounts/css/style.css" /> -->

<!-- Font Awesome -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" /> -->
<!-- MDBootstrap -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" /> -->
<!-- MDBootstrap -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"> -->
<!-- </script> -->

<!-- </head> -->

<!-- <body>
    <div class="card">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <br>
                    <h2 class="heading-section mt-3">User Accounts</h2>
                </div>
            </div>
            <div class="row">
                <?php
                // Account updated -->

                // if (isset($_GET['userupdated'])) {
                //     $Message = $_GET['userupdated'];
                //     $Message = "Account information has been updated";
                // 
                ?>
                //     <div class="alert alert-success text-center">
                //         <?php echo $Message ?>
                //     </div>
                // <?php

                    ?>

                <div class="col-md-12">
                    <div class="row justify-content-evenly">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                            <a class="btn btn-danger me-md-2" href="index.php" type="button">Back</a>
                            <a class="btn btn-success" href="adduser.php" type="button">Add User</a>
                        </div>
                        <!-- <a href="#" class="btn btn-primary">Sign Up</a></td> -->
<!-- </div>
                    <div class="table-wrap">

                        <table class="table">

                            <thead class="thead-primary">

                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <?php
                            // while ($row = mysqli_fetch_assoc($result)) {
                            //     $id = $row['id'];
                            //     $Name = $row['name'];
                            //     $Contact = $row['contact'];
                            //     $Address = $row['address'];
                            //     $Status = $row['status'];
                            //     $Role = $row['usertype'];
                            ?>

                                <tbody>

                                    <tr>
                                        <td>
                                            <?php
                                            echo $Name
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $Contact
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo $Address
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo $Role
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo $Status
                                            ?>
                                        </td>

                                        <td>
                                            <div class="span2">
                                                <a class="btn btn-primary text-light" href="edituser.php?fetchID=<?php echo $id ?>" role="button"> <i class="fas fa-edit"></i> Edit</a>


                                                <a class="btn btn-warning text-light" onclick="deleteconfirm()" role="button"> <i class="fas fa-times"></i> Change code fnction to Disable</a>
                                                <script>
                                                    function deleteconfirm() {
                                                        // var result;
                                                        var del = confirm("Are you sure you want to DISABLE this account? This action cannot be UNDONE!");
                                                        if (del == true) {
                                                            window.location = "deleteaccount.php?deleteaccount=<?php echo $id ?>"
                                                        } else {
                                                            return false;

                                                        }
                                                    }
                                                </script>
                                            </div>
                                        <?php
                                        // }
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
<?php


// mysqli_close($conn);
?>