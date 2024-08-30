<?php

require 'User.php';
include 'cors.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $user = new User();
    $username = $user->protectData($data['username']);
    $password = $user->protectData($data['password']);
    if (empty($username)) {
        echo json_encode([ 'error'=>'username', 'message' => 'Username is required']);
    }elseif(empty($password )){
        echo json_encode([ 'error'=>'password', 'message' => 'Password  is required']);
    }

    $response = $user->login($username, $password);

    echo json_encode($response);
} else {
    echo json_encode(['error' => 'message', 'message' => 'Invalid request method']);
}