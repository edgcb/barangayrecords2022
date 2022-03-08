<?php
session_start();

require_once("dbconnection.php");

if (isset($_POST['updatedb'])) {
    if (isset($_POST['name'])) {
        $Name = $_POST['name'];
        $query  = "UPDATE users SET name='$Name' WHERE id='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $query);
        header("location: editaccount.php?accountupdated");
    }
    if (isset($_POST['sex'])) {
        $Sex = $_POST['sex'];
        $query  = "UPDATE users SET sex='$Sex' WHERE id=$id";
        $result = mysqli_query($conn, $query);
        header("location: editaccount.php?accountupdated");
    }

    if (isset($_POST['email'])) {
        $Email = $_POST['email'];
        $query  = "UPDATE users SET email='$Email' WHERE id='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $query);
        header("location: editaccount.php?accountupdated");
    }

    if (isset($_POST['contact'])) {
        $Contact = $_POST['contact'];
        $query  = "UPDATE users SET contact='$Contact' WHERE id='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $query);
        header("location: editaccount.php?accountupdated");
    }

    if (isset($_POST['birthdate'])) {
        $Birthdate = $_POST['birthdate'];
        $query  = "UPDATE users SET birthdate='$Birthdate' WHERE id='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $query);
        header("location: editaccount.php?accountupdated");
    }

    if (isset($_POST['address'])) {
        $Address = $_POST['address'];
        $query  = "UPDATE users SET address='$Address' WHERE id='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $query);
        header("location: editaccount.php?accountupdated");
    }
}

if (isset($_POST['changepassword'])) {
    if (empty($_POST['password']) || empty($_POST['password'])) {
        header("location: editaccount.php?empty");
    } else if ($_POST["password"] != $_POST["repeatpassword"]) {
        header("location: editaccount.php?repeatpassword");
    }
    else{
        $Password = $_POST['password'];
        $Hash = password_hash($Password, PASSWORD_DEFAULT);
        $query  = "UPDATE users SET password='$Hash' WHERE id='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $query);
        header("location: editaccount.php?accountupdated");
    }
}
?>

