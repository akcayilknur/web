<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tel'])&& isset($_POST['password']) ) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $password = $_POST['password'];


        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "flower_shop";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM user_register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO user_register(name, email, tel, password) values(?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssis",$name, $email, $tel,$password);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>