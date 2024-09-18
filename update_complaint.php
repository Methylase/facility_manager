<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $client  = isset($data['client']) ? $user->protectData($data['client']) :'';
        $date  = isset($data['date']) ? $user->protectData($data['date']) :'';
        $time  = isset($data['time']) ? $user->protectData($data['time']) :'';
        $is_medication_still_accurate  = isset($data['is_medication_still_accurate']) ? $user->protectData($data['is_medication_still_accurate']) :'';
        $list_yps_medication_below  = isset($data['list_yps_medication_below']) ? $user->protectData($data['list_yps_medication_below']) :'';
        $id =isset($data['id']) ? $user->protectData($data['id']) :'';

        if($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'You don\'t have permission to carry out this update']);
        }else{
           
            $response = $user->update_complaint(
                $client,
                $date,
                $time,
                $is_medication_still_accurate,
                $list_yps_medication_below,
                $id
            );
        
            echo json_encode($response);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    }

} else {
    echo json_encode($response);
}
?>