<?php
$dbhost = 'localhost'; 
$dbuser = 'root'; 
$dbpass = ''; 
$dbname = 'hometeq';
//create a DB connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//if the DB connection fails, display an error message and exit
if ($conn->connect_error) {
    die('Could not connect: ' . mysqli_connect_error());
}
//select the database
mysqli_select_db($conn, $dbname);
?>