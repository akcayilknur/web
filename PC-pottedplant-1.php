<?php
include 'config.php';
$conn = OpenCon();

session_start();

$sql="SELECT * FROM ".$_GET["flower"]." WHERE id = ".$_GET["flower_id"]."";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    $imageURL = 'saksı/'.$result["picture"];

    $_SESSION['flower_id'] = $result["id"];
    $_SESSION['flower'] = $_GET["flower"];
?>


<html>

<head>


    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Product card</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="ProductCard.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="menu">
        <ul>
            <li><a href="anasayfa.php" accesskey="1" title="">Main menu</a></li>
            <li><a href="saksı.php" accesskey="2" title="">Potted Plant</a></li>
            <li><a href="buket.php" accesskey="3" title="">Bouquet</a></li>
            <li><a href="teraryum.php" accesskey="4" title="">Terrarıum</a></li>
            <li><a href="aboutus.php" accesskey="5" title="">About Us</a></li>
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
                <h1> &emsp;&emsp;PRODUCT CARD</h1>
            </div>

            <div class="card">

                <img src="<?php echo $imageURL; ?>" alt="<?php echo $result['flower_name']; ?>" style="width:100%">
                <h1><?php echo $result['flower_name']; ?></h1>
                <p class="price"><?php echo $result['price']; ?>₺</p>
                <p>Pot Color: <?php echo $result['pot_color']; ?></p>
                <p>Pot Type: <?php echo $result['pot_type']; ?></p>
                <p><a href="payment.php"><button>Buy</button></a></p>
            </div>

        </div>
    </div>

    </div>


</body>

</html>