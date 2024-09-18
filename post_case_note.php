<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $start_date = isset($data['start_date']) ? $user->protectData($data['start_date']):'';
        $state_time = isset($data['state_time']) ? $user->protectData($data['state_time']):'';
        $end_date = isset($data['end_date']) ? $user->protectData($data['end_date']):'';
        $end_time = isset($data['end_time']) ? $user->protectData($data['end_time']):'';
        $session = isset($data['session']) ? $user->protectData($data['session']):'';
        $communication_method = isset($data['communication_method']) ? $user->protectData($data['communication_method']):'';
        $venue_of_session = isset($data['venue_of_session']) ? $user->protectData($data['venue_of_session']):'';
        $notes  = isset($data['note']) ? $user->protectData($data['note']):'';


 
        
        $response = $user->post_case_note(
            $start_date,
            $state_time,
            $end_date,
            $end_time,
            $session,
            $communication_method,
            $venue_of_session,
            $notes,
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