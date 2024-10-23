<?php

//Удаление продукта

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Получаем ID продукта из адресной строки
 */

$id = $_GET['id'];

$sql = "DELETE FROM guest WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

/*
 * Делаем запрос на удаление строки из таблицы products
 */

//mysqli_query($connect, "DELETE FROM guest WHERE `guest` . `id` = '$id'");

/*
 * Переадресация на главную страницу
 */

header('Location: /Project/web/index.php');