<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user','admin']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $id =isset($data['id']) ? $user->protectData($data['id']) :'';
        
        if($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'No record for this '.$id]);
        }else{
            $user = new User();
            $response = $user->get_incident_report($id);
        
            echo json_encode($response);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    }

} else {
    echo json_encode($response);
}
?>