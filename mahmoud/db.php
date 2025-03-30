<?php
$host = "localhost";
$user = "root"; 
$password = ""; 
$database = "SportsDB";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>