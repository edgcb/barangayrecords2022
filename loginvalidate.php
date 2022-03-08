<?php

session_start();
require_once('dbconnection.php');

if (isset($_POST['login'])) {
    if (empty($_POST['Email']) || empty($_POST['Password'])) {
        header("location: index.php?empty");
        exit();
    } else {
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);
        // $Usertype = mysqli_real_escape_string($conn, $_POST['usertype']);

        $Query = "SELECT * from users where email='" . $Email . "'";
        $result = mysqli_query($conn, $Query);

        if ($row = mysqli_fetch_assoc($result)) {
            $HashPass = password_verify($Password, $row['password']);

            // Password verification
            if ($HashPass == false) {
                header("location: index.php?Password_Invalid");
                exit();
            } elseif ($HashPass == true) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['Name'] = $row['name'];
                $_SESSION['Sex'] = $row['sex'];
                $_SESSION['Email'] = $row['email'];
                $_SESSION['Contact'] = $row['contact'];
                $_SESSION['Birthdate'] = $row['birthdate'];
                $_SESSION['Address'] = $row['address'];
                $_SESSION['Password'] = $row['password'];
                $_SESSION['usertype'] = $row['usertype'];

                // Identifies user type and redirects to user's appropriate page
                if ($_SESSION['usertype'] == 'Admin') {
                    header("location: admin/index.php");
                    //echo "Hey, your membership is admin, here is your page";
                } else if ($_SESSION['usertype'] == 'Captain') {
                    header("location: captain/index.php");
                } else if ($_SESSION['usertype'] == 'Secretary') {
                    header("location: secretary/index.php");
                }
                else if($_SESSION['usertype'] == 'Treasurer') {
                    header("location: treasurer/index.php");
                }
                else if($_SESSION['usertype'] != $Usertype) {
                    
                }
                exit();
            }
        } else {
            header("location: index.php?wrongcredentials");
            exit();
        }
    }
} else {
    header("location: index.php");
    exit();
}
