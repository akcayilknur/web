<?php
// Include the database configuration file
include 'config.php';
$conn = OpenCon();
session_start();

if (empty($_SESSION['email'])) {
    echo '<script> alert("Please login first to see your orders."); document.location="login.php" </script>';
}

$email = $_SESSION['email'];
$sql1 = 'SELECT * FROM user_register WHERE email = "' . $email . '"';
$query1 = mysqli_query($conn, $sql1);
$customer = mysqli_fetch_array($query1);
$customer_id = $customer['id'];

$sql = "SELECT * FROM orders WHERE customer_id=" . $customer_id . " ORDER BY delivery_date";
$query = mysqli_query($conn, $sql);
$rows = array();
while ($result = mysqli_fetch_array($query)) {
    $rows[] = $result;
}

?>


<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>BE FLOWERS</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="myorders.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>

<body>

    <div id="menu">
        <ul>
            <li><a href="anasayfa.php" accesskey="1" title="">Main menu</a></li>
            <li><a href="saksı.php" accesskey="2" title="">Potted Plant</a></li>
            <li><a href="buket.php" accesskey="3" title="">Bouquet</a></li>
            <li><a href="teraryum.php" accesskey="4" title="">Terrarıum</a></li>
            <li class="active"><a href="myorders.php" accesskey="5" title="">My Orders</a></li>
            <li><a href="contact.php" accesskey="6" title="">Contact</a></li>
            <li><a href="logout.php" accesskey="7" title="">Log Out</a></li>
        </ul>
    </div>
    <!-- end #menu -->
    <div id="header">
        <div id="logo">

            <h1><a href="#" style="color: #be3489;">BE FLOWERS </a></h1>
            <h2><a href="http://www.freecsstemplates.org/" style="color: #000000;"> for best day...</a></h2>
        </div>
        <div id="banner">
            <a href="#"> </a>
        </div>
    </div>
    <!-- end #header -->


    <div id="page">
        <div id="content">
            <div class="post">
                <h1>MY ORDERS</h1>
                <table>
                    <tr>
                        <th>Order</th>
                        <th>Flower Name</th>
                        <th>Receiver Name</th>
                        <th>Address</th>
                        <th>Message</th>
                        <th>Delivery Date</th>
                        <th>Delivery Time</th>
                        <th>Total</th>
                        <th>Cancel Order</th>

                    </tr>
                    <?php
                    $i = 1;
                    foreach ($rows as $row) {
                        $date = strtok($row['delivery_date'], "-");
                        $date2 = strtok("-");
                        $date3 = strtok("-");

                        $time = strtok($row['delivery_time'], ":");
                        $time2 = strtok(":");
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["flower_name"]; ?></td>
                            <td><?php echo $row["receiver_name"]; ?></td>
                            <td><?php echo $row["address"]; ?></td>
                            <td><?php echo $row["message"]; ?></td>
                            <td><?php echo $date3 . '/' . $date2 . '/' . $date ?></td>
                            <td><?php echo $time . ':' . $time2 ?></td>
                            <td><?php echo $row["total"]; ?>₺</td>
                            <td><a href="delete-order.php?order_id=<?php echo $row["order_id"]; ?>"><img src="icons8-cancel-64.png" alt="" width="40" height="40"></a></td>
                        </tr>
                    <?php
                        $i = $i + 1;
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>

    </div>


</body>

</html>