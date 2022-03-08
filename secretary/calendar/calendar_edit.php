<?php
include('../../dbconnection.php');
if(isset($_POST["event_id"]))
{
    $event_title = $_POST['event_title'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $event_id = $_POST['event_id'];
    $query = "UPDATE calendar SET event_name='$event_title', start_date='$start_date', end_date='$end_date' WHERE id = $event_id"; 
    $conn->query($query); 
}
?>