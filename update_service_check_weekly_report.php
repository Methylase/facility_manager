<?php
require_once 'RoleMiddleware.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $smoke_alarm_tested_and_working  = isset($data['smoke_alarm_tested_and_working']) ? $user->protectData($data['smoke_alarm_tested_and_working']) :'';
        $action_1  = isset($data['action_1']) ? $user->protectData($data['action_1']) :'';
        $fire_alarm_points_system_working  = isset($data['fire_alarm_points_system_working']) ? $user->protectData($data['fire_alarm_points_system_working']) :'';
        $action_2  = isset($data['action_2']) ? $user->protectData($data['action_2']) :'';
        $carbon_monoxide_alarm_tested = isset($data['carbon_monoxide_alarm_tested']) ? $user->protectData($data['carbon_monoxide_alarm_tested']) :'';
        $action_3  = isset($data['action_3']) ? $user->protectData($data['action_3']) :'';
        $charging_indicator_on_emergency_lighting  = isset($data['charging_indicator_on_emergency_lighting']) ? $user->protectData($data['charging_indicator_on_emergency_lighting']) :'';
        $action_4  = isset($data['action_4']) ? $user->protectData($data['action_4']) :'';
        $evidence_of_used_battery_charger  = isset($data['evidence_of_used_battery_charger']) ? $user->protectData($data['evidence_of_used_battery_charger']) :'';
        $action_5  = isset($data['action_5']) ? $user->protectData($data['action_5']) :'';
        $washing_machine_filter_cleaned  = isset($data['washing_machine_filter_cleaned']) ? $user->protectData($data['washing_machine_filter_cleaned']) :'';
        $action_6  = isset($data['action_6']) ? $user->protectData($data['action_6']) :'';
        $water_filter_in_staff_office_changed  = isset($data['water_filter_in_staff_office_changed']) ? $user->protectData($data['water_filter_in_staff_office_changed']) :'';
        $action_7 = isset($data['action_7']) ? $user->protectData($data['action_7']) :'';
        $charcoal_filter_changed_to_ovenhob = isset($data['charcoal_filter_changed_to_ovenhob']) ? $user->protectData($data['charcoal_filter_changed_to_ovenhob']) :'';
        $action_8  = isset($data['action_8']) ? $user->protectData($data['action_8']) :'';
        $unneccesary_combustible_material  = isset($data['unneccesary_combustible_material']) ? $user->protectData($data['unneccesary_combustible_material']) :'';
        $action_9  = isset($data['action_9']) ? $user->protectData($data['action_9']) :'';
        $ventilations_are_not_obstructed  = isset($data['ventilations_are_not_obstructed ']) ? $user->protectData($data['ventilations_are_not_obstructed ']) :'';
        $action_10  = isset($data['action_10']) ? $user->protectData($data['action_10']) :'';
        $lightning_levels_are_adequate = isset($data['lightning_levels_are_adequate']) ? $user->protectData($data['lightning_levels_are_adequate']) :'';
        $action_11  = isset($data['action_11']) ? $user->protectData($data['action_11']) :'';
        $lights_are_working_satisfactorily  = isset($data['lights_are_working_satisfactorily']) ? $user->protectData($data['lights_are_working_satisfactorily']) :'';
        $action_12= isset($data['action_12']) ? $user->protectData($data['action_12']) :''; 
        $line_filter_in_tumble_dryer_cleaned = isset($data['line_filter_in_tumble_dryer_cleaned']) ? $user->protectData($data['line_filter_in_tumble_dryer_cleaned']) :'';
        $action_13  = isset($data['action_13']) ? $user->protectData($data['action_13']) :'';
        $kitchen_is_clean_tidy = isset($data['kitchen_is_clean_tidy']) ? $user->protectData($data['kitchen_is_clean_tidy']) :'';
        $action_14  = isset($data['action_14']) ? $user->protectData($data['action_14']) :'';
        $cooker_extractor_in_good_condition  = isset($data['cooker_extractor_in_good_condition']) ? $user->protectData($data['cooker_extractor_in_good_condition']) :'';
        $action_15  = isset($data['action_15']) ? $user->protectData($data['action_15']) :'';
        $fridge_and_freezers_are_working = isset($data['fridge_and_freezers_are_working']) ? $user->protectData($data['fridge_and_freezers_are_working']) :'';
        $action_16  = isset($data['action_16']) ? $user->protectData($data['action_16']) :'';
        $staff_have_sufficient_space = isset($data['staff_have_sufficient_space']) ? $user->protectData($data['staff_have_sufficient_space']) :'';
        $action_17  = isset($data['action_17']) ? $user->protectData($data['action_17']) :'';
        $desk_work_area_suitable = isset($data['desk_work_area_suitable']) ? $user->protectData($data['desk_work_area_suitable']) :'';
        $action_18  = isset($data['action_18']) ? $user->protectData($data['action_18']) :'';
        $seat_lower_back_support = isset($data['seat_lower_back_support']) ? $user->protectData($data['seat_lower_back_support']) :'';
        $action_19  = isset($data['action_19']) ? $user->protectData($data['action_19']) :'';
        $unused_water_outlet_flushed = isset($data['unused_water_outlet_flushed']) ? $user->protectData($data['unused_water_outlet_flushed']) :'';
        $action_20  = isset($data['action_20']) ? $user->protectData($data['action_20']) :'';
        $showerheads_in_good_conditions = isset($data['showerheads_in_good_conditions']) ? $user->protectData($data['showerheads_in_good_conditions']) :'';
        $action_21  = isset($data['action_21']) ? $user->protectData($data['action_21']) :'';
        $provision_disposal_of_sanitary_towels  = isset($data['provision_disposal_of_sanitary_towels']) ? $user->protectData($data['provision_disposal_of_sanitary_towels']) :'';
        $action_22  = isset($data['action_22']) ? $user->protectData($data['action_22']) :'';
        $cable_coverings_in_good_conditions  = isset($data['cable_coverings_in_good_conditions']) ? $user->protectData($data['cable_coverings_in_good_conditions']) :'';
        $action_23 = isset($data['action_23']) ? $user->protectData($data['action_23']) :'';
        $electrical_equipment_in_good_condition = isset($data['electrical_equipment_in_good_condition']) ? $user->protectData($data['electrical_equipment_in_good_condition']) :'';
        $action_24  = isset($data['action_24']) ? $user->protectData($data['action_24']) :'';
        $electrical_sockets_in_good_condition = isset($data['electrical_sockets_in_good_condition']) ? $user->protectData($data['electrical_sockets_in_good_condition']) :'';
        $action_25  = isset($data['action_25']) ? $user->protectData($data['action_25']) :'';
        $power_socket_not_overloaded = isset($data['power_socket_not_overloaded']) ? $user->protectData($data['power_socket_not_overloaded']) :'';
        $action_26  = isset($data['action_26']) ? $user->protectData($data['action_26']) :'';
        $working_environment_satisfactory = isset($data['working_environment_satisfactory']) ? $user->protectData($data['working_environment_satisfactory']) :'';
        $action_27  = isset($data['action_27']) ? $user->protectData($data['action_27']) :'';
        $chairs_good_condition_adjustable = isset($data['chairs_good_condition_adjustable']) ? $user->protectData($data['chairs_good_condition_adjustable']) :'';
        $action_28  = isset($data['action_28']) ? $user->protectData($data['action_28']) :'';
        $coshh_cupboards_signed_and_locked = isset($data['coshh_cupboards_signed_and_locked']) ? $user->protectData($data['coshh_cupboards_signed_and_locked']) :'';
        $action_29  = isset($data['action_29']) ? $user->protectData($data['action_29']) :'';
        $first_aid_arrangement_posters = isset($data['first_aid_arrangement_posters']) ? $user->protectData($data['first_aid_arrangement_posters']) :'';
        $action_30  = isset($data['action_30']) ? $user->protectData($data['action_30']) :'';
        $employers_insurance_liability_shown = isset($data['employers_insurance_liability_shown']) ? $user->protectData($data['employers_insurance_liability_shown']) :'';
        $action_31  = isset($data['action_31']) ? $user->protectData($data['action_31']) :'';
        $health_safety_law_poster_shown = isset($data['health_safety_law_poster_shown']) ? $user->protectData($data['health_safety_law_poster_shown']) :'';
        $action_32  = isset($data['action_32']) ? $user->protectData($data['action_32']) :'';
        $entrance_exit_free_from_obstruction = isset($data['entrance_exit_free_from_obstruction']) ? $user->protectData($data['entrance_exit_free_from_obstruction']) :'';
        $action_33  = isset($data['action_33']) ? $user->protectData($data['action_33']) :'';
        $entrance_area_in_good_condition = isset($data['entrance_area_in_good_condition']) ? $user->protectData($data['entrance_area_in_good_condition']) :'';
        $action_34  = isset($data['action_34']) ? $user->protectData($data['action_34']) :'';
        $drains_and_water_pipes_working = isset($data['drains_and_water_pipes_working']) ? $user->protectData($data['drains_and_water_pipes_working']) :'';
        $action_35  = isset($data['action_35']) ? $user->protectData($data['action_35']) :'';
        $cctv_in_working_conditions = isset($data['cctv_in_working_conditions']) ? $user->protectData($data['cctv_in_working_conditions']) :'';
        $action_36  = isset($data['action_36']) ? $user->protectData($data['action_36']) :'';
        $no_item_to_start_fire = isset($data['no_item_to_start_fire']) ? $user->protectData($data['no_item_to_start_fire']) :'';
        $action_37  = isset($data['action_37']) ? $user->protectData($data['action_37']) :'';
        $refuse_collected_store_correctly = isset($data['refuse_collected_store_correctly']) ? $user->protectData($data['refuse_collected_store_correctly']) :'';
        $action_38  = isset($data['action_38']) ? $user->protectData($data['action_38']) :'';
        $security_lightning_is_working = isset($data['security_lightning_is_working']) ? $user->protectData($data['security_lightning_is_working']) :'';
        $action_39  = isset($data['action_39']) ? $user->protectData($data['action_39']) :'';
        $box_location_1  = isset($data['box_location_1']) ? $user->protectData($data['box_location_1']) :'';
        $action_40  = isset($data['action_40']) ? $user->protectData($data['action_40']) :'';
        $no_of_guidance_leaflet_1  = isset($data['no_of_guidance_leaflet_1']) ? $user->protectData($data['no_of_guidance_leaflet_1']) :'';
        $action_41  = isset($data['action_41']) ? $user->protectData($data['action_41']) :'';
        $no_of_adhesive_dressings_1  = isset($data['no_of_adhesive_dressings_1']) ? $user->protectData($data['no_of_adhesive_dressings_1']) :'';
        $action_42  = isset($data['action_42']) ? $user->protectData($data['action_42']) :'';
        $no_of_adhesive_pads_with_bandage_1 = isset($data['no_of_adhesive_pads_with_bandage_1']) ? $user->protectData($data['no_of_adhesive_pads_with_bandage_1']) :'';
        $action_43 = isset($data['action_43']) ? $user->protectData($data['action_43']) :'';
        $no_of_wrapped_triangular_bandage_1 = isset($data['no_of_wrapped_triangular_bandage_1']) ? $user->protectData($data['no_of_wrapped_triangular_bandage_1']) :'';
        $action_44  = isset($data['action_44']) ? $user->protectData($data['action_44']) :'';
        $no_of_medium_dressings_1 = isset($data['no_of_medium_dressings_1']) ? $user->protectData($data['no_of_medium_dressings_1']) :'';
        $action_45  = isset($data['action_45']) ? $user->protectData($data['action_45']) :'';
        $no_of_large_dressings_1 = isset($data['no_of_large_dressings_1']) ? $user->protectData($data['no_of_large_dressings_1']) :'';
        $action_46  = isset($data['action_46']) ? $user->protectData($data['action_46']) :'';
        $no_of_safety_pins_1 = isset($data['no_of_safety_pins_1']) ? $user->protectData($data['no_of_safety_pins_1']) :'';
        $action_47  = isset($data['action_47']) ? $user->protectData($data['action_47']) :'';
        $box_location_2 = isset($data['box_location_2']) ? $user->protectData($data['box_location_2']) :'';
        $no_of_guidance_leaflet_2 = isset($data['no_of_guidance_leaflet_2']) ? $user->protectData($data['no_of_guidance_leaflet_2']) :'';
        $action_48  = isset($data['action_48']) ? $user->protectData($data['action_48']) :'';
        $no_of_adhesive_dressings_2 = isset($data['no_of_adhesive_dressings_2']) ? $user->protectData($data['no_of_adhesive_dressings_2']) :'';
        $action_49  = isset($data['action_49']) ? $user->protectData($data['action_49']) :'';
        $no_of_adhesive_pads_with_bandage_2 = isset($data['no_of_adhesive_pads_with_bandage_2']) ? $user->protectData($data['no_of_adhesive_pads_with_bandage_2']) :'';
        $action_50  = isset($data['action_50']) ? $user->protectData($data['action_50']) :'';
        $no_of_wrapped_triangular_bandage_2 = isset($data['no_of_wrapped_triangular_bandage_2']) ? $user->protectData($data['no_of_wrapped_triangular_bandage_2']) :'';
        $action_51  = isset($data['action_51']) ? $user->protectData($data['action_51']) :'';
        $no_of_medium_dressings_2 = isset($data['no_of_medium_dressings_2']) ? $user->protectData($data['no_of_medium_dressings_2']) :'';
        $action_52  = isset($data['action_52']) ? $user->protectData($data['action_52']) :'';
        $no_of_large_dressings_2 = isset($data['no_of_large_dressings_2']) ? $user->protectData($data['no_of_large_dressings_2']) :'';
        $action_53  = isset($data['action_53']) ? $user->protectData($data['action_53']) :'';
        $no_of_safety_pins_2 = isset($data['no_of_safety_pins_2']) ? $user->protectData($data['no_of_safety_pins_2']) :'';
        $action_54  = isset($data['action_54']) ? $user->protectData($data['action_54']) :'';
        $no_of_moisture_cleaning_wipes = isset($data['no_of_moisture_cleaning_wipes']) ? $user->protectData($data['no_of_moisture_cleaning_wipes']) :'';
        $action_55  = isset($data['action_55']) ? $user->protectData($data['action_55']) :'';
        $start_date  = isset($data['start_date']) ? $user->protectData($data['start_date']) :'';
        $start_time  = isset($data['start_time']) ? $user->protectData($data['start_time']) :'';
        $end_date  = isset($data['end_date']) ? $user->protectData($data['end_date']) :'';
        $end_time  = isset($data['end_time']) ? $user->protectData($data['end_time']) :'';
        $session  = isset($data['end_time']) ? $user->protectData($data['end_time']) :'';
        $communication_method  = isset($data['communication_method']) ? $user->protectData($data['communication_method']) :'';
        $venue_of_session  = isset($data['venue_of_session']) ? $user->protectData($data['venue_of_session']) :'';
        $notes  = isset($data['notes']) ? $user->protectData($data['notes']) :'';
        $id =isset($data['id']) ? $user->protectData($data['id']) :'';

        if($action_1 !=''){
            $smoke_alarm_tested_and_working = "['smoke_alarm_tested_and_working'=>$smoke_alarm_tested_and_working, 'action_1'=>$action_1]";
        }elseif($action_2 !=''){
            $fire_alarm_points_system_working = json_encode(['fire_alarm_points_system_working'=>$fire_alarm_points_system_working, 'action_2'=>$action_2]);
        }elseif($action_3 !=''){
            $carbon_monoxide_alarm_tested = json_encode(['carbon_monoxide_alarm_tested'=>$carbon_monoxide_alarm_tested, 'action_3'=>$action_3]);
        }elseif($action_4 !=''){
            $charging_indicator_on_emergency_lighting  = json_encode(['charging_indicator_on_emergency_lighting'=>$charging_indicator_on_emergency_lighting, 'action_4'=>$action_4]);
        }elseif($action_5 !=''){
            $evidence_of_used_battery_charger = json_encode(['evidence_of_used_battery_charger'=>$evidence_of_used_battery_charger, 'action_5'=>$action_5]);
        }elseif($action_6 !=''){
            $washing_machine_filter_cleaned = json_encode(['washing_machine_filter_cleaned'=>$washing_machine_filter_cleaned, 'action_6'=>$action_6]);
        }elseif($action_7 !=''){
            $water_filter_in_staff_office_changed = json_encode(['water_filter_in_staff_office_changed'=>$water_filter_in_staff_office_changed, 'action_7'=>$action_7]);
        }elseif($action_8 !=''){
            $charcoal_filter_changed_to_ovenhob = json_encode(['charcoal_filter_changed_to_ovenhob'=>$charcoal_filter_changed_to_ovenhob, 'action_8'=>$action_8]);
        }elseif($action_9 !=''){
            $unneccesary_combustible_material = json_encode(['unneccesary_combustible_material'=>$unneccesary_combustible_material, 'action_9'=>$action_9]);
        }elseif($action_10 !=''){
            $ventilations_are_not_obstructed = json_encode(['ventilations_are_not_obstructed'=>$ventilations_are_not_obstructed, 'action_10'=>$action_10]);
        }elseif($action_11 !=''){
            $lightning_levels_are_adequate = json_encode(['lightning_levels_are_adequate'=>$lightning_levels_are_adequate, 'action_11'=>$action_11]);
        }elseif($action_12 !=''){
            $lights_are_working_satisfactorily = json_encode(['lights_are_working_satisfactorily'=>$lights_are_working_satisfactorily, 'action_12'=>$action_12]);
        }elseif($action_13 !=''){
            $line_filter_in_tumble_dryer_cleaned = json_encode(['line_filter_in_tumble_dryer_cleaned'=>$line_filter_in_tumble_dryer_cleaned, 'action_13'=>$action_13]);
        }elseif($action_14 !=''){
            $kitchen_is_clean_tidy = json_encode(['kitchen_is_clean_tidy'=>$kitchen_is_clean_tidy, 'action_14'=>$action_14]);
        }elseif($action_15 !=''){
            $cooker_extractor_in_good_condition = json_encode(['cooker_extractor_in_good_condition'=>$cooker_extractor_in_good_condition, 'action_15'=>$action_15]);
        }elseif($action_16 !=''){
            $fridge_and_freezers_are_working = json_encode(['fridge_and_freezers_are_working'=>$fridge_and_freezers_are_working, 'action_16'=>$action_16]);
        }elseif($action_17 !=''){
            $staff_have_sufficient_space = json_encode(['staff_have_sufficient_space'=>$staff_have_sufficient_space, 'action_17'=>$action_17]);
        }elseif($action_18 !=''){
            $desk_work_area_suitable = json_encode(['desk_work_area_suitable'=>$desk_work_area_suitable, 'action_18'=>$action_18]);
        }elseif($action_19 !=''){
            $seat_lower_back_support = json_encode(['seat_lower_back_support'=>$seat_lower_back_support, 'action_19'=>$action_19]);
        }elseif($action_20 !=''){
            $unused_water_outlet_flushed = json_encode(['unused_water_outlet_flushed'=>$unused_water_outlet_flushed, 'action_20'=>$action_20]);
        }elseif($action_21 !=''){
            $showerheads_in_good_conditions = json_encode(['showerheads_in_good_conditions'=>$showerheads_in_good_conditions, 'action_21'=>$action_21]);
        }elseif($action_22 !=''){
            $provision_disposal_of_sanitary_towels = json_encode(['provision_disposal_of_sanitary_towels'=>$provision_disposal_of_sanitary_towels, 'action_22'=>$action_22]);
        }elseif($action_23 !=''){
            $cable_coverings_in_good_conditions = json_encode(['cable_coverings_in_good_conditions'=>$cable_coverings_in_good_conditions, 'action_23'=>$action_23]);
        }elseif($action_24 !=''){
            $electrical_equipment_in_good_condition = json_encode(['electrical_equipment_in_good_condition'=>$electrical_equipment_in_good_condition, 'action_24'=>$action_24]);
        }elseif($action_25 !=''){
            $electrical_sockets_in_good_condition = "['electrical_sockets_in_good_condition'=>$electrical_sockets_in_good_condition, 'action_25'=>$action_25]";
        }elseif($action_26 !=''){
            $power_socket_not_overloaded = json_encode(['power_socket_not_overloaded'=>$power_socket_not_overloaded, 'action_26'=>$action_26]);
        }elseif($action_27 !=''){
            $working_environment_satisfactory = json_encode(['working_environment_satisfactory'=>$working_environment_satisfactory, 'action_27'=>$action_27]);
        }elseif($action_28 !=''){
            $chairs_good_condition_adjustable = json_encode(['chairs_good_condition_adjustable'=>$chairs_good_condition_adjustable, 'action_28'=>$action_28]);
        }elseif($action_29 !=''){
            $coshh_cupboards_signed_and_locked = json_encode(['coshh_cupboards_signed_and_locked'=>$coshh_cupboards_signed_and_locked, 'action_29'=>$action_29]);
        }elseif($action_30 !=''){
            $first_aid_arrangement_posters = json_encode(['first_aid_arrangement_posters'=>$first_aid_arrangement_posters, 'action_30'=>$action_30]);
        }elseif($action_31 !=''){
            $employers_insurance_liability_shown = json_encode(['employers_insurance_liability_shown'=>$employers_insurance_liability_shown, 'action_31'=>$action_31]);
        }elseif($action_32 !=''){
            $health_safety_law_poster_shown = json_encode(['health_safety_law_poster_shown'=>$health_safety_law_poster_shown, 'action_32'=>$action_32]);
        }elseif($action_33 !=''){
            $entrance_exit_free_from_obstruction = json_encode(['entrance_exit_free_from_obstruction'=>$entrance_exit_free_from_obstruction, 'action_33'=>$action_33]);
        }elseif($action_34 !=''){
            $entrance_area_in_good_condition = json_encode(['entrance_area_in_good_condition'=>$entrance_area_in_good_condition, 'action_34'=>$action_34]);
        }elseif($action_35 !=''){
            $drains_and_water_pipes_working = json_encode(['drains_and_water_pipes_working'=>$drains_and_water_pipes_working, 'action_35'=>$action_35]);
        }elseif($action_36 !=''){
            $cctv_in_working_conditions = json_encode(['cctv_in_working_conditions'=>$cctv_in_working_conditions, 'action_36'=>$action_36]);
        }elseif($action_37 !=''){
            $no_item_to_start_fire = json_encode(['no_item_to_start_fire'=>$no_item_to_start_fire, 'action_37'=>$action_37]);
        }elseif($action_38 !=''){
            $refuse_collected_store_correctly = json_encode(['refuse_collected_store_correctly'=>$refuse_collected_store_correctly, 'action_38'=>$action_38]);
        }elseif($action_39 !=''){
            $security_lightning_is_working = json_encode(['security_lightning_is_working'=>$security_lightning_is_working, 'action_39'=>$action_39]);
        }elseif($action_40 !=''){
            $box_location_1 = json_encode(['box_location_1'=>$box_location_1, 'action_40'=>$action_40]);
        }elseif($action_41 !=''){
            $no_of_guidance_leaflet_1 = json_encode(['no_of_guidance_leaflet_1'=>$no_of_guidance_leaflet_1, 'action_41'=>$action_41]);
        }elseif($action_42 !=''){
            $no_of_adhesive_dressings_1 = json_encode(['no_of_adhesive_dressings_1'=>$no_of_adhesive_dressings_1, 'action_42'=>$action_42]);
        }elseif($action_43 !=''){
            $no_of_adhesive_pads_with_bandage_1 = json_encode(['no_of_adhesive_pads_with_bandage_1'=>$no_of_adhesive_pads_with_bandage_1, 'action_43'=>$action_43]);
        }elseif($action_44 !=''){
            $no_of_wrapped_triangular_bandage_1 = json_encode(['no_of_wrapped_triangular_bandage_1'=>$no_of_wrapped_triangular_bandage_1, 'action_44'=>$action_44]);
        }elseif($action_45 !=''){
            $no_of_medium_dressings_1 = json_encode(['no_of_medium_dressings_1'=>$no_of_medium_dressings_1, 'action_45'=>$action_45]);
        }elseif($action_46 !=''){
            $no_of_large_dressings_1 = json_encode(['no_of_large_dressings_1'=>$no_of_large_dressings_1, 'action_46'=>$action_46]);
        }elseif($action_47 !=''){
            $no_of_safety_pins_1 = json_encode(['no_of_safety_pins_1'=>$no_of_safety_pins_1, 'action_47'=>$action_47]);
        }elseif($action_48 !=''){
            $no_of_guidance_leaflet_2 = json_encode(['no_of_adhesive_dressings_2'=>$no_of_adhesive_dressings_2, 'action_48'=>$action_48]);
        }elseif($action_49 !=''){
            $no_of_adhesive_dressings_2 = json_encode(['no_of_adhesive_dressings_2'=>$no_of_adhesive_dressings_2, 'action_49'=>$action_49]);
        }elseif($action_50 !=''){
            $no_of_adhesive_pads_with_bandage_2 = json_encode(['no_of_adhesive_pads_with_bandage_2'=>$no_of_adhesive_pads_with_bandage_2, 'action_50'=>$action_50]);
        }elseif($action_51 !=''){
            $no_of_wrapped_triangular_bandage_2 = json_encode(['no_of_wrapped_triangular_bandage_2'=>$no_of_wrapped_triangular_bandage_2, 'action_51'=>$action_51]);
        }elseif($action_52 !=''){
            $bathroom_clean_and_working = json_encode(['bathroom_clean_and_working'=>$bathroom_clean_and_working, 'action_52'=>$action_52]);
        }elseif($action_53 !=''){
            $no_of_large_dressings_2 = json_encode(['no_of_large_dressings_2'=>$no_of_large_dressings_2, 'action_53'=>$action_53]);
        }elseif($action_54 !=''){
            $no_of_safety_pins_2 = json_encode(['no_of_safety_pins_2'=>$no_of_safety_pins_2, 'action_54'=>$action_54]);
        }elseif($action_55 !=''){
            $no_of_moisture_cleaning_wipes = json_encode(['no_of_moisture_cleaning_wipes'=>$no_of_moisture_cleaning_wipes, 'action_55'=>$action_55]);
        }elseif($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'You don\'t have permission to carry out this update']);
        }else{

            $response = $user->update_service_check_weekly_report(
                $smoke_alarm_tested_and_working,
                $fire_alarm_points_system_working,
                $carbon_monoxide_alarm_tested,
                $charging_indicator_on_emergency_lighting,
                $evidence_of_used_battery_charger,
                $washing_machine_filter_cleaned,
                $water_filter_in_staff_office_changed,
                $charcoal_filter_changed_to_ovenhob,
                $unneccesary_combustible_material,
                $ventilations_are_not_obstructed,
                $lightning_levels_are_adequate,
                $lights_are_working_satisfactorily, 
                $line_filter_in_tumble_dryer_cleaned,
                $kitchen_is_clean_tidy,
                $cooker_extractor_in_good_condition,
                $fridge_and_freezers_are_working,
                $staff_have_sufficient_space,
                $desk_work_area_suitable,
                $seat_lower_back_support,
                $unused_water_outlet_flushed,
                $showerheads_in_good_conditions,
                $provision_disposal_of_sanitary_towels,
                $cable_coverings_in_good_conditions,
                $electrical_equipment_in_good_condition,
                $electrical_sockets_in_good_condition,
                $power_socket_not_overloaded,
                $working_environment_satisfactory,
                $chairs_good_condition_adjustable,
                $coshh_cupboards_signed_and_locked,
                $first_aid_arrangement_posters,
                $employers_insurance_liability_shown,
                $health_safety_law_poster_shown,
                $entrance_exit_free_from_obstruction,
                $entrance_area_in_good_condition,
                $drains_and_water_pipes_working,
                $cctv_in_working_conditions,
                $no_item_to_start_fire,
                $refuse_collected_store_correctly,
                $security_lightning_is_working,
                $box_location_1,
                $no_of_guidance_leaflet_1,
                $no_of_adhesive_dressings_1,
                $no_of_adhesive_pads_with_bandage_1,
                $no_of_wrapped_triangular_bandage_1,
                $no_of_medium_dressings_1,
                $no_of_large_dressings_1,
                $no_of_safety_pins_1,
                $box_location_2,
                $no_of_guidance_leaflet_2,
                $no_of_adhesive_dressings_2,
                $no_of_adhesive_pads_with_bandage_2,
                $no_of_wrapped_triangular_bandage_2,
                $no_of_medium_dressings_2,
                $no_of_large_dressings_2,
                $no_of_safety_pins_2,
                $no_of_moisture_cleaning_wipes,
                $start_date,
                $start_time,
                $end_date,
                $end_time,
                $session,
                $communication_method,
                $venue_of_session,
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