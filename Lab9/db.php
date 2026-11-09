<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'login_db';


$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn){
    exit('Database connection failed.');
}

?>

