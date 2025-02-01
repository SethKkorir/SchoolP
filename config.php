<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$host =  'localhost';  // specify host name (use '127.0.0.1' for localhost)
$dbname   = 'sp';
$username = 'root';     // user name
$password = '';          // password
try{
    $pdo =  new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("Database connection failed: ". $e->getMessage());
}




?>