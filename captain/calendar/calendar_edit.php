<?php
include('../../dbconnection.php');
if(isset($_POST["id"]))
{
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $id = $_POST['id'];
    $query = "UPDATE calendar SET event_name='$title', start_date='$start', end_date='$end' WHERE id = $id"; 
    $conn->query($query); 
}
?>