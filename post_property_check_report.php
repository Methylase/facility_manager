<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $property_checked_name  = isset($data['property_checked_name']) ? $user->protectData($data['property_checked_name']) :'';
        $type = isset($data['type']) ? $user->protectData($data['type']) :'';
        $date_of_check  = isset($data['date_of_check']) ? $user->protectData($data['date_of_check']) :'';
        $time_of_check  = isset($data['time_of_check']) ? $user->protectData($data['time_of_check']) :'';
        $staff_lead  = isset($data['staff_lead']) ? $user->protectData($data['staff_lead']) :'';
        $staff_assistant  = isset($data['staff_assistant']) ? $user->protectData($data['staff_assistant']) :'';
        $yp_assisting_check  = isset($data['yp_assisting_check']) ? $user->protectData($data['yp_assisting_check']) :'';
        $service = isset($data['service']) ? $user->protectData($data['service']) :'';
        $room  = isset($data['room']) ? $user->protectData($data['room']) :'';
        $location_notes  = isset($data['location_notes']) ? $user->protectData($data['location_notes']) :'';

        $response = $user->property_check_report(
            $property_checked_name,
            $type,
            $date_of_check,
            $time_of_check,
            $staff_lead,
            $staff_assistant,
            $yp_assisting_check,
            $service,
            $room,
            $location_notes,
            $response['creator_id']
    );
    
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    }

} else {
    echo json_encode($response);
}
?>