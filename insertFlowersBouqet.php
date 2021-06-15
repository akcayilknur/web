<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO flowers (name) 
VALUES ('A New Day'),
('Pretty in pink'),
('Happiness'),
('Felicity'),
('Cool Breeze'),
('Rainforest fresh'),
('Colour burst'),
('Sunrise'),
('Pink perfection');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn)

?>