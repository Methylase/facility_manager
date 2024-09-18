<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $risk_accessment_plan_id  = isset($data['risk_accessment_plan_id']) ? $user->protectData($data['risk_accessment_plan_id']) :'';
        $name  = isset($data['name']) ? $user->protectData($data['name']) :'';
        $assessment_date  = isset($data['assessment_date']) ? $user->protectData($data['assessment_date']) :'';
        $next_assessment_date  = isset($data['next_assessment_date ']) ? $user->protectData($data['next_assessment_date ']) :'';
        $rap_id  = isset($data['rap_id']) ? $user->protectData($data['rap_id']) :'';
        $type_of_risk  = isset($data['type_of_risk']) ? $user->protectData($data['type_of_risk']) :'';
        $description_of_risk  = isset($data['description_of_risk ']) ? $user->protectData($data['description_of_risk ']) :'';
        $risk_triggers  = isset($data['risk_triggers']) ? $user->protectData($data['risk_triggers']) :'';
        $mitigating_factors  = isset($data['mitigating_factors']) ? $user->protectData($data['mitigating_factors']) :'';
        $plan  = isset($data['plan']) ? $user->protectData($data['plan']) :'';
        $who_needs_to_know  = isset($data['who_needs_to_know ']) ? $user->protectData($data['who_needs_to_know ']) :'';
        $created_by  = isset($data['created_by']) ? $user->protectData($data['created_by']) :'';
        $last_modified  = isset($data['last_modified']) ? $user->protectData($data['last_modified']) :'';

        $response = $user->post_risk_accessment_plan(
            $risk_accessment_plan_id,
            $name,
            $assessment_date,
            $next_assessment_date,
            $rap_id,
            $type_of_risk,
            $description_of_risk,
            $risk_triggers,
            $mitigating_factors,
            $plan,
            $who_needs_to_know,
            $created_by,
            $last_modified,
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