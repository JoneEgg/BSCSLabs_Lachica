<?php
session_start();

include("db.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"]; 
        $password = $_POST["password"];
        $confirmPassword = $_POST['confirm_password'];

        $sql = "SELECT `username` FROM `users` WHERE `username` = '$username'";
        $result = $conn->query($sql);

        if($result->num_rows == 1){
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])){
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
            }
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>LOGIN SYSTEM</h3>

    <!-- login form -->
    <form method="POST">
        <label for="username">Enter Username<br>
            <input type="text" placeholder="Username" name="username" required>
        </label><br><br>
        <label for="password">Enter Password<br> 
            <input type="password" placeholder="Password" name="password">
        </label><br><br>
        <label for="Confirm Password">Confirm Your Password<br> 
            <input type="password" placeholder="Confirm Password" name="confirm_password">
        </label><br><br>
        <button type="submit">Register</button>
    </form>

    <!-- error display -->
    <p style="color: red;">
        <?php  
            foreach($errors as $error){
                echo $error . "<br>";
            }
            
        ?>
    </p>
</body>
</html>