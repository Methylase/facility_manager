<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        
        $service = isset($data['service']) ? $user->protectData($data['service']):'';
        $compiled_by = isset($data['compiled_by']) ? $user->protectData($data['compiled_by']):'';
        $staff_lead = isset($data['staff_lead']) ? $user->protectData($data['staff_lead']):'';
        $type = isset($data['type']) ? $user->protectData($data['type']):'';
        $walls_in_good_condition = isset($data['walls_in_good_condition']) ? $user->protectData($data['walls_in_good_condition']):'';
        $lights_and_switches_in_good_condition = isset($data['lights_and_switches_in_good_condition']) ? $user->protectData($data['lights_and_switches_in_good_condition']):'';
        $curtains_and_rails_in_good_condition = isset($data['curtains_and_rails_in_good_condition']) ? $user->protectData($data['curtains_and_rails_in_good_condition']):'';
        $windows = isset($data['windows']) ? $user->protectData($data['windows']):'';
        $fire_notices_are_posted = isset($data['fire_notices_are_posted']) ? $user->protectData($data['fire_notices_are_posted']):'';
        $radiators_are_working_with_no_leaks = isset($data['radiators_are_working_with_no_leaks']) ? $user->protectData($data['radiators_are_working_with_no_leaks']):'';
        $furniture_in_good_condition = isset($data['furniture_in_good_condition']) ? $user->protectData($data['furniture_in_good_condition']):'';
        $no_sign_of_pest_contamination = isset($data['no_sign_of_pest_contamination']) ? $user->protectData($data['no_sign_of_pest_contamination']):'';
        $floor_coverings_in_good_condition = isset($data['floor_coverings_in_good_condition']) ? $user->protectData($data['floor_coverings_in_good_condition']):'';
        $bathroom_clean_and_in_working_order = isset($data['bathroom_clean_and_in_working_order']) ? $user->protectData($data['bathroom_clean_and_in_working_order']):'';
        $kitchen_area_clean_and_tidy = isset($data['kitchen_area_clean_and_tidy']) ? $user->protectData($data['kitchen_area_clean_and_tidy']):''; 
        $overall_cleanliness_and_hygeine = isset($data['overall_cleanliness_and_hygeine']) ? $user->protectData($data['overall_cleanliness_and_hygeine']):'';
        $bins_clean_and_tidy  = isset($data['bins_clean_and_tidy']) ? $user->protectData($data['bins_clean_and_tidy']):'';
        $beddings_clean = isset($data['beddings_clean']) ? $user->protectData($data['beddings_clean']):'';
        $smoke_alarms_tested_and_working  = isset($data['smoke_alarms_tested_and_working']) ? $user->protectData($data['smoke_alarms_tested_and_working']):'';
        $carbon_monoxide_alarm_tested  = isset($data['carbon_monoxide_alarm_tested']) ? $user->protectData($data['carbon_monoxide_alarm_tested']):'';
        $evidence_of_battery_charger_used  = isset($data['evidence_of_battery_charger_used']) ? $user->protectData($data['evidence_of_battery_charger_used']):'';
        $no_e_bike_or_e_scooters_charged = isset($data['no_e_bike_or_e_scooters_charged']) ? $user->protectData($data['no_e_bike_or_e_scooters_charged']):'';
        $notes  = isset($data['note']) ? $user->protectData($data['note']):'';
        $id =isset($data['id']) ? $user->protectData($data['id']):'';
        
        if($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'You don\'t have permission to carry out this update']);
        }else{
            $response = $user->update_room_check_report(
                $service,
                $compiled_by,
                $staff_lead,
                $type,
                $walls_in_good_condition,
                $lights_and_switches_in_good_condition,
                $curtains_and_rails_in_good_condition,
                $windows,
                $fire_notices_are_posted,
                $radiators_are_working_with_no_leaks,
                $furniture_in_good_condition,
                $no_sign_of_pest_contamination,
                $floor_coverings_in_good_condition,
                $bathroom_clean_and_in_working_order,
                $kitchen_area_clean_and_tidy,
                $overall_cleanliness_and_hygeine,
                $bins_clean_and_tidy,
                $beddings_clean,
                $smoke_alarms_tested_and_working,
                $carbon_monoxide_alarm_tested,
                $evidence_of_battery_charger_used,
                $no_e_bike_or_e_scooters_charged,
                $notes,
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