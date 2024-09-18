<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $service  = isset($data['service']) ? $user->protectData($data['service']) :'';
        $action_1  = isset($data['action_1']) ? $user->protectData($data['action_1']) :'';
        $compiled_by = isset($data['compiled_by']) ? $user->protectData($data['compiled_by']) :'';
        $action_2  = isset($data['action_12']) ? $user->protectData($data['action_2']) :'';
        $staff_lead  = isset($data['staff_lead']) ? $user->protectData($data['staff_lead']) :'';
        $action_3  = isset($data['action_3']) ? $user->protectData($data['action_3']) :'';
        $date  = isset($data['date']) ? $user->protectData($data['date']) :'';
        $escape_route  = isset($data['escape_route']) ? $user->protectData($data['escape_route']) :'';
        $action_4  = isset($data['action_4']) ? $user->protectData($data['action_4']) :'';
        $fire_warning_indicator  = isset($data['fire_warning_indicator']) ? $user->protectData($data['fire_warning_indicator']) :'';
        $action_5  = isset($data['action_5']) ? $user->protectData($data['action_5']) :'';
        $emergency_lightning_good  = isset($data['emergency_lightning_good']) ? $user->protectData($data['emergency_lightning_good']) :'';
        $action_6  = isset($data['action_6']) ? $user->protectData($data['action_6']) :'';
        $extinguishers_fire_fighters  = isset($data['extinguishers_fire_fighters']) ? $user->protectData($data['extinguishers_fire_fighters']) :'';
        $action_7   = isset($data['action_7']) ? $user->protectData($data['action_7']) :'';
        $flammable_material_secure  = isset($data['flammable_material_secure']) ? $user->protectData($data['flammable_material_secure']) :'';
        $action_8  = isset($data['action_8']) ? $user->protectData($data['action_8']) :'';
        $evidence_of_used_battery_charger  = isset($data['evidence_of_used_battery_charger']) ? $user->protectData($data['evidence_of_used_battery_charger']) :'';
        $action_9  = isset($data['action_9']) ? $user->protectData($data['action_9']) :'';
        $kitchen_is_clean_and_tidy  = isset($data['kitchen_is_clean_and_tidy']) ? $user->protectData($data['kitchen_is_clean_and_tidy']) :'';
        $action_10  = isset($data['action_10']) ? $user->protectData($data['action_10']) :'';
        $cooker_Extractor_in_good_condition  = isset($data['cooker_Extractor_in_good_condition']) ? $user->protectData($data['cooker_Extractor_in_good_condition']) :'';
        $action_11  = isset($data['action_11']) ? $user->protectData($data['action_11']) :'';
        $floor_are_non_slip_and_dry  = isset($data['floor_are_non_slip_and_dry']) ? $user->protectData($data['floor_are_non_slip_and_dry']) :'';
        $action_12  = isset($data['action_12']) ? $user->protectData($data['action_12']) :'';
        $adequate_handwashing_facilities  = isset($data['adequate_handwashing_facilities']) ? $user->protectData($data['adequate_handwashing_facilities']) :'';
        $action_13  = isset($data['action_13']) ? $user->protectData($data['action_13']) :'';
        $food_waste_in_suitable_containers  = isset($data['food_waste_in_suitable_containers']) ? $user->protectData($data['food_waste_in_suitable_containers']) :'';
        $action_14  = isset($data['action_14']) ? $user->protectData($data['action_14']) :'';
        $food_stored_in_suitable_containers  = isset($data['food_stored_in_suitable_containers']) ? $user->protectData($data['food_stored_in_suitable_containers']) :'';
        $action_15  = isset($data['action_15']) ? $user->protectData($data['action_15']) :'';
        $fridge_and_freezers_are_working  = isset($data['fridge_and_freezers_are_working']) ? $user->protectData($data['fridge_and_freezers_are_working']) :'';
        $action_16  = isset($data['action_16']) ? $user->protectData($data['action_16']) :'';
        $floor_stairways_and_corridor_clear  = isset($data['floor_stairways_and_corridor_clear']) ? $user->protectData($data['floor_stairways_and_corridor_clear']) :'';
        $action_17 = isset($data['action_17']) ? $user->protectData($data['action_17']) :'';
        $floors_are_free_from_trailing_wires = isset($data['floors_are_free_from_trailing_wires']) ? $user->protectData($data['floors_are_free_from_trailing_wires']) :'';
        $action_18 = isset($data['action_18']) ? $user->protectData($data['action_18']) :'';
        $floor_converings_in_good_condition = isset($data['floor_converings_in_good_condition']) ? $user->protectData($data['floor_converings_in_good_condition']) :'';
        $action_19 = isset($data['action_19']) ? $user->protectData($data['action_19']) :'';
        $secure_handrails_and_stairways = isset($data['secure_handrails_and_stairways']) ? $user->protectData($data['secure_handrails_and_stairways']) :'';
        $action_20 = isset($data['action_20']) ? $user->protectData($data['action_20']) :'';
        $bathroom_clean_and_working = isset($data['bathroom_clean_and_workin']) ? $user->protectData($data['bathroom_clean_and_workin']) :'';
        $action_21= isset($data['action_21']) ? $user->protectData($data['action_21']) :'';
        $running_water = isset($data['running_water']) ? $user->protectData($data['running_water']) :'';
        $action_22 = isset($data['action_22']) ? $user->protectData($data['action_22']) :'';
        $maintenance_hours_reported = isset($data['maintenance_hours_reported']) ? $user->protectData($data['maintenance_hours_reported']) :'';
        $action_23 = isset($data['action_23']) ? $user->protectData($data['action_23']) :'';
        $refuse_collected_store_correctly = isset($data['refuse_collected_store_correctly']) ? $user->protectData($data['refuse_collected_store_correctly']) :'';
        $action_24 = isset($data['action_24']) ? $user->protectData($data['action_24']) :'';
        $id =isset($data['id']) ? $user->protectData($data['id']) :'';

        if($action_1 !=''){
            $service = "['service'=>$service, 'action_1'=>$action_1]";
        }elseif($action_2 !=''){
            $compiled_by = json_encode(['compiled_by'=>$compiled_by, 'action_2'=>$action_2]);
        }elseif($action_3 !=''){
            $staff_lead = json_encode(['staff_lead'=>$staff_lead, 'action_3'=>$action_3]);
        }elseif($action_4 !=''){
            $escape_route = json_encode(['escape_route'=>$escape_route, 'action_4'=>$action_4]);
        }elseif($action_5 !=''){
            $fire_warning_indicator = json_encode(['fire_warning_indicator'=>$fire_warning_indicator, 'action_5'=>$action_5]);
        }elseif($action_6 !=''){
            $emergency_lightning_good = json_encode(['emergency_lightning_good'=>$emergency_lightning_good, 'action_6'=>$action_6]);
        }elseif($action_7 !=''){
            $extinguishers_fire_fighters = json_encode(['extinguishers_fire_fighters'=>$extinguishers_fire_fighters, 'action_7'=>$action_7]);
        }elseif($action_8 !=''){
            $flammable_material_secure = json_encode(['flammable_material_secure'=>$flammable_material_secure, 'action_8'=>$action_8]);
        }elseif($action_9 !=''){
            $evidence_of_used_battery_charger = json_encode(['evidence_of_used_battery_charger'=>$escape_route, 'action_9'=>$action_9]);
        }elseif($action_10 !=''){
            $kitchen_is_clean_and_tidy = json_encode(['kitchen_is_clean_and_tidy'=>$kitchen_is_clean_and_tidy, 'action_10'=>$action_10]);
        }elseif($action_11 !=''){
            $cooker_Extractor_in_good_condition = json_encode(['cooker_Extractor_in_good_condition'=>$cooker_Extractor_in_good_condition, 'action_11'=>$action_11]);
        }elseif($action_12 !=''){
            $floor_are_non_slip_and_dry = json_encode(['floor_are_non_slip_and_dry'=>$floor_are_non_slip_and_dry, 'action_12'=>$action_12]);
        }elseif($action_13 !=''){
            $adequate_handwashing_facilities = json_encode(['adequate_handwashing_facilities'=>$adequate_handwashing_facilities, 'action_13'=>$action_13]);
        }elseif($action_14 !=''){
            $food_waste_in_suitable_containers = json_encode(['food_waste_in_suitable_containers'=>$food_waste_in_suitable_containers, 'action_14'=>$action_14]);
        }elseif($action_15 !=''){
            $food_stored_in_suitable_containers = json_encode(['food_stored_in_suitable_containers'=>$food_stored_in_suitable_containers, 'action_15'=>$action_15]);
        }elseif($action_16 !=''){
            $fridge_and_freezers_are_working = json_encode(['fridge_and_freezers_are_working'=>$fridge_and_freezers_are_working, 'action_16'=>$action_16]);
        }elseif($action_17 !=''){
            $floor_stairways_and_corridor_clear = json_encode(['floor_stairways_and_corridor_clear'=>$floor_stairways_and_corridor_clear, 'action_17'=>$action_17]);
        }elseif($action_18 !=''){
            $floors_are_free_from_trailing_wires = json_encode(['floors_are_free_from_trailing_wires'=>$floors_are_free_from_trailing_wires, 'action_18'=>$action_18]);
        }elseif($action_19 !=''){
            $floor_converings_in_good_condition = json_encode(['floor_converings_in_good_condition'=>$floor_converings_in_good_condition, 'action_19'=>$action_19]);
        }elseif($action_20 !=''){
            $secure_handrails_and_stairways = json_encode(['secure_handrails_and_stairways'=>$secure_handrails_and_stairways, 'action_20'=>$action_20]);
        }elseif($action_21 !=''){
            $bathroom_clean_and_working = json_encode(['bathroom_clean_and_working'=>$bathroom_clean_and_working, 'action_21'=>$action_21]);
        }elseif($action_22 !=''){
            $running_water = json_encode(['running_water'=>$running_water, 'action_22'=>$action_22]);
        }elseif($action_23 !=''){
            $maintenance_hours_reported = json_encode(['maintenance_hours_reported'=>$maintenance_hours_reported, 'action_23'=>$action_23]);
        }elseif($action_24 !=''){
            $refuse_collected_store_correctly = json_encode(['refuse_collected_store_correctly'=>$refuse_collected_store_correctly, 'action_24'=>$action_24]);
        }elseif($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'You don\'t have permission to carry out this update']);
        }else{
            
            $response = $user->update_service_check_daily_report(
                $service,
                $compiled_by,
                $staff_lead,
                $date,
                $escape_route,
                $fire_warning_indicator,
                $emergency_lightning_good,
                $extinguishers_fire_fighters,
                $flammable_material_secure,
                $evidence_of_used_battery_charger,
                $kitchen_is_clean_and_tidy,
                $cooker_Extractor_in_good_condition,
                $floor_are_non_slip_and_dry,
                $adequate_handwashing_facilities,
                $food_waste_in_suitable_containers,
                $food_stored_in_suitable_containers,
                $fridge_and_freezers_are_working,
                $floor_stairways_and_corridor_clear,
                $floors_are_free_from_trailing_wires,
                $floor_converings_in_good_condition,
                $secure_handrails_and_stairways,
                $bathroom_clean_and_working,
                $running_water,
                $maintenance_hours_reported,
                $refuse_collected_store_correctly,
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