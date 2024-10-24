<?php

header('Access-Controll-Allow-Origin');
header('Access-Controll-Allow-Headers');
header('Access-Controll-Allow-Methods');
header('Access-Controll-Allow-Credentials: true');
header('Content-type: json/application');

require_once 'connect.php';
require_once 'index.php';

function getPosts($pdo) {
    $sql = "SELECT * FROM `guest`";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users);
}

function getPost($pdo, $id) {
    $sql = "SELECT * FROM `guest` WHERE `guest` . `id` = '$id'";
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Post not found"
        ];
        echo json_encode($res);
    } else {
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($post);
    }
}

function addPost($pdo, $data) {
    $name = $data['name'];
    $surname = $data['surname'];
    $lastname = $data['lastname'];
    $number = $data['number'];
    $email = $data['email'];
    $country = $data['country'];

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

        http_response_code(201);

        $res = [
            "status" => true,
            "message" => $pdo->lastInsertId($sql)
        ];
        echo json_encode($res);
    } catch (PDOException $exception) {
        echo "Ошибка при добавлении нового пользователя: {$exception->getMessage()}";
    }
}

function  updatePost($pdo, $id, $data) {
    $id = $data['id'];
    $name = $data['name'];
    $surname = $data['surname'];
    $lastname = $data['lastname'];
    $number = $data['number'];
    $email = $data['email'];
    $country = $data['country'];

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

    http_response_code(200);

    $res = [
        "status" => true,
        "message" => "post is updated"
    ];
    echo json_encode($res);
}

function deletePost($pdo, $id) {
    $sql = "DELETE FROM guest WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    http_response_code(200);

    $res = [
        "status" => true,
        "message" => "post is delete"
    ];
    echo json_encode($res);
}