<?php
require_once 'RoleMiddleware.php';

$response = RoleMiddleware::checkRole(['user','admin']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $user = new User();
        $response = $user->get_all_property_check_report();
    
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    }

} else {
    echo json_encode($response);
}
?>