<?php
// Include the database configuration file
include 'config.php';
$conn = OpenCon();

$flower='bouquet';

session_start();
?>







<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Bouquet</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="buket.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div id="menu">
        <ul>
            <li><a href="anasayfa.php" accesskey="1" title="">Main menu</a></li>
            <li><a href="saksı.php" accesskey="2" title="">Potted Plant</a></li>
            <li class="active"><a href="buket.php" accesskey="3" title="">Bouquet</a></li>
            <li><a href="teraryum.php" accesskey="4" title="">Terrarıum</a></li>
            <li><a href="aboutus.php" accesskey="5" title="">About us</a></li>
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

    </div>

    <!-- MAIN (Center website) -->
    <div class="main">

        <br>
        <h1> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp; BOUQUET FLOWERS</h1>


        <div class="row">
            <div class="column">
            </div>

            <?php
        // Get images from the database
$query = $conn->query("SELECT * FROM bouquet LIMIT 0,3");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'buket/'.$row["picture"];
?>

            <div class="column">
                <div class="content">
                <img src="<?php echo $imageURL; ?>" alt="Lights" style="width:100%">
                    <h3><?php echo $row['flower_name']; ?></h3>
                    <a href="PC-bouquet-1.php?flower=<?php echo $flower; ?>&flower_id=<?php echo $row['id']; ?>"><button>Browse</button></a>

                </div>
            </div>
<?php }
}else{ ?>
    <!-- <p>No image(s) found...</p> -->
<?php } ?>
        </div>

        <div class="row">
            <div class="column">
            </div>
<?php
        // Get images from the database
$query = $conn->query("SELECT * FROM bouquet LIMIT 3,3");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'buket/'.$row["picture"];
?>
<div class="column">
                <div class="content">
                    <img src="<?php echo $imageURL; ?>" alt="Lights" style="width:100%">
                    <h3><?php echo $row['flower_name']; ?></h3>
                    <a href="PC-bouquet-1.php?flower=<?php echo $flower; ?>&flower_id=<?php echo $row['id']; ?>"><button>Browse</button></a>

                </div>
            </div>
<?php }
}else{ ?>
    <!-- <p>No image(s) found...</p> -->
<?php } ?>
        </div>

        <div class="row">
            <div class="column">
            </div>
<?php
        // Get images from the database
$query = $conn->query("SELECT * FROM bouquet LIMIT 6,3");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'buket/'.$row["picture"];
?>
            <div class="column">
                <div class="content">
                    <img src="<?php echo $imageURL; ?>" alt="Lights" style="width:100%">
                    <h3><?php echo $row['flower_name']; ?></h3>
                    <a href="PC-bouquet-1.php?flower=<?php echo $flower; ?>&flower_id=<?php echo $row['id']; ?>"><button>Browse</button></a>

                </div>
            </div>
<?php }
}else{ ?>
    <!-- <p>No image(s) found...</p> -->
<?php } ?>
        </div>

        
    </div>
</body>

</html>