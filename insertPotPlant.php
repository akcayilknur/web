<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO potted_plant (flower_name, price, pot_type, pot_color, picture) 
VALUES ('Winter Garden', '19.99', 'Ceramic', 'Brown', 'saksı1.png'),
('Cold Day', '16.99', 'Ceramic', 'Grey', 'saksı2.png'),
('Rainforest', '21.99', 'Clay', 'White', 'saksı3.png'),
('Christmas', '19.99', 'Stone', 'Light Gray', 'saksı4.png'),
('Pink Dream', '15.99', 'Metal', 'Pink', 'saksı5.png'),
('Bridal', '16.99', 'Metal', 'Lavender', 'saksı6.png'),
('Rose Garden', '23.99', 'Metal', 'Gold', 'saksı7.png'),
('Flamingo', '19.99', 'Metal', 'White', 'saksı8.png'),
('Soft Beauty', '21.99', 'Stone', 'Grey', 'saksı9.png');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn)

?>