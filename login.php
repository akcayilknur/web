<?php
include 'config.php';
$conn = OpenCon();

$email = $password = $check = '';        // initialize with empty string
$errors = array('email' => '', 'password' => '', 'check' => ''); // keys and their ampty values

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    if (empty($_POST['email'])) { // check if email is empty
        $errors['email'] = 'An email is required';
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'A password is required';
    } else {
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }

    if (!empty($_POST['password']) && !empty($_POST['email']) ) {
        $sql = 'SELECT id FROM user_register WHERE email = "'.$email.'" and password = "'.$password.'"';

        $result = mysqli_query($conn, $sql);
    
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        // If result matched $email and $password, table row must be 1 row
        if ($count == 1) {
            $_SESSION['customer_id'] = $id;
            header("location: http://localhost/web/anasayfa.php");
        } else {
            $errors['check'] = "E-mail or password is invalid.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Log In</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1 id="title">User Login</h1>
        <p id="text_input">
            <label for="">E-mail:</label>
            <br>
            <input id="inputbox" type="email" name="email" placeholder="Enter your e-mail" class="select" value="<?php echo htmlspecialchars($email); ?>" >
        </p>
        <p id="text_input">
            <label for="">Password:</label>
            <br>
            <input id="inputbox" type="password" name="password" placeholder="Enter your password" class="select" value="<?php echo htmlspecialchars($password); ?>">
        
            <div style="color: red;">
            <?php echo $errors['password']; echo $errors['check']; ?>
            <!-- display error message here !-->
        </div>
        </p>

        <button id="login" type="submit" name="submit" value="submit">LOG IN</button>

        <br>
        <p id="check">
            Don't have an account? <br> Create an account from <a href="signup.php" id="link">here</a>
        </p>
    </form>
</body>

</html>