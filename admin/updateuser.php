<?php
session_start();
require_once("../dbconnection.php");

if (isset($_POST['updateuser'])) {
    $id = $_GET['id'];
    if (isset($_POST['name'])) {
        $id = $_GET['id'];
        $Name = $_POST['name'];
        $query  = "UPDATE users SET name='$Name' WHERE id='".$id."'";
        $result = mysqli_query($conn, $query);
        header("location: useraccounts.php?userupdated");
    }
    if (isset($_POST['sex'])) {
        $id = $_GET['id'];
        $Sex = $_POST['sex'];
        $query  = "UPDATE users SET sex='$Sex' WHERE id='".$id."'";
        $result = mysqli_query($conn, $query);
        header("location: useraccounts.php?userupdated");
    }

    if (isset($_POST['email'])) {
        $id = $_GET['id'];
        $Email = $_POST['email'];
        $query  = "UPDATE users SET email='$Email' WHERE id='".$id."'";
        $result = mysqli_query($conn, $query);
        header("location: useraccounts.php?userupdated");
    }

    if (isset($_POST['contact'])) {
        $id = $_GET['id'];
        $Contact = $_POST['contact'];
        $query  = "UPDATE users SET contact='$Contact' WHERE id='".$id."'";
        $result = mysqli_query($conn, $query);
        header("location: useraccounts.php?userupdated");
    }

    if (isset($_POST['birthdate'])) {
        $id = $_GET['id'];
        $Birthdate = $_POST['birthdate'];
        $query  = "UPDATE users SET birthdate='$Birthdate' WHERE id='".$id."'";
        $result = mysqli_query($conn, $query);
        header("location: useraccounts.php?userupdated");
    }

    if (isset($_POST['address'])) {
        $id = $_GET['id'];
        $Address = $_POST['address'];
        $query  = "UPDATE users SET address='$Address' WHERE id='".$id."'";
        $result = mysqli_query($conn, $query);
        header("location: useraccounts.php?userupdated");
    }

    if (isset($_POST['usertype'])) {
        $id = $_GET['id'];
        $Usertype = $_POST['usertype'];
        $query  = "UPDATE users SET usertype='$Usertype' WHERE id='".$id."'";
        $result = mysqli_query($conn, $query);
        header("location: useraccounts.php?userupdated");
    }
}

    if (empty($_POST['password']) || empty($_POST['password'])) {
        
    } else if ($_POST["password"] != $_POST["repeatpassword"]) {
        header("location: edituser.php?repeatpassword");
    }
    else{
        $id = $_GET['id'];
        $Password = $_POST['password'];
        $Hash = password_hash($Password, PASSWORD_DEFAULT);
        $query  = "UPDATE users SET password='$Hash' WHERE id='".$id."'";
        $result = mysqli_query($conn, $query);
        header("location: useraccounts.php?userupdated");
    }
