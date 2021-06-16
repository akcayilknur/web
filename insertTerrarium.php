<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO terrarium (flower_name, price, shape, picture) 
VALUES ('Love of music', '39.99', 'circular',  't1.png'),
('Summerday', '49.99', 'circular',  't2.png'),
('Foundation of justice', '39.99', 'rectangle',  't3.png'),
('Summer dairy', '39.99', 'rectangle',  't4.png'),
('Perfect teacher', '39.99', 'circular', 't5.png'),
('Pretty day', '39.99', 'rectangle',  't6.png'),
('Magic wedding', '49.99', 'circular',  't7.png'),
('Caravan moment', '39.99', 'rectangle',  't8.png'),
('Family is perfect', '39.99', 'circular',  't9.png');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn)

?>