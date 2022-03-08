<?php

require_once("../dbconnection.php");

if(isset($_POST['updateincident']))
    {
        $id = $_GET['id'];
        $Date = $_POST['date'];
        $Time = $_POST['time'];
        $Involved1 = $_POST['involved1'];
        $Involved2 = $_POST['involved2'];
        $Involved3 = $_POST['involved3'];
        $Involved4 = $_POST['involved4'];
        $Involved5 = $_POST['involved5'];
        $Involved6 = $_POST['involved6'];
        $Location = $_POST['location'];
        $Typeofincident = $_POST['type_of_incident'];
        $Details = $_POST['details'];
        

        $query = "update incident_reports set date = '".$Date."', time = '".$Time."', involved1 = '".$Involved1."', involved2 = '".$Involved2."', involved3 = '".$Involved3."', involved4 = '".$Involved4."', involved5 = '".$Involved5."', involved6 = '".$Involved6."', location = '".$Location."', type_of_incident = '".$Typeofincident."', details = '".$Details."' where id = '".$id."'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("location: incidentreports.php?incidentupdated");
        }
        else
        {
            echo 'Cannot update records. Please try again.';
        }

    }
    else
    {
        header("location: editincident.php");
    }

?>

