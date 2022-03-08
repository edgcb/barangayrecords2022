<?php

    require_once("../dbconnection.php");

    if(isset($_GET['deletepaymentrecord']))
    {

        $id = $_GET['deletepaymentrecord'];
        $query = "delete from payments where id = '".$id."'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("location: financialrecords.php");
        }
        else
        {
            echo 'Error deleting record. Please try again';
        }

    }
    else
    {
        header("location: useraccounts.php");
        echo 'An Error occured. Please try again';
    }

?>