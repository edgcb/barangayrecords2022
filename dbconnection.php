<?php
$server = "dcrhg4kh56j13bnu.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "y5q14t2f9zv0wy8o";
$password = "hcdazye08ydgxven";
$dbname = "ayldjmh4a1830v8y";
$port = "3306";


$conn = new mysqli($server, $username, $password, $dbname, $port);

if ($conn->connect_error)
die("Connection Failed");
