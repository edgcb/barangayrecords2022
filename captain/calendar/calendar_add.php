<?php
include('../../dbconnection.php');
if(isset($_POST["addevent"]))
{
    $title = $_POST['event_name'];
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $sql = "INSERT INTO calendar(event_name, start_date, end_date) VALUES ('$title','$start','$end')"; 
    $conn->query($sql); 
    header("location: ../index.php");
}
