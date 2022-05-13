<?php
// config.php
$host     = 'localhost';
$db       = 'sound_vib';
$user     = 'exof';
$password = 'Mumija12';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password);
   
    if ($pdo) {
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
