<?php

include 'config.php';
$conn = OpenCon();


$sql = "INSERT INTO flowers (name) 
VALUES ('Winter Garden'),
('Cold Day'),
('Rainforest'),
('Christmas'),
('Pink Dream'),
('Bridal'),
('Rose Garden'),
('Flamingo'),
('Soft Beauty');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn)

?>