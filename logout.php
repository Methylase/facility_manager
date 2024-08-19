<?php
require_once 'RoleMiddleware.php';

$response = RoleMiddleware::checkRole(['admin','user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $token = substr($headers['Authorization'],7);

        $user = new User();
        $response = $user->validateToken($token);
        if($token==$response['token']){
            $response = $user->logout();
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