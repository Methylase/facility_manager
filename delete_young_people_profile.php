<?php
require_once 'RoleMiddleware.php';

$response = RoleMiddleware::checkRole(['admin']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $id =$user->protectData($data['id']);

        if($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete']);
        }else{

            $response = $user->delete_young_people_profile($id);
            echo json_encode($response);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    }

} else {
    echo json_encode($response);
}
?>