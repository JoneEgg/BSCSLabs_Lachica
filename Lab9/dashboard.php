<?php 
session_start();

if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
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
    <h2>Hello, <?php echo $_SESSION['username'] ?>!</h2>
    <p>You have successfully logged in.</p>

    <?php 
    $testHash = "testing";
    echo "This is password has: ". password_hash($testHash, PASSWORD_DEFAULT);;
    echo "<br>";
    echo "This is MD5: ". md5($testHash);
    echo "<br>";
    echo "This is SHA1: ". sha1($testHash);
    echo "<br>";
    echo "This is SHA1: ". sha1(md5($testHash));
    echo "<br>";

    $mySalt = "vilativay";
    echo "This MYSALT: ". $mySalt.sha1(md5($testHash));
    echo "<br>";
    
    ?>

    <button type="button">
        <a href="logout.php">Logout</a>
    </button>
    <a href="edit.php">Edit Profile</a>
    
</body>
</html>