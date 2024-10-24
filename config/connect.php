<?php

/*
 * Делаем переменные для хранения данных о базе данных
 * $host - адрес для подключения к БД
 * $username - логин для доступа к БД
 * $password - пароль для доступа к БД
 * $dbname - название базы данных, к которой мы подключаемся
 */

$host = '127.0.0.1';
$dbname = 'contacts';
$username = 'root';
$password = '';
/*
 * Подключаемся к базе данных с помощью функции PDO
 * Делаем проверку соединения
 * Если есть ошибки, останавливаем код и выводим сообщение с ошибкой
 */
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
} catch (PDOException $exception) {
    echo "Error : {$exception->getMessage()}";
}
