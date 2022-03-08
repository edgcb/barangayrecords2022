<?php

//if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    unset($_SESSION);
    session_destroy();
    session_write_close();

    header("Location: index.php");
    die();
    // exit;
// }
