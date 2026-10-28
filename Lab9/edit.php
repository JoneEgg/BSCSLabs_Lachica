<?php 

include("dp.php");

$errors = [];

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $gender = $_POST['gender'];
    $address = trim($_POST['address']);
    $phone_number = trim( $_POST['phone_number']);

    if (strlen($phone_number) != 11){
        $errors[] = "Phone number must 11 numbers long.";
    }
    
    if (empty($errors)){
        mysqli_query(
            $conn,
            "UPDATE users SET gender = '$gender', phone_number = '$phone_number', address = '$address' WHERE username = '$_SESSION['username']'",
    
        );

        echo "Updated Successfully";
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
    <h3>Welcome, <?php echo $_SESSION['username'] ?>!</h3>

    <form method="POST">

    <label for="address">Address</label>
    <input type="text" name="address">
    <br><br>

        <label for="gender">Gender</label>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="non">Rather Not Say</option>
        </select>
        <br><br>

        <label for="phone_number">Phone Number</label>
        <input type="number" name="phone_number">
        <br><br>

        <button type="submit">Save</button>
    </form>
    <br>
    <a href="dashboard.php">Back to Dashboard</a>
    <br><br>
    

    <?php
        foreach ($errors as $error){
            echo $error . "<br>";
        }
    ?>
</body>
</html>