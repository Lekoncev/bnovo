<?php

/*
 * Делаем константы для хранения данных о базе данных
 * HOST - адрес для подключения к БД
 * USER - логин для доступа к БД
 * PASSWORD - пароль для доступа к БД
 * DATABASE - название базы данных, к которой мы подключаемся
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
