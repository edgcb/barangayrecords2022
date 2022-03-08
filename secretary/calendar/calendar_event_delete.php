<?php
include('../../dbconnection.php');

// Deleting Calendar Event (from Calendar)
if (isset($_POST["event_id"])) {
    $event_id = $_POST['event_id'];
    $query = "DELETE FROM calendar WHERE id = $event_id";
    $result = mysqli_query($conn, $query);
}

// Deleting Calendar Event
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
