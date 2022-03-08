<?php

    require_once("../dbconnection.php");

    if(isset($_GET['deleteincident']))
    {

        $id = $_GET['deleteincident'];
        $query = "delete from incident_reports where id = '".$id."'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("location: incidentreports.php");
        }
        else
        {
            echo 'Error deleting incident record. Please try again';
        }

    }
    else
    {
        header("location: index.php");
        echo 'An Error occured. Please try again';
    }

?>