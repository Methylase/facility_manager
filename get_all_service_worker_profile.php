<?php
require_once 'RoleMiddleware.php';

$response = RoleMiddleware::checkRole(['admin']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $user = new User();
        $response = $user->get_all_service_worker_profile();
    
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    }

} else {
    echo json_encode($response);
}
?>