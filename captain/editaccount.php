<?php

// Template from:
// https://mdbootstrap.com/docs/standard/extended/registration/

session_start();
require_once("../dbconnection.php");
require_once("logo.php");

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Captain') {
    }
} else {
    header("location: ../index.php");
}

$id = $_SESSION['id'];
$query = "SELECT * from users where id=$id";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
?>

    <!DOCTYPE html>

    <head>
        <!-- Bootstrap -->
        <link rel="stylesheet" a href="bootstrap-5.1.1-dist/css/bootstrap.css" />

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <!-- MDBootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />

        <!-- MDBootstrap -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

        <link rel="stylesheet" href="editaccount.css">

        <title>
            Edit Account - Barangay Records Management
        </title>
    </head>


    <body>
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit Account</h3>
                            <form action="updateprofile.php?updatedb=<?php echo $id ?>" method="POST">
                                <!-- <form action="adduservalidate.php" method="POST" autocomplete="off"> -->

                                <?php
                                // Account updated

                                if (isset($_GET['accountupdated'])) {
                                    $Message = $_GET['accountupdated'];
                                    $Message = "Account information has been updated";
                                ?>
                                    <div class="alert alert-success text-center">
                                        <?php echo $Message ?>
                                    </div>
                                <?php
                                }
                                ?>

                                <!-- If Field/s are Empty -->
                                <?php

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


                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" name="name" id="name" class="form-control form-control-lg" min="1" value="<?php echo $row['name'] ?>" />
                                            <label class="form-label" for="name">Name</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="contact" name="contact" class="form-control form-control-lg" min="1" maxlength="11" value="<?php echo $_SESSION['Contact'] ?>" />
                                            <label class="form-label" for="contact">Contact No.</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 ">

                                        <div class="mb-2 pb-1"> Sex </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" <?php if ($_SESSION['Sex'] == "Male") echo "checked"; ?> value="Male" autocomplete="on" />
                                            <label class="form-check-label" for="sex">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" <?php if ($_SESSION['Sex'] == "Female") echo "checked"; ?> value="Female" autocomplete="on" />
                                            <label class="form-check-label" for="sex">Female</label>
                                        </div>

                                        <!-- d-flex align-items-center -->

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                            <label for="birthdate" name="birthdate" class="form-label"> Birthdate (click the calendar button on the right) </label>
                                            <input type="date" name="birthdate" class="form-control form-control-lg" id="birthdate" value="<?php echo $_SESSION['Birthdate'] ?>" />
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input type="email" name="email" id="email" class="form-control form-control-lg" min="1" value="<?php echo $_SESSION['Email'] ?>" />
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
                                            <textarea class="form-control" name="address" id="address" rows="3"><?php echo $_SESSION['Address'] ?> </textarea>
                                            <label class="form-label" for="address">Address</label>
                                        </div>
                                    </div>

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

                                <div class="mt-4 pt-2">

                                    <button class="btn btn-primary pr-5 btn-lg" name="updatedb" value="Submit" class="" style="width: 120px;"> Update </button>
                                    <a class="btn btn-danger pl-5  btn-lg" style="width: 100px;" href="index.php" role="button">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </body>

    </html>
<?php
}
?>