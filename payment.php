<?php
// Include the database configuration file
include 'config.php';
$conn = OpenCon();

session_start();

$sql = "SELECT * FROM " . $_SESSION["flower"] . " WHERE id = " . $_SESSION["flower_id"] . "";
$query = mysqli_query($conn, $sql);
$flower = mysqli_fetch_array($query);

if(empty($_SESSION['email'])){
    echo '<script> alert("Please login first to make a purchase."); document.location="login.php" </script>';
}

$email = $_SESSION['email'];
$sql1 = 'SELECT * FROM user_register WHERE email = "' . $email . '"';
$query1 = mysqli_query($conn, $sql1);
$customer = mysqli_fetch_array($query1);

$customer_id = $customer['id'];
$flower_name = $flower['flower_name'];
$total = $flower['price'];

//   customer_id, flower_name, receiver_name, address, delivery_date, delivery_time, message, credit_card, total
$receiver_name = $address = $delivery_date = $delivery_time = $message = $credit_card = '';
$errors = array('receiver_name' => '', 'address' => '', 'delivery_date' => '', 'delivery_time' => '', 'message' => '', 'credit_card' => '');

if (isset($_POST['buy'])) {
    if (empty($_POST['receiver_name'])) {
        $errors['receiver_name'] = 'Receiver\'s name is required';
    } else {
        $receiver_name = $_POST['receiver_name'];
    }
    if (empty($_POST['address'])) {
        $errors['address'] = 'Address is required';
    } else {
        $address = $_POST['address'];
    }
    if (empty($_POST['delivery_date'])) {
        $errors['delivery_date'] = 'Delivery date is required';
    } else {
        $delivery_date = $_POST['delivery_date'];
    }
    if (empty($_POST['delivery_time'])) {
        $errors['delivery_time'] = 'Delivery time is required';
    } else {
        $delivery_time = $_POST['delivery_time'];
    }
    if (empty($_POST['credit_card'])) {
        $errors['credit_card'] = 'Credit card information is required';
    } else {
        $credit_card = $_POST['credit_card'];
    }

    $message = $_POST['message'];

    $time_now = date("H:i");
    $date_now = date("Y-m-d");

    $time1 = strtok($_POST['delivery_time'], ":");
    $time2 = strtok(":");
    $time3 = strtok($time_now, ":");
    $time4 = strtok(":");
    $difference = $time2 - $time4;

    // Check date
    if (!empty($_POST['delivery_date']) && $date_now > $delivery_date) {
        $errors['delivery_date'] = 'Please enter a valid date';
    } else {
        if (!empty($_POST['delivery_time']) && $time_now > $delivery_time && $date_now == $delivery_date) {
            $errors['delivery_time'] = 'Please enter a valid time';
        }else if (!empty($_POST['delivery_time']) && $difference < 30 && $date_now == $delivery_date){
            $errors['delivery_time'] = 'Delivery time should be at least 30 minutes later than current time.';
        } 
    }

    if (!array_filter($errors)) {
        $query2 = "INSERT INTO orders (customer_id, flower_name, receiver_name, address, delivery_date, delivery_time, message, credit_card, total) VALUES (?,?,?,?,?,?,?,?,?)";
        $statement = mysqli_prepare($conn, $query2);
        mysqli_stmt_bind_param($statement, 'issssssss', $customer_id, $flower_name, $receiver_name, $address, $delivery_date, $delivery_time, $message, $credit_card, $total);

        // Execute the prepared statement
        if(mysqli_stmt_execute($statement)){
                echo '<script> alert("Your order has been taken."); document.location="payment.php" </script>';
        }else{
            print(mysqli_stmt_error($statement) . "\n");
        }

        // Close the statement and the connection
        mysqli_stmt_close($statement);
        mysqli_close($conn);
    }
}


?>

<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Payment</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="payment.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="menu">
        <ul>
            <li><a href="anasayfa.php" accesskey="1" title="">Main menu</a></li>
            <li><a href="saksı.php" accesskey="2" title="">Potted Plant</a></li>
            <li><a href="buket.php" accesskey="3" title="">Bouquet</a></li>
            <li><a href="teraryum.php" accesskey="4" title="">Terrarıum</a></li>
            <li><a href="myorders.php" accesskey="5" title="">My Orders</a></li>
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

    <div class=main>
        <div class="content">

            <form action="payment.php" method="post">
                <h1 id="title">Payment Information</h1>
                <hr>
                <br>

                <div class="inside_form">
                    <p id="text_input">
                        <label for="">Receiver's Name:</label><br>
                        <input id="text_input1" type="text" name="receiver_name" placeholder="Enter Receiver Name" class="select" value="<?php echo htmlspecialchars($receiver_name); ?>">
                    </p>
                    <div style="color: red;">
                        <?php echo $errors['receiver_name']; ?>
                    </div>

                    <br>
                    <hr><br>
                    <p id="text_input">
                        <label for="">Address:</label><br>
                        <textarea name="address" class="select" rows="6" cols="64" placeholder="Enter Address" value="<?php echo htmlspecialchars($address); ?>"></textarea>
                    </p>
                    <div style="color: red;">
                        <?php echo $errors['address']; ?>
                    </div>

                    <br>
                    <hr><br>
                    <p id="text_input">
                        <label for="">Day of Delivery:</label><br>
                        <input id="text_input2" type="date" name="delivery_date" placeholder="Enter Delivery Day" class="select">
                    </p>
                    <div style="color: red;">
                        <?php echo $errors['delivery_date']; ?>
                    </div>

                    <br>
                    <hr><br>
                    <p id="text_input">
                        <label for="">Time of Delivery:</label><br>
                        <input id="text_input2" type="time" name="delivery_time" placeholder="Enter Time" class="select">
                    </p>
                    <div style="color: red;">
                        <?php echo $errors['delivery_time']; ?>
                    </div>

                    <br>
                    <hr><br>
                    <p id="text_input">
                        <label for="">Your Message to the Receiver (Optional):</label><br>
                        <textarea name="message" class="select" rows="6" cols="64" placeholder="Enter Message"></textarea>
                    </p>
                    <br>
                    <hr><br>

                    <p id="text_input">
                        <label for="Credit Card No">Credit Card Information</label><br>
                        <input id="text_input1" type="text" name="credit_card" pattern="[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}" placeholder="xxxx xxxx xxxx xxxx" name="cd" class="select">
                    </p>
                    <div style="color: red;">
                        <?php echo $errors['credit_card']; ?>
                    </div>

                    <br>
                    <hr><br>

                    <p id="text_input" style="border-bottom:#be3489 solid; width:125px;">Total: <?php echo $total; ?>₺</p>

                </div>

                <br><br><br>
                <button class="buy" type="submit" name="buy">BUY</button>

            </form>

        </div>
    </div>

</body>

</html>