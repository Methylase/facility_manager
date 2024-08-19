<?php
require 'User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $user = new User();
    $username = $user->protectData($data['username']);
    $password = $user->protectData($data['password']);

    $response = $user->login($username, $password);

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}