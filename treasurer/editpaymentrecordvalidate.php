<?php

require_once("../dbconnection.php");

if(isset($_POST['editpaymentrecord']))
    {
        $id = $_GET['id'];
        $Typeofpayment = mysqli_real_escape_string($conn, $_POST['type_of_payment']);
        $Amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $Date = mysqli_real_escape_string($conn, $_POST['date']);
        $issue_receipt = mysqli_real_escape_string($conn, $_POST['issue_receipt']);

        $query = "update payments set type_of_payment = '".$Typeofpayment."', amount = '".$Amount."', date = '".$Date."', issue_receipt = '".$issue_receipt."' WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("location: financialrecords.php?paymentrecordupdated");
        }
        else
        {
            echo 'Cannot update payment record. Please try again.';
        }

    }
    else
    {
        header("location: editcitizen.php");
    }

?>
?>

