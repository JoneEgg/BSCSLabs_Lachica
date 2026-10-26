<?php
$dbhost = 'aws-0-ap-south-1.pooler.supabase.com';
$dbuser = 'postgres.zygwumbvummjpudsazcd';
$dbpass = 'LoginSystem@2026';


$conn = pg_connect("host=$dbhost port=5432 dbname=postgres user=$dbuser password=$dbpass sslmode=require");

if (!$conn){
    exit('Database connection failed.');
}

?>

