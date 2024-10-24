<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>
<body>
<div class="some-form">
    <form action="create.php">
        <div class="some-form__submit">
            <input type="submit" value="Добавить нового пользователя" class="button button_submit button_wide">
        </div>
    </form>
</div>
    <table>
        <tr>
            <th>Name Surname LastName</th>
            <th>Number</th>
            <th>Email</th>
            <th>Country</th>
        </tr>

        <?php

            $sql = "SELECT * FROM `guest`";
            $stmt = $pdo->query($sql);
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            /*
             * Перебираем массив и рендерим HTML с данными из массива
             */

        foreach ($users as $user) {
            ?>
            <tr>
                <td><?= $user["name"] . ' ' . $user["surname"] . ' ' . $user["lastname"]?></td>
                <td><?= $user["number"] ?></td>
                <td><?= $user["email"] ?></td>
                <td><?= $user["country"] ?></td>
                <td><a href="update.php?id=<?= $user["id"] ?>">Update</a></td>
                <td><a style="color: red;" href="../bin/delete.php?id=<?= $user["id"] ?>">Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </table>

</body>
</html>
