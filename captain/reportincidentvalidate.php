<?php

require_once('../dbconnection.php');

if (isset($_POST['reportincident'])) {

    $Date = $_POST['date'];
    $Time = $_POST['time'];
    $Involved1 = $_POST['involved1'];
    $Involved2 = $_POST['involved2'];
    $Involved3 = $_POST['involved3'];
    $Involved4 = $_POST['involved4'];
    $Involved5 = $_POST['involved5'];
    $Involved6 = $_POST['involved6'];
    $Location = $_POST['location'];
    $Typeofincident = $_POST['type_of_incident'];
    $Details = $_POST['details'];

    $query = "INSERT into incident_reports (date, time, involved1, involved2, involved3, involved4, involved5, involved6, location, type_of_incident, details) values ('$Date', '$Time', '$Involved1','$Involved2','$Involved3','$Involved4','$Involved5','$Involved6','$Location', '$Typeofincident', '$Details')";
    $result = mysqli_query($conn, $query);
    header("location: incidentreports.php?incidentadded");
    exit();
} else {
    header("location: incidentreports.php");
    exit();
}
