<?php
// Template from:
// https://mdbootstrap.com/docs/standard/extended/registration/

require_once('logo.php');
require_once("../../../dbconnection.php");

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Secretary') {
    }
} else {
    header("location: ../../../index.php");
}

$id = $_GET['fetchID'];
$query = "SELECT * from citizen_records where id = '" . $id . "'";
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

<head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDBootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />


    <!-- MDBootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <!-- Template CSS -->
    <link rel="stylesheet" href="../certificate.css">


    <!-- JQuery -->
    <script src="../../../api/jquery-3.6.0.min.js"></script>
    <title>
        Cedula - Barangay Records Management
    </title>
</head>

<body>
    <div class="container py-5 h-500">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Cedula (Community Tax Certificate)</h3>
                        <label class="form-label" for="">*All fields are required (except ICR)</label>
                        <form action="../mpdf.php?id=<?php echo $id?>" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">

                                        <input type="text" name="firstname_cedula" id="firstname_cedula" value="<?php echo $Firstname ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="firstname_cedula">First Name</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="middlename_cedula" id="middlename_cedula" value="<?php echo $Middlename ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="middlename_cedula">Middle Name</label>
                                    </div>

                                </div>
                            </div>
                    <div class="row">
                    <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="surname_cedula" id="surname_cedula" value="<?php echo $Lastname ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="surname_cedula">Last Name</label>
                                    </div>

                                </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="citizenship_cedula" name="citizenship_cedula" value="<?php echo "Filipino" ?>" class="form-control form-control-lg" />
                                <label class="form-label" for="citizenship_cedula">Citizenship</label>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->

                    <div class="row mb-4">
                        <div class="mb-2 pb-1 d-flex align-items-center justify-content-center">TIN </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="tin1_cedula" style="width: 35px;" placeholder="1" class="form-control s-3 inputs" maxlength="1">
                            <input type="text" name="tin2_cedula" style="width: 35px;" placeholder="2" class="form-control s-3 inputs" maxlength="1">
                            <input type="text" name="tin3_cedula" style="width: 35px;" placeholder="3" class="form-control s-3 inputs" maxlength="1">
                            &nbsp;
                            <input type="text" name="tin4_cedula" style="width: 35px;" placeholder="4" class="form-control s-3 inputs" maxlength="1">
                            <input type="text" name="tin5_cedula" style="width: 35px;" placeholder="5" class="form-control s-3 inputs" maxlength="1">
                            <input type="text" name="tin6_cedula" style="width: 35px;" placeholder="6" class="form-control inputs" maxlength="1">
                            &nbsp;
                            <input type="text" name="tin7_cedula" style="width: 35px;" placeholder="7" class="form-control s-3 inputs" maxlength="1">
                            <input type="text" name="tin8_cedula" style="width: 35px;" placeholder="8" class="form-control s-3 inputs" maxlength="1">
                            <input type="text" name="tin9_cedula" style="width: 35px;" placeholder="9" class="form-control s-3 inputs" maxlength="1">
                            <!-- JQuery Script to Auto tab to next number the TIN Form -->
                            <script>
                                $(".inputs").keyup(function() {
                                    if (this.value.length == this.maxLength) {
                                        $(this).next('.inputs').focus();
                                    }
                                });
                            </script>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="mb-2 pb-1"> Sex </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="male_cedula" <?php if ($Sex == "Male") echo "checked"; ?> id="male_cedula" value="Male" />
                                <label class="form-check-label" for="male_cedula">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="female_cedula" <?php if ($Sex == "Female") echo "checked"; ?> id="female_cedula" value="Female" />
                                <label class="form-check-label" for="female_cedula">Female</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                                <textarea class="form-control" name="address_cedula" id="address_cedula" rows="3"><?php echo $Address ?></textarea>
                                <label class="form-label" for="address_cedula">Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="icr_cedula" name="icr_cedula" class="form-control form-control-lg" />
                                <label class="form-label" for="icr_cedula">ICR No. (If an Alien)</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="placeofbirth_cedula" name="placeofbirth_cedula" class="form-control form-control-lg" />
                                <label class="form-label" for="placeofbirth_cedula">Place of Birth</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="mb-2 pb-1 d-flex align-items-center justify-content-center">Height (in feet) </div>
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <label> </label>
                                <input type="text" name="height1_cedula" style="width: 35px;" placeholder="1" class="form-control s-3 height" maxlength="1">
                                &nbsp; ' &nbsp;
                                <input type="text" name="height2_cedula" style="width: 45px;" placeholder="2" class="form-control s-3 height" minlength="1" maxlength="2">
                                &nbsp; " &nbsp;
                                <!-- JQuery Script to Auto tab height to the next form -->
                                <script>
                                    $(".height").keyup(function() {
                                        if (this.value.length == this.maxLength) {
                                            $(this).next('.height').focus();
                                        }
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 mt-3">
                            <div class="form-outline">
                                <input type="text" id="weight_cedula" name="weight_cedula" class="form-control form-control-lg" />
                                <label class="form-label" for="weight_cedula">Weight (in kilograms)</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="occupation_cedula" name="occupation_cedula" class="form-control form-control-lg" />
                                <label class="form-label" for="occupation_cedula">Profession/Occupation/Business</label>
                            </div>
                        </div>


                        <div class="col-md-6 mb-4 ">
                            <div class="">
                                <?php
                                $result = mysqli_query($conn, "SELECT * from citizen_records where id = '" . $id . "'");

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $Birthdate = $row['birthdate'];
                                }

                                $birthmonth = date('m', strtotime($Birthdate));
                                ?>
                                <select id="birthmonthcedula" name="birthmonthcedula" class="btn-light btn-outline-dark form-control form-control-md">
                                    <option value="" disabled selected>Month</option>
                                    <option value="1" <?php if ($birthmonth === '01') echo 'selected="selected"'; ?>> January </option>
                                    <option value="2" <?php if ($birthmonth === '02') echo 'selected="selected"'; ?>> February </option>
                                    <option value="3" <?php if ($birthmonth === '03') echo 'selected="selected"'; ?>> March </option>
                                    <option value="4" <?php if ($birthmonth === '04') echo 'selected="selected"'; ?>> April </option>
                                    <option value="5" <?php if ($birthmonth === '05') echo 'selected="selected"'; ?>> May </option>
                                    <option value="6" <?php if ($birthmonth === '06') echo 'selected="selected"'; ?>> June </option>
                                    <option value="7" <?php if ($birthmonth === '07') echo 'selected="selected"'; ?>> July </option>
                                    <option value="8" <?php if ($birthmonth === '08') echo 'selected="selected"'; ?>> August </option>
                                    <option value="9" <?php if ($birthmonth === '09') echo 'selected="selected"'; ?>> September </option>
                                    <option value="10" <?php if ($birthmonth === '10') echo 'selected="selected"'; ?>> October </option>
                                    <option value="11" <?php if ($birthmonth === '11') echo 'selected="selected"'; ?>> November </option>
                                    <option value="12" <?php if ($birthmonth === '12') echo 'selected="selected"'; ?>> December </option>
                                </select>
                                <label class="form-label" for="birthmonthcedula"></label>
                                <div class="form-helper">Date of Birth (Month)</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 ">
                            <div class="">
                                <?php
                                $result = mysqli_query($conn, "SELECT * from citizen_records where id = '" . $id . "'");

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $Birthdate = $row['birthdate'];
                                }

                                $birthday = date('d', strtotime($Birthdate));
                                ?>
                                <select id="birthdaycedula" name="birthdaycedula" class="btn-light btn-outline-dark form-control form-control-md">
                                    <option value="" disabled selected>Day</option>
                                    <option value="1" <?php if ($birthday === '01') echo 'selected="selected"'; ?>> 1 </option>
                                    <option value="2" <?php if ($birthday === '02') echo 'selected="selected"'; ?>> 2 </option>
                                    <option value="3" <?php if ($birthday === '03') echo 'selected="selected"'; ?>> 3 </option>
                                    <option value="4" <?php if ($birthday === '04') echo 'selected="selected"'; ?>> 4 </option>
                                    <option value="5" <?php if ($birthday === '05') echo 'selected="selected"'; ?>> 5 </option>
                                    <option value="6" <?php if ($birthday === '06') echo 'selected="selected"'; ?>> 6 </option>
                                    <option value="7" <?php if ($birthday === '07') echo 'selected="selected"'; ?>> 7 </option>
                                    <option value="8" <?php if ($birthday === '08') echo 'selected="selected"'; ?>> 8 </option>
                                    <option value="9" <?php if ($birthday === '09') echo 'selected="selected"'; ?>> 9 </option>
                                    <option value="10" <?php if ($birthday === '10') echo 'selected="selected"'; ?>> 10 </option>
                                    <option value="11" <?php if ($birthday === '11') echo 'selected="selected"'; ?>> 11 </option>
                                    <option value="12" <?php if ($birthday === '12') echo 'selected="selected"'; ?>> 12 </option>
                                    <option value="13" <?php if ($birthday === '13') echo 'selected="selected"'; ?>> 13 </option>
                                    <option value="14" <?php if ($birthday === '14') echo 'selected="selected"'; ?>> 14 </option>
                                    <option value="15" <?php if ($birthday === '15') echo 'selected="selected"'; ?>> 15 </option>
                                    <option value="16" <?php if ($birthday === '16') echo 'selected="selected"'; ?>> 16 </option>
                                    <option value="17" <?php if ($birthday === '17') echo 'selected="selected"'; ?>> 17 </option>
                                    <option value="18" <?php if ($birthday === '18') echo 'selected="selected"'; ?>> 18 </option>
                                    <option value="19" <?php if ($birthday === '19') echo 'selected="selected"'; ?>> 19 </option>
                                    <option value="20" <?php if ($birthday === '20') echo 'selected="selected"'; ?>> 20 </option>
                                    <option value="21" <?php if ($birthday === '21') echo 'selected="selected"'; ?>> 21 </option>
                                    <option value="22" <?php if ($birthday === '22') echo 'selected="selected"'; ?>> 22 </option>
                                    <option value="23" <?php if ($birthday === '23') echo 'selected="selected"'; ?>> 23 </option>
                                    <option value="24" <?php if ($birthday === '24') echo 'selected="selected"'; ?>> 24 </option>
                                    <option value="25" <?php if ($birthday === '25') echo 'selected="selected"'; ?>> 25 </option>
                                    <option value="26" <?php if ($birthday === '26') echo 'selected="selected"'; ?>> 26 </option>
                                    <option value="27" <?php if ($birthday === '27') echo 'selected="selected"'; ?>> 27 </option>
                                    <option value="28" <?php if ($birthday === '28') echo 'selected="selected"'; ?>> 28 </option>
                                    <option value="29" <?php if ($birthday === '29') echo 'selected="selected"'; ?>> 29 </option>
                                    <option value="30" <?php if ($birthday === '30') echo 'selected="selected"'; ?>> 30 </option>
                                    <option value="31" <?php if ($birthday === '31') echo 'selected="selected"'; ?>> 31 </option>
                                </select>
                                <label class="form-label" for="birthdaycedula"></label>
                                <div class="form-helper">Date of Birth (Day)</div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <?php
                                $result = mysqli_query($conn, "SELECT * from citizen_records where id = '" . $id . "'");

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $Birthdate = $row['birthdate'];
                                }

                                $birthyear = date('Y', strtotime($Birthdate));
                                ?>
                                <input type="text" id="birthyearcedula" name="birthyearcedula" value="<?php echo $birthyear ?>" class="form-control form-control-lg" />
                                <label class="form-label" for="birthyearcedula">Date of Birth (Year)</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2 mb-4">
                        <div class="mb-2 pb-1 d-flex align-items-center justify-content-center">Civil Status </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="single_cedula" <?php if ($Civilstatus == "Single") echo "checked"; ?> id="single_cedula" value="Single" />
                                <label class="form-check-label" for="single_cedula">Single</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="married_cedula" <?php if ($Civilstatus == "Married") echo "checked"; ?> id="married_cedula" value="Married" />
                                <label class="form-check-label" for="married_cedula">Married</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="widowed_cedula" <?php if ($Civilstatus == "Widowed") echo "checked"; ?> id="widowed_cedula" value="Widowed" />
                                <label class="form-check-label" for="widowed_cedula">Widowed</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="divorced_cedula" <?php if ($Civilstatus == "Divorced") echo "checked"; ?> id="divorced_cedula" value="Divorced" />
                                <label class="form-check-label" for="divorced_cedula">Divorced</label>
                            </div>

                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="mb-2 pb-1 d-flex align-items-center justify-content-center">Basic Community Tax (P5.00) Voluntary or Excempted (P1.00) </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="5_cedula" id="5_cedula" value="5" />
                                <label class="form-check-label" for="5_cedula">P 5.00</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="1_cedula" id="1_cedula" value="1" />
                                <label class="form-check-label" for="1_cedula">P 1.00</label>
                            </div>

                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" id="grossreceipt_taxable" name="grossreceipt_taxable" class="form-control form-control-lg" />
                                <label class="form-label" for="grossreceipt_taxable">Gross Receipts or Earnings</label>
                                <div class="form-helper"> (Type 0 if none) Gross Receipts Or Earnings Derived from Business During the Preceeding Year (P1.00 for every P1,000.00)</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" id="salary_taxable" name="salary_taxable" class="form-control form-control-lg" />
                                <label class="form-label" for="salary_taxable">Salaries or Gross Receiptor</label>
                                <div class="form-helper">(Type 0 if none) Salaries or Gross Receiptor Earnings Derived from Exercise of Profession or Pursuit of Any Occupation (P1.00 for every 1,000)</div>
                            </div>
                        </div>
                        <div class="col mb-5">
                        </div>

                    </div>
                    <div class="row mt-5">

                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" id="income_taxable" name="income_taxable" class="form-control form-control-lg" />
                                <label class="form-label" for="income_taxable">Income from Real Property</label>
                                <div class="form-helper">(Type 0 if none) Income from Real Property (P1.00 for every 1,000)</div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-5">
                            <div class="form-outline">
                                <input type="text" id="interest_cedula" name="interest_cedula" class="form-control form-control-lg" />
                                <label class="form-label" for="interest_cedula">Interest</label>
                                <div class="form-helper">(Type 0 if none) </div>
                            </div>
                        </div>

                        <script>
                            document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                new mdb.Input(formOutline).update();
                            });
                        </script>

                        <div class="mt-5 pt-2 mb-5">

                            <button class="btn btn-success pr-5 btn-lg" name="generate_cedula" class="" style="width: 140px;"> Generate </button>
                            <a class="btn btn-danger pl-5  btn-lg" style="width: 100px;" href="../../barangaycertificates.php" role="button">Back</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>