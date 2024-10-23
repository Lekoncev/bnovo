<?php

//Добавление нового продукта

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$name = $_POST['name'];
$surname = $_POST['surname'];
$lastname = $_POST['lastname'];
$number = $_POST['number'];
$email = $_POST['email'];
$country = $_POST['country'];

/*
 * Делаем запрос на добавление новой строки в таблицу products
 */

$sql = "INSERT INTO `guest` (`name`, `surname`, `lastname`, `number`, `email`, `country`) VALUES (:name, :surname, :lastname,
                                                                                                     :number, :email, :country)";
$stmt = $pdo->prepare($sql);
try {
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
} catch (PDOException $exception) {
    echo "Ошибка при добавлении нового пользователя: {$exception->getMessage()}";
}
