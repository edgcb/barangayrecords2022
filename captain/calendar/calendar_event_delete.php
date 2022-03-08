<?php
include('../../dbconnection.php');
if (isset($_POST["id"])) {
    $id = $_POST['id'];
    $query = "DELETE FROM calendar WHERE id = $id";
    $conn->query($query);
}

if (isset($_GET['deleteevent'])) {

    $id = $_GET['deleteevent'];
    $query = "delete from calendar where id = '" . $id . "'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location: events.php");
    } else {
        echo 'Error deleting Event record. Please try again';
    }
} 
