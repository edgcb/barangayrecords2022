<?php
session_start();
require_once("../dbconnection.php");
require_once("logo.php");


if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Admin') {
    }
} else {
    header("location: ../index.php");
}

$id = $_GET['fetchID'];
$query = "SELECT * from users where id = '" . $id . "'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    //$id = $row['id'];
    $Name = $row['name'];
    $Sex = $row['sex'];
    $Email = $row['email'];
    $Contact = $row['contact'];
    $Birthdate = $row['birthdate'];
    $Address = $row['address'];
    $Password = $row['password'];
    $Usertype = $row['usertype'];
}
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
        Edit User's Account - Barangay Records Management
    </title>

</head>

<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit <i><?php echo $Name?>'s</i> Account</h3>
                        <form action="updateuser.php?id=<?php echo $id ?>" method="POST">

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
                                        <input type="text" name="name" id="name" class="form-control form-control-lg" min="1" value="<?php echo $Name ?>" />
                                        <label class="form-label" for="name">Name</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" id="contact" name="contact" class="form-control form-control-lg" min="1" maxlength="11" value="<?php echo $Contact ?>" />
                                        <label class="form-label" for="contact">Contact No.</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 ">

                                    <div class="mb-2 pb-1"> Sex </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" <?php if ($Sex == "Male") echo "checked"; ?> value="Male" autocomplete="on" />
                                        <label class="form-check-label" for="sex">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" <?php if ($Sex == "Female") echo "checked"; ?> value="Female" autocomplete="on" />
                                        <label class="form-check-label" for="sex">Female</label>
                                    </div>

                                    <!-- d-flex align-items-center -->

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                        <label for="birthdate" name="birthdate" class="form-label"> Birthdate (click the calendar button on the right) </label>
                                        <input type="date" name="birthdate" class="form-control form-control-lg" id="birthdate" value="<?php echo $Birthdate ?>" />
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" min="1" value="<?php echo $Email ?>" />
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
                                        <textarea class="form-control" name="address" id="address" rows="3"><?php echo $Address ?> </textarea>
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

                            <div class="row">
                                <div class="mb-2 pb-1 d-flex align-items-center justify-content-center font-weight-bold"> User Type </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">


                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" <?php if ($Usertype == "Captain") echo "checked"; ?> name="usertype" id="usertype" value="Captain" />
                                        <label class="form-check-label" for="usertype">Brgy. Captain</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" <?php if ($Usertype == "Secretary") echo "checked"; ?> name="usertype" id="usertype" value="Secretary" />
                                        <label class="form-check-label" for="usertype">Brgy. Secretary</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" <?php if ($Usertype == "Treasurer") echo "checked"; ?> name="usertype" id="usertype" value="Treasurer" />
                                        <label class="form-check-label" for="usertype">Brgy. Treasurer</label>
                                    </div>

                                </div>
                            </div>


                            <div class="mt-4 pt-2">

                                <button class="btn btn-primary pr-5 btn-lg" name="updateuser" value="Submit" class="" style="width: 120px;"> Update </button>
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

</html>
<?php
// }
?>


<!--
<body>

    <div class="card-body">
        <div class="row justify-content-center mt-auto">
            <div class="col-6" style="width: 400px;">
                <br>
                <br>
                <form action="updateuser.php?id=<?php echo $id ?>" method="POST">
                    <label> Name </label>
                    <input type="text" name="name" placeholder="Name" class="form-control s-3" value="<?php echo $Name ?>">

                    <div class="w-100"></div>

                    <label> Sex </label>
                    <br>
                    <div class="btn-group btn-group-toggle mt-2" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="sex" <?php if ($Sex == "Male") echo "checked"; ?> value="Male" autocomplete="off"> Male
                        </label>
                        <label class="btn btn text-light" style="background-color: #DE3163;">
                            <input type="radio" name="sex" <?php if ($Sex == "Female") echo "checked"; ?> value="Female" autocomplete="off"> Female
                        </label>
                    </div>

                    <div class="w-50 mb-3"></div>
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Email" class="form-control mt-1 mb-2" value="<?php echo $Email ?>">

            </div>

            <div class="col-6" style="width: 400px;">
                <br>
                <br>
                <label>Contact Number</label>
                <input type="text" name="contact" maxlength="13" placeholder="Contact Number" class="form-control mb-2" value="<?php echo $Contact ?>">
                <label>Birthdate (click the calendar button on the right)</label>
                <input type="date" name="birthdate" placeholder="Birthdate" class="form-control my-2 s-3" value="<?php echo $Birthdate ?>">

                <label>Address</label>
                <input type="text" name="address" placeholder="Address" class="form-control my-1" value="<?php echo $Address ?>">

            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-center" style="width:450px">
                User Type
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio" name="usertype" <?php if ($Usertype == "Captain") echo "checked"; ?> value="Captain" autocomplete="off"> Brgy. Captain
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="usertype" <?php if ($Usertype == "Secretary") echo "checked"; ?> value="Secretary" autocomplete="off"> Brgy. Secretary
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="usertype" <?php if ($Usertype == "Treasurer") echo "checked"; ?> value="Treasurer" autocomplete="off"> Brgy. Treasurer
                    </label>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="btn-toolbar row justify-content-center">
        <button class="btn btn-primary pr-5" name="updateuser" class="" style="width: 100px;"> Update </button>
        <div class="w-25"></div>
        <a class="btn btn-danger pl-5" style="width: 100px;" href="useraccounts.php" role="button">Back</a>
        </form>
    </div>
    </div>
    <br>
    <div class="dropdown-divider"></div>
    <div class="row justify-content-center mt-4">
        <h5 class="mb-3 text-center">Change Password</h1>
            <div class="col-6" style="width: 400px;">
                <br>
                <br>
                <form action="updateuser.php?id=<?php echo $id ?>" method="POST">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control mb-2" ?>

                    <label>Repeat Password</label>
                    <input type="password" name="repeatpassword" placeholder="Repeat Password" class="form-control mb-2">
                    <button class="btn btn-danger" name="changepassword"> Change Password </button>

            </div>
    </div>

    </div>
    <br>
    <br>
</body>

</html>
-->