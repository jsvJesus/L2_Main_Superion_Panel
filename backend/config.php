<?php
session_start();

$db_host = "localhost";
$db_port = "3306";
$db_user = "root";
$db_pass = "";
$db_name = "l2base";

try {
    $dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8";
    $pdo = new PDO($dsn, $db_user, $db_pass, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ));
} catch (PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}

function l2_hash($password) {
    return base64_encode(sha1($password, true));
}
?>