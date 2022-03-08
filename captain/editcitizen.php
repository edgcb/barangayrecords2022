<?php
session_start();
require_once("../dbconnection.php");
require_once("logo.php");

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Captain') {
    }
} else {
    header("location: ../index.php");
}

$id = $_GET['fetchID'];
$query = "SELECT * from citizen_records where id = '".$id."'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $Firstname = $row['first_name'];
    $Middlename = $row['middle_name'];
    $Lastname = $row['last_name'];
    $Sex = $row['sex'];
    $Birthdate = $row['birthdate'];
    $Address = $row['address'];
    $Zone = $row['zone'];
    $Contact = $row['contact'];
    $Civilstatus = $row['civil_status'];
    $Occupation = $row['occupation'];
    $Citizenship = $row['citizenship'];
    $space = " ";
    $comma = ",";
}


?>

<!DOCTYPE html>

<head>
    
<link rel="stylesheet" a href="bootstrap-5.1.1-dist/css/bootstrap.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDBootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />


    <!-- MDBootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

    <link rel="stylesheet" href="editcitizen.css">


    <title>
        Edit Citizen's Data - Barangay Records Management
    </title>

</head>


<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit <i><?php echo $Firstname, $space, $Lastname?>'s</i> Data </h3>
                        <form action="updatecitizen.php?id=<?php echo $id ?>" method="POST" autocomplete="off">

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

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">

                                        <input type="text" name="first_name" id="first_name" value="<?php echo $Firstname ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="first_name">First Name</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="middle_name" id="middle_name" value="<?php echo $Middlename ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="first_name">Middle Name</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="last_name" id="last_name" value="<?php echo $Lastname ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="first_name">Last Name</label>
                                    </div>

                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="contact" name="contact" value="<?php echo $Contact ?>" class="form-control form-control-lg" />
                                        <label class="form-label" maxlength="13" for="contact">Contact No.</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="mb-2 pb-1"> Sex </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" <?php if ($Sex == "Male") echo "checked"; ?> id="sex" value="Male" />
                                        <label class="form-check-label" for="sex">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" <?php if ($Sex == "Female") echo "checked"; ?> id="sex" value="Female" />
                                        <label class="form-check-label" for="sex">Female</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">

                                    <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                        <label for="birthdate" name="birthdate" class="form-label"> Birthdate (click the calendar button on the right) </label>
                                        <input type="date" name="birthdate" class="form-control form-control-lg" value="<?php echo $Birthdate ?>" id="birthdate" />
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="mb-2 pb-1 d-flex align-items-center justify-content-center "> Civil Status </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">


                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="civil_status" <?php if ($Civilstatus == "Single") echo "checked"; ?>  id="civil_status" value="Single" />
                                        <label class="form-check-label" for="civil_status">Single</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="civil_status" <?php if ($Civilstatus == "Married") echo "checked"; ?> id="civil_status" value="Married" />
                                        <label class="form-check-label" for="civil_status"> Married </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="civil_status" <?php if ($Civilstatus == "Separated") echo "checked"; ?> id="civil_status" value="Separated" />
                                        <label class="form-check-label" for="civil_status">Separated</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="civil_status" <?php if ($Civilstatus == "Widowed") echo "checked"; ?> id="civil_status" value="Widowed" />
                                        <label class="form-check-label" for="civil_status">Widowed</label>
                                    </div>


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="text" name="zone" value="<?php echo $Zone ?>" id="zone" class="form-control form-control-lg" />
                                        <label class="form-label" for="zone"> Zone </label>
                                    </div>



                                </div>

                                <div class="col-md-6 mb-0">
                                    <div class="form-outline">
                                        <input type="text" name="citizenship" id="citizenship" value="<?php echo $Citizenship ?>" class="form-control form-control-lg amber-border" />
                                        <label class="form-label" for="citizenship"> Citizenship </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="occupation" value="<?php echo $Occupation ?>" id="occupation" class="form-control form-control-lg amber-border" />
                                        <label class="form-label" for="occupation"> Occupation </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <textarea class="form-control" name="address" id="address" rows="3"><?php echo $Address ?></textarea>
                                        <label class="form-label" for="address">Address</label>
                                        <script>
                                            document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                                new mdb.Input(formOutline).update();
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">

                                <button class="btn btn-primary pr-5 btn-lg" name="updatecitizen" value="Submit" class="" style="width: 110px;"> Update </button>
                                <a class="btn btn-danger pl-5  btn-lg" style="width: 100px;" href="citizenrecords.php" role="button">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>



<!-- <body>

    <div class="card-body">
        <div class="row justify-content-center mt-auto">
            <div class="col-6" style="width: 400px;">
                <br>
                <br>
                <form action="updatecitizen.php?id=<?php echo $id ?>" method="POST">
                    <label> First Name </label>
                    <input type="text" name="first_name" placeholder="First Name" class="form-control s-3" value="<?php echo $Firstname ?>">
                    <label> Middle Name </label>
                    <input type="text" name="middle_name" placeholder="Middle Name" class="form-control s-3" value="<?php echo $Middlename ?>">
                    <label> Last Name </label>
                    <input type="text" name="last_name" placeholder="Last Name" class="form-control s-3" value="<?php echo $Lastname ?>">
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

                    <label>Birthdate (click the calendar button on the right)</label>
                    <input type="date" name="birthdate" placeholder="Birthdate" class="form-control my-2 s-3" value="<?php echo $Birthdate ?>">

                    <div class="w-50 mb-3"></div>
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Address" class="form-control my-1" value="<?php echo $Address ?>">
            </div>

            <div class="col-6" style="width: 400px;">
                <br>
                <br>

                <label>Zone</label>
                <input type="text" name="zone" placeholder="Zone" class="form-control my-1" value="<?php echo $Zone ?>">

                <label> Civil Status </label>
                <br>
                <div class="btn-group btn-group-toggle mt-2" data-toggle="buttons">
                    <label class="btn btn-info">
                        <input type="radio" name="civil_status" <?php if ($Civilstatus == "Single") echo "checked"; ?> value="Single" autocomplete="off"> Single
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="civil_status" <?php if ($Civilstatus == "Married") echo "checked"; ?> value="Married" autocomplete="off"> Married
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="civil_status" <?php if ($Civilstatus == "Divorced") echo "checked"; ?> value="Separated" autocomplete="off"> Separated
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="civil_status" <?php if ($Civilstatus == "Widowed") echo "checked"; ?> value="Widowed" autocomplete="off"> Widowed
                    </label>
                </div>
                <label>Occupation</label>
                <input type="text" name="occupation" placeholder="Occupation" class="form-control my-1" value="<?php echo $Occupation ?>">

                <label>Citizenship</label>
                <input type="text" name="citizenship" placeholder="Citizenship" class="form-control my-1" value="<?php echo $Citizenship ?>">
            </div>
        </div>
    </div>
    </div>

    <br>
    <div class="btn-toolbar row justify-content-center">
        <button class="btn btn-primary pr-5" name="updatecitizen" class="" style="width: 100px;"> Update </button>
        <div class="w-25"></div>
        <a class="btn btn-danger pl-5" style="width: 100px;" href="citizenrecords.php" role="button">Back</a>
        </form>
    </div>
    </div>
    <br>
</body>

</html> -->