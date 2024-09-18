<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['admin','user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

       // $token = substr($headers['Authorization'],7);
       $user = new User();
       $data = json_decode(file_get_contents("php://input"), true);
       $token = $user->protectData($data['token']);
        $response = $user->validateToken($token);
        if($token==$response['token']){
            $response = $user->logout($token);
            echo json_encode($response);
        }else{
            echo json_encode($response);
        }

    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    }

} else {
    echo json_encode($response);
}
?>