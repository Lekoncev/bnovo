<?php

//Обновление информации о продукте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$lastname = $_POST['lastname'];
$number = $_POST['number'];
$email = $_POST['email'];
$country = $_POST['country'];

/*
 * Делаем запрос на изменение строки в таблице products
 */
$sql = "UPDATE `guest` SET `name` = :name, `surname` = :surname, `lastname` = :lastname, `number` = :number, `email` = :email, `country` = :country WHERE `guest` . `id` = '$id'";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'name' => $name,
    'surname' => $surname,
    'lastname' => $lastname,
    'number' => $number,
    'email' => $email,
    'country' => $country
]);

/*
 * Переадресация на главную страницу
 */

header('Location: /Project/web/index.php');