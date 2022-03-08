<?php

require_once('../dbconnection.php');

if (isset($_POST['adduser'])) {
    if (empty($_POST['name']) || empty($_POST['sex']) || empty($_POST['email']) || empty($_POST['contact']) || empty($_POST['birthdate']) || empty($_POST['address']) || empty($_POST['password']) || empty($_POST['repeatpassword']) || empty($_POST['usertype'])) {
        header("location: adduser.php?empty");
    } else if ($_POST["password"] != $_POST["repeatpassword"]) {
        header("location: adduser.php?repeatpassword");

    } else {
        $Name = mysqli_real_escape_string($conn, $_POST['name']);
        $Sex = mysqli_real_escape_string($conn, $_POST['sex']);
        $Email = mysqli_real_escape_string($conn, $_POST['email']);
        $Contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $Birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
        $Address = mysqli_real_escape_string($conn, $_POST['address']);
        $Password = mysqli_real_escape_string($conn, $_POST['password']);
        $Usertype = mysqli_real_escape_string($conn, $_POST['usertype']);

        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            header("location: adduser.php?VerifyEmail");
            exit();
        } else {

            if (mysqli_fetch_assoc($result)) {
                header("location: adduser.php?User");
                exit();
            } else {
                $query = "select * from users where email='" . $Email . "'";
                $result = mysqli_query($conn, $query);

                if (mysqli_fetch_assoc($result)) {
                    header("location: adduser.php?EmailTaken");
                    exit();
                } else {
                    $Hash = password_hash($Password, PASSWORD_DEFAULT);
                    $query = "INSERT into users (name, sex, email, contact, birthdate, address, password, session, usertype) values ('$Name', '$Sex', '$Email','$Contact', '$Birthdate', '$Address', '$Hash', '', '$Usertype')";
                    $result = mysqli_query($conn, $query);
                    header("location: adduser.php?successful");
                    exit();
                }
            }
        }
    }
} else {
    header("location: ../index.php");
    exit();
}
