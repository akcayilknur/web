<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>BE FLOWERS</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="myorders.css" rel="stylesheet" type="text/css" />
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


            </div>

            <table border = "1" width = "100%" >
         
         <tr>
            <td>
               <table border = "1" width = "100%" >
                  <tr>
                    <th>Flower Name</th>
                    <th>Receiver Name</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Desicion</th>
                    
                  </tr>
                  <tr>
                     <td>Winter Garden</td>
                     <td>İlknur Akçay</td>
                     <td>Karslı Ahmet Cad. Ataşehir/İstanbul</td>
                     <td>39.99</td>
                     <td>&nbsp;&nbsp;&nbsp;<a href="approve-student.php?student_id=<?php echo $roww["student_id"];
                      ?>"><img src="cancel.png" alt="" width="30"height="30"></a></t>
                     
                  </tr>
                  <tr>
                     <td>Cold Day</td>
                     <td>Zişan Zülfikar</td>
                     <td>Atatürk Cad. Bahçeşehir/İstanbul</td>
                     <td>49.99</td>
                     <td>&nbsp;&nbsp;&nbsp;<a href="approve-student.php?student_id=<?php echo $roww["student_id"];
                      ?>"><img src="cancel.png" alt="" width="30"height="30"></a></t>
                  </tr>
               </table>

        </div>
    </div>

    </div>


</body>

</html>