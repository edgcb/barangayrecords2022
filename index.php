<?php
// require_once('logo.php');
session_start();

if (isset($_SESSION['usertype'])) {
    session_start();
    if ($_SESSION['usertype'] == 'Admin') {
        header("location: admin/index.php");
    } else if ($_SESSION['usertype'] == 'Captain') {
        header("location: captain/index.php");
    } else if ($_SESSION['usertype'] == 'Secretary') {
        header("location: secretary/index.php");
    } else if ($_SESSION['usertype'] == 'Treasurer') {
        header("location: treasurer/index.php");
    }
}

/*  
   OLD TEMPLATE
    Template from (login form):
    https://bootsnipp.com/snippets/3522X
*/
?>

<head>
    <!-- New -->
    <!-- Custom fonts for this template-->
    <link href="new-template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="new-template/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- ---------------------------- -->

    <!-- <link rel="stylesheet" a href="bootstrap-5.1.1-dist/css/bootstrap.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="index.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"> -->

    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-info topbar mb-5 py-5 static-top shadow">
            <!-- Topbar Search -->

            <div class="rounded mx-auto d-block">
                <img src="logo.png" style="width:600px;height:150px;">
            </div>

            <!-- Topbar Navbar -->
            <!-- <ul class="navbar-nav ml-auto py-5">
            </ul> -->
        </nav>
        <!-- End of Topbar -->

        <title>
            Barangay Records Management System
        </title>
</head>


<body class="bg-gradient-primary">

    <div class="container mt-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form action="loginvalidate.php" method="POST" class="user">
                                        <!-- <form > -->
                                        <!-- <div class="input-group mb-3 justify-content-center">
                                            <label for="usertype" placeholder="User type"></label>
                                            <select id="usertype" name="usertype" class="btn btn-dark btn">
                                                <option value=""> User type </option>
                                                <option value="admin"> Admin </option>
                                                <option value="captain"> Brgy. Captain </option>
                                                <option value="secretary"> Brgy. Secretary </option>
                                                <option value="treasurer"> Brgy. Treasurer </option>
                                            </select>
                                        </div> -->

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="Email" id="Email" aria-describedby="emailHelp" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="Password" id="Password" placeholder="Password">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="login" class="pt-3" id="login" type="submit"> Login </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="createaccount.php">Create an Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>


<!-- <body class=bg-text-primary>
    <div class="bg-text-dark"> -->
<?php



// if (isset($_SESSION) && empty($_SESSION)) {
//     session_start();
// }
?>

<!-- <div class="container">
            <div class="row">

                <div card text-center>
                    <form action="loginvalidate.php" method="POST">

                        <div class="card-body text-center my-3 mb-3">
                            <div class="col-lg-3 m-auto jus">
                                <p class="fs-3"> Log in </p>
                                <br>
                                 -->
<!-- <div class="card-body text-center my-3 mb-0"> -->


<!-- <label for="usertype" placeholder="User type"></label>
                                    <select id="usertype" name="usertype" class="btn btn-light btn">
                                        <option value=""> User type </option>
                                        <option value="admin"> Admin </option>
                                        <option value="captain"> Brgy. Captain </option>
                                        <option value="secretary"> Brgy. Secretary </option>
                                        <option value="treasurer"> Brgy. Treasurer </option>
                                    </select>
                                    <br>
                                    <br>
                                    <br> -->


<!-- login form-->
<!-- <input type="email" name="Email" placeholder="Email" id="Email" class="form-control my-1">
                                    <input type="password" name="Password" placeholder="Password" id="Password" class="form-control mb-5"> -->

<!-- login button -->
<!-- <button class="btn btn-primary" name="login" class="pt-3" id="login" type="submit"> Log in </button>
                                    <br>
                                    <br> -->

<!-- create account button -->
<!-- <a button type="button" class="btn btn-link" href="createaccount.php"> Create Account </button>
                    </form>
                </div>
            </div> -->
<!-- <div class="container h-100 mt-5">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="brand_logo_container">
                            <img src="pacol.png" class="brand_logo" alt="Logo" width="10px">
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>

                    <div class="justify-content-center mt-0"> -->
<?php
//Invalid password


// if (isset($_GET['Password_Invalid'])) {
//     $Message = $_GET['Password_Invalid'];
//     $Message = "Password is Invalid. Please try again.";

?>
<!-- <div class="alert alert-danger text-center"> -->
<?php //echo $Message 
?>
<!-- </div> -->
<?php //}
?>
<?php
// Wrong credentials (User type, email)
// if (isset($_GET['wrongcredentials'])) {
//     $Message = $_GET['wrongcredentials'];
//     $Message = "Wrong credentials (User type and/or email)";

?>
<!-- <div class="alert alert-danger text-center">
                                <?php echo $Message ?>
                            </div> -->
<?php // }
?>
<?php
// If Field/s are Empty

// if (isset($_GET['empty'])) {
//     $Message = $_GET['empty'];
//     $Message = "Please fill out empty fields (User type, email and/or password)";
?>
<!-- <div class="alert alert-danger text-center">
                                <?php echo $Message ?>
                            </div> -->

<?php
// }
?>
</div>

<!-- <div class="d-flex justify-content-center form_container mt-0">
                        <form action="loginvalidate.php" method="POST">
                            <div class="input-group mb-3 justify-content-center">
                                <label for="usertype" placeholder="User type"></label>
                                <select id="usertype" name="usertype" class="btn btn-light btn">
                                    <option value=""> User type </option>
                                    <option value="admin"> Admin </option>
                                    <option value="captain"> Brgy. Captain </option>
                                    <option value="secretary"> Brgy. Secretary </option>
                                    <option value="treasurer"> Brgy. Treasurer </option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="email" name="Email" class="form-control input_user" id="Email" placeholder="Email Address">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="Password" class="form-control input_pass" id="Password" placeholder="Password">
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                 <button class="btn btn-primary" name="login" class="pt-3" id="login" type="submit"> Log in </button> -->
<!-- <button class="btn login_btn" name="login" id="login" type="submit">Log in</button> -->
</div>
</form>
</div>

<!-- <div class="mt-0">
                        <div class="d-flex justify-content-center links">
                            <a href="createaccount.php" class="ml-2">Create account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

</body>

</html>