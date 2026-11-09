<?php
include("db.php");
session_start();
header('Location: index.php');

$sql = "DELETE * FROM 'users' WHERE 'id' = {$_SESSION["id"]}";
$result = $conn->query($sql)

?>
