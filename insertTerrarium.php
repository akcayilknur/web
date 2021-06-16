<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO terrarium (flower_name, price, shape, picture) 
VALUES ('Love of music', '39.99', 'Circular',  't1.png'),
('Summerday', '49.99', 'Circular',  't2.png'),
('Foundation of justice', '47.99', 'Rectangle',  't3.png'),
('Summer dairy', '39.99', 'Rectangle',  't4.png'),
('Perfect teacher', '38.99', 'Circular', 't5.png'),
('Pretty day', '39.99', 'Rectangle',  't6.png'),
('Magic wedding', '39.99', 'Circular',  't7.png'),
('Caravan moment', '36.99', 'Rectangle',  't8.png'),
('Family is perfect', '34.99', 'Circular',  't9.png');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn)

?>