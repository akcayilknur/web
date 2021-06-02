
<?php

include 'config.php';
$conn = OpenCon();

$errors = [];


$table1 = "CREATE TABLE bouquet( 
    id INT(11) NOT NULL AUTO_INCREMENT,
    flower_name VARCHAR(30), 
    price VARCHAR(20), 
    flower_amount VARCHAR(10), 
    picture VARCHAR(200), 
    PRIMARY KEY (id),
    FOREIGN KEY (flower_name) REFERENCES flowers(name));";


$table2 = "CREATE TABLE flowers(
    name VARCHAR(30),
    PRIMARY KEY (name));";


$table3 = "CREATE TABLE orders ( 
    order_id INT(11) NOT NULL AUTO_INCREMENT, 
    customer_id INT(11),
    flower_name VARCHAR(30), 
    order_time DATETIME(6), 
    receiver_name VARCHAR(20), 
    delivery_time DATETIME(6),
    message VARCHAR(100),
    credit_cart INT(16),
    total VARCHAR(20),
    PRIMARY KEY (order_id)),
    FOREIGN KEY (customer_id) REFERENCES user_register(id),
    FOREIGN KEY (flower_name) REFERENCES flowers(name));";


$table4 = "CREATE TABLE potted_plant(  
    id INT(11) NOT NULL AUTO_INCREMENT,
    flower_name VARCHAR(30), 
    price VARCHAR(20), 
    pot_type VARCHAR(20), 
    pot_color VARCHAR(20),
    picture VARCHAR(200), 
    PRIMARY KEY (id),
    FOREIGN KEY (flower_name) REFERENCES flowers(name));";


$table5 = "CREATE TABLE terrarium(  
    id INT(11) NOT NULL AUTO_INCREMENT,
    flower_name VARCHAR(30), 
    price VARCHAR(20), 
    shape VARCHAR(20), 
    picture VARCHAR(200), 
    PRIMARY KEY (id),
    FOREIGN KEY (flower_name) REFERENCES flowers(name));";


$table6 = "CREATE TABLE user_register(
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(20),
        email VARCHAR(20),
        tel BIGINT(20),
        password VARCHAR(20),
        PRIMARY KEY (id);";


$tables = [$table1, $table2, $table3, $table4, $table5, $table6];


foreach ($tables as $k => $sql) {
    $query = @$conn->query($sql);

    if (!$query)
        $errors[] = "Table $k : Creation failed ($conn->error)";
    else
        $errors[] = "Table $k : Creation done succesfully";
}


foreach ($errors as $msg) {
    echo "$msg <br>";
}

CloseCon($conn)
?>