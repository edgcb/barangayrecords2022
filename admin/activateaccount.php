<?php

    require_once("../dbconnection.php");

    if(isset($_GET['activateaccount']))
    {

        $id = $_GET['activateaccount'];

        $query = "UPDATE users SET status='Active' WHERE id= '".$id."'";
        // $query = "delete from users where id = '".$id."'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("location: useraccounts.php");
        }
        else
        {
            echo 'Error deleting data. Please try again';
        }

    }
    else
    {
        header("location: useraccounts.php");
        echo 'An Error occured. Please try again';
    }

?>