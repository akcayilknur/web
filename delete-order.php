<?php
include 'config.php';
$conn = OpenCon();

    $sql='SELECT * FROM orders WHERE order_id = "'.$_GET["order_id"].'"';
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);

    $delete='DELETE FROM orders WHERE order_id = "'.$_GET["order_id"].'"';

    $time_now = date("H:i");
    $date_now = date("Y-m-d");

    // Check date
    if ($date_now > $result["delivery_date"]) {
        echo '<script> alert("This order has already been completed."); document.location="myorders.php" </script>';
    } else if ($time_now > $result["delivery_time"] && $date_now == $result["delivery_date"]) {
        echo '<script> alert("This order has already been completed."); document.location="myorders.php" </script>';
    } else{
        if (mysqli_query($conn, $delete)) {
            echo '<script> alert("Order cancelled successfully."); document.location="myorders.php" </script>';
        } else {
        echo "Error deleting record: " . mysqli_error($conn);
        }
    }


mysqli_close($conn);
