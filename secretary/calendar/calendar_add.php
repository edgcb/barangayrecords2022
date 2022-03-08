<?php
include('../../dbconnection.php');
if(isset($_POST["event_name"]))
{
    $event_name = $_POST['event_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $query = "INSERT INTO calendar(event_name, start_date, end_date) VALUES ('$event_name','$start_date','$end_date')"; 
    $result = mysqli_query($conn, $query);
}
