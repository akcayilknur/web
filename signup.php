<?php
$name = $password = $email = $tel = '';  
$errors = array('name' => '', 'email' => '', 'tel' => '', 'password' => '');
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
                    header("location: http://localhost/web/login.php");
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                $errors['email'] = 'Someone has already registered using this email.';
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All fields are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign Up</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1 id="title">User Sign Up</h1>
        <p id="text_input">
            <label for="">Name:</label>
            <br>
            <input id="inputbox" type="text" name="name" placeholder="Enter your name" class="select" value="<?php echo htmlspecialchars($name); ?>" required>
        </p>
        <p id="text_input">
            <label for="">E-mail:</label>
            <br>
            <input id="inputbox" type="email" name="email" placeholder="Enter your e-mail" class="select" value="<?php echo htmlspecialchars($email); ?>" required>
            <div style="color: red;">
            <?php echo $errors['email']; ?>
            <!-- display error message here !-->
        </div>
        </p>
        <p id="text_input">
            <label for="">Phone Number</label>
            <br>
            <input id="inputbox" type="tel" name="tel" pattern="[1-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}" placeholder="(5xx)xxx xx xx" class="select" value="<?php echo htmlspecialchars($tel); ?>" required>
        </p>
        <p id="text_input">
            <label for="">Password:</label>
            <br>
            <input id="inputbox" type="password" name="password" placeholder="Enter your password" class="select" required>
        </p>

        <button id="signup" type="submit" name="submit" value="submit">SIGN UP</button>

        <br>
        <p id="check">
            Already have an account? <br> Log in from <a href="login.php" id="link">here</a>
        </p>
    </form>
</body>

</html>