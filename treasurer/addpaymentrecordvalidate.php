<?php

require_once('../dbconnection.php');

if (isset($_POST['addpaymentrecord'])) {
    if (empty($_POST['type_of_payment']) || empty($_POST['amount']) || empty($_POST['date']) || empty($_POST['issue_receipt'])) {
        header("location: addpaymentrecord.php?empty");
    } else {
        $Typeofpayment = mysqli_real_escape_string($conn, $_POST['type_of_payment']);
        $Amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $Date = mysqli_real_escape_string($conn, $_POST['date']);
        $issue_receipt = mysqli_real_escape_string($conn, $_POST['issue_receipt']);

        $query = "INSERT into payments (type_of_payment, amount, date, issue_receipt) values ('$Typeofpayment', '$Amount', '$Date','$issue_receipt')";
        $result = mysqli_query($conn, $query);
        header("location: addpaymentrecord.php?successful");
        exit();
    }
} else {
    header("location: financialrecords.php");
    exit();
}
