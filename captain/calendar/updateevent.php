<?php

require_once("../../dbconnection.php");

if(isset($_POST['updateevent']))
    {
        $id = $_POST["id"];
        // $result = mysqli_query($conn, $query);

        if (isset($_POST['event_name'])) {
            $id = $_POST["id"];
            $Eventname = $_POST['event_name'];
            $query  = "UPDATE calendar SET event_name='".$Eventname."' where id = '".$id."'";
            $result = mysqli_query($conn, $query);
            header("location: ../index.php");
        }
        if (empty($_POST['start_date'])) {
            header("location: ../index.php");
        }
        else if (isset($_POST['start_date'])) {
            $id = $_POST["id"];
            $Startdate = $_POST['start_date'];
            $query  = "UPDATE calendar SET start_date='".$Startdate."' where id = '".$id."'";
            $result = mysqli_query($conn, $query);
            header("location: ../index.php");
        }

        // if (empty($_POST['end_date'])) {
        //     header("location: events.php");
        // }
        // else if (isset($_POST['end_date'])) {
        //     $id = $_GET['id'];
        //     $Enddate = $_POST['end_date'];
        //     $query  = "UPDATE calendar SET end_date='".$Enddate."' where id = '".$id."'";
        //     $result = mysqli_query($conn, $query);
        //     header("location: events.php");
        // }

        // $query = "update calendar set event_name = '".$Eventname."', start_date = '".$Startdate."', end_date = '".$Enddate."' where id = '".$id."'";
        // $result = mysqli_query($conn, $query);

        // if($result)
        // {
        //     header("location: events.php");
        // }
        // else
        // {
        //     echo 'Cannot update records. Please try again.';
        // }

    }

?>

