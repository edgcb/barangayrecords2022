<?php

require_once("../dbconnection.php");

if(isset($_POST['updatecitizen']))
    {
        $id = $_GET['id'];
        $Firstname = $_POST['first_name'];
        $Middlename = $_POST['middle_name'];
        $Lastname = $_POST['last_name'];
        $Sex = $_POST['sex'];
        $Birthdate = $_POST['birthdate'];
        $Address = $_POST['address'];
        $Zone = $_POST['zone'];
        $Contact = $_POST['contact'];
        $Civilstatus = $_POST['civil_status'];
        $Occupation = $_POST['occupation'];
        $Citizenship = $_POST['citizenship'];

        $query = "update citizen_records set first_name = '".$Firstname."', middle_name = '".$Middlename."', last_name = '".$Lastname."', sex = '".$Sex."', birthdate = '".$Birthdate."', address = '".$Address."', zone = '".$Zone."', contact = '".$Contact."', civil_status = '".$Civilstatus."', occupation = '".$Occupation."', citizenship = '".$Citizenship."'where id = '".$id."'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("location: citizenrecords.php?citizenupdated");
        }
        else
        {
            echo 'Cannot update records. Please try again.';
        }

    }
    else
    {
        header("location: editcitizen.php");
    }

?>

