<?php
session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Treasurer') {
    }
} else {
    header("location: index.php");
}

require_once('logo.php');
require_once("../dbconnection.php");

?>

<head>
    <link rel="stylesheet" a href="../bootstrap-5.1.1-dist/css/bootstrap.css" />
    <title>
        Barangay Payments & Fees - Barangay Records Management
    </title>
</head>

<div class="container">
    <div class="row">
        <div class="col">
            <br>
            <br>
            <p class="fs-3 mb-0"> Barangay Payments & Fees </p>
            <br>
            </p>


        </div>
        <div class="col col-lg-2 mt-3">
            <br>
            <a class="text-end btn btn-danger" href="index.php" role="button"> Back </a>
        </div>
    </div>


    <div class="container text-center">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <a href="payments/taxreceipt.php" class="btn btn-squared-default-plain btn-primary">
                    <br>
                    <h6 class="text-start"> Tax Receipt </h6>
                </a>
                <a href="payments/certreceipt.php" class="btn btn-squared-default-plain btn-primary">
                    <br>
                    <h6 class="text-start"> Barangay Certificates Payment </h6>
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