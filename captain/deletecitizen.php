<?php

    require_once("../dbconnection.php");

    if(isset($_GET['deletecitizen']))
    {

        $id = $_GET['deletecitizen'];
        $query = "delete from citizen_records where id = '".$id."'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("location: citizenrecords.php");
        }
        else
        {
            echo 'Error deleting citizen record. Please try again';
        }

    }
    else
    {
        header("location: index.php");
        echo 'An Error occured. Please try again';
    }

?>