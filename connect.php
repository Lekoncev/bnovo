<?php

header('Content-type: json/application');

$host = '127.0.0.1';
$dbname = 'contacts';
$username = 'root';
$password = '';
/*
 * Подключаемся к базе данных с помощью pdo
 */
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
} catch (PDOException $exception) {
    echo "Error : {$exception->getMessage()}";
}
