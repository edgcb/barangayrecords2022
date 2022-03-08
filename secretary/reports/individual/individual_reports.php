<?php
session_start();
require_once('../logo.php');
require_once("../../../dbconnection.php");

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Secretary') {
    }
} else {
    header("location: ../../../index.php");
}

?>



<head>
    <link rel="stylesheet" a href="../../../bootstrap-5.1.1-dist/css/bootstrap.css" />

    <title>
        Individual - Barangay Records Management
    </title>
</head>

<!DOCTYPE html>


<div class="container">
    <div class="row">
        <div class="col">
            <br>
            <p class="fs-3 mb-0"> Individual
                <br>
                <div class="fs-6 mt-1">
                Reports
                </div>
            </p>


        </div>

    </div>


    <div class="container text-center">


        <br>
        <div class="row">
            <div class="col">

                <a href="barangaycertification_reports.php" class="btn btn-squared-default-plain btn-primary">
                    <br>
                    <h6 class="text-start"> Barangay <small>Certification</small></h6>
                    
                </a>
                <a href="barangayclearance_reports.php" class="btn btn-squared-default-plain btn-primary">
                    <br>
                    <h6 class="text-start text-wrap" > Barangay <small>Clearance</small> </h6>
                </a>
                <a href="indigencycertificate_reports.php" class="btn btn-squared-default-plain btn-primary">
                    <br>
                    <h6 class="text-start"> Indigency <small>Certificate</small></h6>
                </a>
                <a href="certificateofresidency_reports.php" class="btn btn-squared-default-plain btn-primary">
                    <br>
                    <h6 class="text-start"> Certificate <small>of Residency</small></h6>

                </a>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col">

            

                <a href="healthcertificate_reports.php" class="btn btn-squared-default-plain btn-primary">
                    <br>
                    <h6 class="text-start text-wrap"> Health <small>Certificate</small> </h6>
                </a>
                <a href="certificateofgoodmoral_reports.php" class="btn btn-squared-default-plain btn-primary">
                    <br>
                    <h6 class="text-start"> Certificate <small>of Good Moral</small></h6>
                </a>
                <a href="cedula_reports.php" class="btn btn-squared-default-plain btn-primary">
                    <br>
                    <h6 class="text-start"> Cedula </h6>
                </a>
                <a href="../reports.php" class="btn btn-squared-default-plain btn-danger">
                    <br>
                    <h6 class="text-start"> Back </h6>
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
    </style>