<?php 

include('db.php');

$errors = [];

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];

    if ($phone_number > 11 OR $phone_number < 11){
        $errors[] = "Phone number must 11 numbers long.";
    }
    
    if (empty($errors)){
        pg_query_params(
            $conn,
            'UPDATE users SET gender = $1, phone_number = $2 WHERE ',
            [$gender, $phone_number]
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
        <label for="gender">Gender</label>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="non">Rather Not Say</option>
        </select>
        <br><br>

        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label for="phone_number">Phone Number</label>
        <input type="text" name="phone_number">
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