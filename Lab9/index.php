<?php  
    session_start();

    $errors = [];

    $errorMessage = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"]; 
        $password = $_POST["password"];
        $confirmPassword = $_POST['confirm_password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $passPattern = '/^ (?=.*[A-Z]) (?=.*[a-z]) (?=.*[\W_]).(8,)$/';

        // PASSWORD LENGTH
        if(empty($username)){
            $errors = "Username is required.";
        } else if (strlen($username) < 8){
            $errors[] = "Username must have 8 characters or more.";
        }


        // USERNAME ALREADY EXISTS
        $sql = "SELECT `username` FROM `users` WHERE `username` = '$username'";
        
        $userCheck = $conn->query($sql);

        if ($userCheck->num_rows > 0){
            $errors[] = "Username already exists.";
        }

        if($password != $confirmPassword){
            $errors[] = "Password did not match.";
        }

        if(!preg_match($passPattern, $password)){
            $errors[] = "Password must contain upper and lower case letters and special characters.";
        }

        if (empty($errors)){
            $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$hashedPassword') ";
        
            $result = $conn->query($sql);

            if($result){
                echo "Registered successfully!";
                header("Location: login.php");
            }
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