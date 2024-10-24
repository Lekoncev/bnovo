<?php

require_once 'connect.php';
require_once 'functions.php';

header('Content-type: json/application');

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[1];
//$id = $params[2];

if ($method === 'GET') {
    if ($type === 'posts') {
        if(isset($id)) {
            getPost($pdo, $id);
        } else {
            getPosts($pdo);
        }
    }
} elseif ($method === 'POST') {
    if ($type === 'posts') {
        $id = $params[2];
        addPost($pdo, $_POST);
    }
} elseif ($method === 'PATCH') {
    if ($type === 'posts') {
        if (isset($id)) {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            updatePost($pdo, $id, $data);
        }
    }
} elseif ($method === 'DELETE') {
    if ($type === 'posts') {
        if (isset($id)) {
            deletePost($pdo, $id);
        }
    }
}

