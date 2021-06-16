<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO flowers (name) 
VALUES ('Love of music'),
('Summerday'),
('Foundation of justice'),
('Summer dairy'),
('Perfect teacher'),
('Pretty day'),
('Magic wedding'),
('Caravan moment'),
('Family is perfect');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn)

?>