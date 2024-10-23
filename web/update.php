<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

    require_once '../config/connect.php';

    /*
     * Получаем ID продукта из адресной строки - /product.php?id=1
     */

    $product_id = $_GET['id'];

    $sql = "SELECT * FROM `guest` WHERE id = $product_id";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetch(PDO::FETCH_ASSOC);
    /*
     * Делаем выборку строки с полученным ID выше
     */

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h3>Update Product</h3>
    <form action="../bin/update.php" method="post">
        <input type="hidden" name="id" value="<?= $users['id'] ?>">
        <p>Name</p>
        <input type="text" name="name" value="<?= $users['name'] ?>">
        <p>Surname</p>
        <input type="text" name="surname" value="<?= $users['surname'] ?>">
        <p>LastName</p>
        <input type="text" name="lastname" value="<?= $users['lastname'] ?>">
        <p>Number</p>
        <input type="tel" name="number" value="<?= $users['number'] ?>">
        <p>Email</p>
        <input type="text" name="email" value="<?= $users['email'] ?>">
        <p>Country</p>
        <input type="text" name="country" value="<?= $users['country'] ?>"><br> <br>
        <button type="submit">Update</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/jquery.inputmask.min.js"></script>
    <script src="../js/numbermask.js"></script>
</body>
</html>