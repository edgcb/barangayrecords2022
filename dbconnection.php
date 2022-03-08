<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "capstone";
$port = "3307";


$conn = new mysqli($server, $username, $password, $dbname, $port);

if ($conn->connect_error)
die("Connection Failed");
