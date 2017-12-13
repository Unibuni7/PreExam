<?php
/**
 * Created by PhpStorm.
 * User: slmns
 * Date: 11-12-2017
 * Time: 21:16
 */


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "progexam_1";
$port = "8889";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
$conn->set_charset("uft8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>