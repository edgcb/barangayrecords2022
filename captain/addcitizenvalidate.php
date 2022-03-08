<?php

require_once('../dbconnection.php');

if (isset($_POST['addcitizen'])) {

    $Firstname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $Middlename = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $Lastname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $Sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $Birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $Address = mysqli_real_escape_string($conn, $_POST['address']);
    $Zone = mysqli_real_escape_string($conn, $_POST['zone']);
    $Contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $Civilstatus = mysqli_real_escape_string($conn, $_POST['civil_status']);
    $Occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
    $Citizenship = mysqli_real_escape_string($conn, $_POST['citizenship']);


    $query = "INSERT into citizen_records (first_name, middle_name, last_name, sex, birthdate, address, zone, contact, civil_status, occupation, citizenship) values ('$Firstname', '$Middlename', '$Lastname','$Sex', '$Birthdate', '$Address', '$Zone', '$Contact', '$Civilstatus', '$Occupation', '$Citizenship')";
    $result = mysqli_query($conn, $query);
    header("location: citizenrecords.php?successful");
    exit();
} else {
    header("location: citizenrecords.php");
    exit();
}
