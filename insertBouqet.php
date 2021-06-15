<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO bouquet (flower_name, price, flower_amount, picture) 
VALUES ('A New Day', '19.99', '10', 'buket1.png'),
('Pretty in pink', '19.99', '30', 'buket2.png'),
('Happiness', '21.99', '19', 'buket3.png'),
('Felicity', '19.99', '25',  'buket4.png'),
('Cool Breeze', '27.99', '18',  'buket5.png'),
('Rainforest fresh', '16.99', '28', 'buket6.png'),
('Colour burst', '18.99', '19',  'buket7.png'),
('Sunrise', '19.99', '25',  'buket8.png'),
('Pink perfection', '23.99', '25',  'buket9.png');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn)

?>