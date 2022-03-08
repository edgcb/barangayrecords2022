<?php

    require_once("../dbconnection.php");

    if(isset($_GET['deactivateaccount']))
    {

        $id = $_GET['deactivateaccount'];

        $query = "UPDATE users SET status='Inactive' WHERE id= '".$id."'";
        // $query = "delete from users where id = '".$id."'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("location: useraccounts.php");
        }
        else
        {
            echo 'Error disabling account. Please try again';
        }

    }
    else
    {
        header("location: useraccounts.php");
        echo 'An Error occured. Please try again';
    }

?>