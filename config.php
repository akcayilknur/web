<?php
function OpenCon()
 {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "flower_shop";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die('Could not connect to the database.');
    }
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>