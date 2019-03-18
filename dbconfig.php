<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

// Create connection
//MySQLi Procedural Code is used
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>