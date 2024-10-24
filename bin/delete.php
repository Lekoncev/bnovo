<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Получаем ID продукта из адресной строки
 * Делаем запрос на удаление строки из таблицы products
 */

$id = $_GET['id'];

$sql = "DELETE FROM guest WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: /Project/web/index.php');
