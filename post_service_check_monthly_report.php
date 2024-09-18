<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $door_seals_and_self_closing_devices = isset($data['door_seals_and_self_closing_devices']) ? $user->protectData($data['door_seals_and_self_closing_devices']) :'';
        $internal_self_closing_firedoors = isset($data['internal_self_closing_firedoors']) ? $user->protectData($data['internal_self_closing_firedoors']) :'';
        $emergency_lightning_function = isset($data['emergency_lightning_function']) ? $user->protectData($data['emergency_lightning_function']) :'';
        $evidence_of_used_battery_charger = isset($data['evidence_of_used_battery_charger']) ? $user->protectData($data['evidence_of_used_battery_charger']) :'';
        $washing_machine_filter_cleaned = isset($data['washing_machine_filter_cleaned']) ? $user->protectData($data['washing_machine_filter_cleaned']) :'';
        $water_dispenser_drip_trays_cleaned = isset($data['water_dispenser_drip_trays_cleaned']) ? $user->protectData($data['water_dispenser_drip_trays_cleaned']) :'';
        $auto_hold_open_freeswing_doors_fitted = isset($data['auto_hold_open_freeswing_doors_fitted']) ? $user->protectData($data['auto_hold_open_freeswing_doors_fitted']) :'';
        $sample_water_temperature_test = isset($data['sample_water_temperature_test']) ? $user->protectData($data['sample_water_temperature_test']) :'';
        $action_1  = isset($data['action_1']) ? $user->protectData($data['action_1']) :'';
        $no_smoking_sign_displayed = isset($data['no_smoking_sign_displayed']) ? $user->protectData($data['no_smoking_sign_displayed']) :'';
        $action_2  = isset($data['action_2']) ? $user->protectData($data['action_2']) :'';
        $furniture_complaints_updated_closed = isset($data['furniture_complaints_updated_closed']) ? $user->protectData($data['furniture_complaints_updated_closed']) :'';
        $action_3  = isset($data['action_3']) ? $user->protectData($data['action_3']) :'';
        $completed_repairs_updated_closed = isset($data['completed_repairs_updated_closed']) ? $user->protectData($data['completed_repairs_updated_closed']) :'';
        $action_4  = isset($data['action_4']) ? $user->protectData($data['action_4']) :'';
        $add_decoration_to_maintainance = isset($data['add_decoration_to_maintainance']) ? $user->protectData($data['add_decoration_to_maintainance']) :'';
        $action_5  = isset($data['action_5']) ? $user->protectData($data['action_5']) :'';
        $portal_appliances_tested_accurately = isset($data['portal_appliances_tested_accurately']) ? $user->protectData($data['portal_appliances_tested_accurately']) :'';
        $action_6  = isset($data['action_6']) ? $user->protectData($data['action_6']) :'';
        $kitchen_is_clean_tidy = isset($data['kitchen_is_clean_tidy']) ? $user->protectData($data['kitchen_is_clean_tidy']) :'';
        $action_7  = isset($data['action_7']) ? $user->protectData($data['action_7']) :'';
        $cooker_extractor_in_good_condition = isset($data['cooker_extractor_in_good_condition']) ? $user->protectData($data['cooker_extractor_in_good_condition']) :'';
        $action_8  = isset($data['action_8']) ? $user->protectData($data['action_8']) :'';
        $fridge_and_freezers_are_working = isset($data['fridge_and_freezers_are_working']) ? $user->protectData($data['fridge_and_freezers_are_working']) :'';
        $action_9  = isset($data['action_9']) ? $user->protectData($data['action_9']) :'';
        $staff_have_sufficient_space = isset($data['staff_have_sufficient_space']) ? $user->protectData($data['staff_have_sufficient_space']) :'';
        $action_10  = isset($data['action_10']) ? $user->protectData($data['action_10']) :'';
        $bins_are_emptied_regularly = isset($data['bins_are_emptied_regularly']) ? $user->protectData($data['bins_are_emptied_regularly ']) :'';
        $action_11  = isset($data['action_11']) ? $user->protectData($data['action_11']) :'';
        $desk_work_area_suitable = isset($data['desk_work_area_suitable']) ? $user->protectData($data['desk_work_area_suitable']) :'';
        $action_12  = isset($data['action_12']) ? $user->protectData($data['action_12']) :'';
        $seat_lower_back_support = isset($data['seat_lower_back_support']) ? $user->protectData($data['seat_lower_back_support']) :'';
        $action_13  = isset($data['action_13']) ? $user->protectData($data['action_13']) :'';
        $rooms_are_adequately_ventilated = isset($data['rooms_are_adequately_ventilated']) ? $user->protectData($data['rooms_are_adequately_ventilated']) :'';
        $action_14  = isset($data['action_14']) ? $user->protectData($data['action_14']) :'';
        $photocopier_printer_in_good_condition = isset($data['photocopier_printer_in_good_condition']) ? $user->protectData($data['photocopier_printer_in_good_condition']) :'';
        $action_15  = isset($data['action_15']) ? $user->protectData($data['action_15']) :'';
        $unused_water_outlet_flushed = isset($data['unused_water_outlet_flushed']) ? $user->protectData($data['unused_water_outlet_flushed']) :'';
        $action_16  = isset($data['action_16']) ? $user->protectData($data['action_16']) :'';
        $showerheads_in_good_conditions = isset($data['showerheads_in_good_conditions']) ? $user->protectData($data['showerheads_in_good_conditions']) :'';
        $action_17  = isset($data['action_17']) ? $user->protectData($data['action_17']) :'';
        $provision_disposal_of_sanitary_towels = isset($data['provision_disposal_of_sanitary_towels']) ? $user->protectData($data['provision_disposal_of_sanitary_towels']) :'';
        $action_18  = isset($data['action_18']) ? $user->protectData($data['action_18']) :'';
        $cable_coverings_in_good_conditions = isset($data['cable_coverings_in_good_conditions']) ? $user->protectData($data['cable_coverings_in_good_conditions']) :'';
        $action_19  = isset($data['action_19']) ? $user->protectData($data['action_19']) :'';
        $electrical_equipment_in_good_condition = isset($data['lectrical_equipment_in_good_condition']) ? $user->protectData($data['lectrical_equipment_in_good_condition']) :'';
        $action_20  = isset($data['action_20']) ? $user->protectData($data['action_20']) :'';
        $electrical_sockets_in_good_condition = isset($data['electrical_sockets_in_good_condition']) ? $user->protectData($data['electrical_sockets_in_good_condition']) :'';
        $action_21  = isset($data['action_21']) ? $user->protectData($data['action_21']) :'';
        $power_socket_not_overloaded = isset($data['power_socket_not_overloaded']) ? $user->protectData($data['power_socket_not_overloaded']) :'';
        $action_22 = isset($data['action_22']) ? $user->protectData($data['action_22']) :'';
        $working_environment_satisfactory = isset($data['working_environment_satisfactory']) ? $user->protectData($data['working_environment_satisfactory']) :'';
        $action_23 = isset($data['action_23']) ? $user->protectData($data['action_23']) :'';
        $chairs_in_good_condition_adjustable = isset($data['chairs_in_good_condition_adjustable']) ? $user->protectData($data['chairs_in_good_condition_adjustable']) :'';
        $action_24 = isset($data['action_24']) ? $user->protectData($data['action_24']) :'';
        $coshh_cupboards_signed_locked = isset($data['coshh_cupboards_signed_locked']) ? $user->protectData($data['coshh_cupboards_signed_locked']) :'';
        $action_25 = isset($data['action_25']) ? $user->protectData($data['action_25']) :'';
        $first_notice_and_posters = isset($data['first_notice_and_posters']) ? $user->protectData($data['first_notice_and_posters']) :'';
        $action_26  = isset($data['action_26']) ? $user->protectData($data['action_26']) :'';
        $first_exit_and_other_signs_in_place = isset($data['first_exit_and_other_signs_in_place']) ? $user->protectData($data['first_exit_and_other_signs_in_place']) :'';
        $action_27  = isset($data['action_27']) ? $user->protectData($data['action_27']) :'';
        $first_aid_arrangement_posters = isset($data['first_aid_arrangement_posters']) ? $user->protectData($data['first_aid_arrangement_posters']) :'';
        $action_28  = isset($data['action_28']) ? $user->protectData($data['action_28']) :'';
        $employers_insurance_liability_shown = isset($data['employers_insurance_liability_shown']) ? $user->protectData($data['employers_insurance_liability_shown']) :'';
        $action_29  = isset($data['action_29']) ? $user->protectData($data['action_29']) :'';
        $health_safety_law_poster_shown = isset($data['health_safety_law_poster_shown']) ? $user->protectData($data['health_safety_law_poster_shown']) :'';
        $action_30 = isset($data['action_30']) ? $user->protectData($data['action_30']) :'';
        $items_are_safely_stored = isset($data['items_are_safely_stored']) ? $user->protectData($data['items_are_safely_stored']) :'';
        $action_31  = isset($data['action_31']) ? $user->protectData($data['action_31']) :'';
        $entrance_exit_free_from_obstruction = isset($data['entrance_exit_free_from_obstruction']) ? $user->protectData($data['entrance_exit_free_from_obstruction']) :'';
        $action_32  = isset($data['action_32']) ? $user->protectData($data['action_32']) :'';
        $entrance_area_in_good_condition = isset($data['entrance_area_in_good_condition']) ? $user->protectData($data['entrance_area_in_good_condition']) :'';
        $action_33  = isset($data['action_33']) ? $user->protectData($data['action_33']) :'';
        $cctv_in_good_working_condition = isset($data['cctv_in_good_working_condition']) ? $user->protectData($data['cctv_in_good_working_condition']) :'';
        $action_34= isset($data['action_34']) ? $user->protectData($data['action_34']) :'';
        $box_location_1  = isset($data['box_location_1']) ? $user->protectData($data['box_location_1']) :'';
        $action_35  = isset($data['action_35']) ? $user->protectData($data['action_35']) :'';
        $no_of_guidance_leaflet_1  = isset($data['no_of_guidance_leaflet_1']) ? $user->protectData($data['no_of_guidance_leaflet_1']) :'';
        $action_36  = isset($data['action_36']) ? $user->protectData($data['action_36']) :'';
        $no_of_adhesive_dressings_1  = isset($data['no_of_adhesive_dressings_1']) ? $user->protectData($data['no_of_adhesive_dressings_1']) :'';
        $action_37  = isset($data['action_37']) ? $user->protectData($data['action_37']) :'';
        $no_of_adhesive_pads_with_bandage_1 = isset($data['no_of_adhesive_pads_with_bandage_1']) ? $user->protectData($data['no_of_adhesive_pads_with_bandage_1']) :'';
        $action_38 = isset($data['action_38']) ? $user->protectData($data['action_38']) :'';
        $no_of_wrapped_triangular_bandage_1 = isset($data['no_of_wrapped_triangular_bandage_1']) ? $user->protectData($data['no_of_wrapped_triangular_bandage_1']) :'';
        $action_39  = isset($data['action_39']) ? $user->protectData($data['action_39']) :'';
        $no_of_medium_dressings_1 = isset($data['no_of_medium_dressings_1']) ? $user->protectData($data['no_of_medium_dressings_1']) :'';
        $action_40 = isset($data['action_40']) ? $user->protectData($data['action_40']) :'';
        $no_of_large_dressings_1 = isset($data['no_of_large_dressings_1']) ? $user->protectData($data['no_of_large_dressings_1']) :'';
        $action_41  = isset($data['action_41']) ? $user->protectData($data['action_41']) :'';
        $no_of_safety_pins_1 = isset($data['no_of_safety_pins_1']) ? $user->protectData($data['no_of_safety_pins_1']) :'';
        $action_42  = isset($data['action_42']) ? $user->protectData($data['action_42']) :'';
        $box_location_2 = isset($data['box_location_2']) ? $user->protectData($data['box_location_2']) :'';
        $no_of_guidance_leaflet_2 = isset($data['no_of_guidance_leaflet_2']) ? $user->protectData($data['no_of_guidance_leaflet_2']) :'';
        $action_43 = isset($data['action_43']) ? $user->protectData($data['action_43']) :'';
        $no_of_adhesive_dressings_2 = isset($data['no_of_adhesive_dressings_2']) ? $user->protectData($data['no_of_adhesive_dressings_2']) :'';
        $action_44  = isset($data['action_44']) ? $user->protectData($data['action_44']) :'';
        $no_of_adhesive_pads_with_bandage_2 = isset($data['no_of_adhesive_pads_with_bandage_2']) ? $user->protectData($data['no_of_adhesive_pads_with_bandage_2']) :'';
        $action_45  = isset($data['action_45']) ? $user->protectData($data['action_45']) :'';
        $no_of_wrapped_triangular_bandage_2 = isset($data['no_of_wrapped_triangular_bandage_2']) ? $user->protectData($data['no_of_wrapped_triangular_bandage_2']) :'';
        $action_46  = isset($data['action_46']) ? $user->protectData($data['action_46']) :'';
        $no_of_medium_dressings_2 = isset($data['no_of_medium_dressings_2']) ? $user->protectData($data['no_of_medium_dressings_2']) :'';
        $action_47 = isset($data['action_47']) ? $user->protectData($data['action_47']) :'';
        $no_of_large_dressings_2 = isset($data['no_of_large_dressings_2']) ? $user->protectData($data['no_of_large_dressings_2']) :'';
        $action_48  = isset($data['action_48']) ? $user->protectData($data['action_48']) :'';
        $no_of_safety_pins_2 = isset($data['no_of_safety_pins_2']) ? $user->protectData($data['no_of_safety_pins_2']) :'';
        $action_49  = isset($data['action_49']) ? $user->protectData($data['action_49']) :'';
        $no_of_moisture_cleaning_wipes = isset($data['no_of_moisture_cleaning_wipes']) ? $user->protectData($data['no_of_moisture_cleaning_wipes']) :'';
        $action_50 = isset($data['action_50']) ? $user->protectData($data['action_50']) :'';


        if($action_1 !=''){
            $sample_water_temperature_test = json_encode(['sample_water_temperature_test'=>$sample_water_temperature_test, 'action_1'=>$action_1]);
        }elseif($action_2 !=''){
            $no_smoking_sign_displayed = json_encode(['no_smoking_sign_displayed'=>$no_smoking_sign_displayed, 'action_2'=>$action_2]);
        }elseif($action_3 !=''){
            $furniture_complaints_updated_closed= json_encode(['furniture_complaints_updated_closed'=>$furniture_complaints_updated_closed, 'action_3'=>$action_3]);
        }elseif($action_4 !=''){
            $completed_repairs_updated_closed  = json_encode(['completed_repairs_updated_closed'=>$completed_repairs_updated_closed, 'action_4'=>$action_4]);
        }elseif($action_5 !=''){
            $add_decoration_to_maintainance = json_encode(['add_decoration_to_maintainance'=>$add_decoration_to_maintainance, 'action_5'=>$action_5]);
        }elseif($action_6 !=''){
            $portal_appliances_tested_accurately = json_encode(['portal_appliances_tested_accurately'=>$portal_appliances_tested_accurately, 'action_6'=>$action_6]);
        }elseif($action_7 !=''){
            $kitchen_is_clean_tidy = json_encode(['kitchen_is_clean_tidy'=>$kitchen_is_clean_tidy, 'action_7'=>$action_7]);
        }elseif($action_8 !=''){
            $cooker_extractor_in_good_condition = json_encode(['cooker_extractor_in_good_condition'=>$cooker_extractor_in_good_condition, 'action_8'=>$action_8]);
        }elseif($action_9 !=''){
            $fridge_and_freezers_are_working = json_encode(['fridge_and_freezers_are_working'=>$fridge_and_freezers_are_working, 'action_9'=>$action_9]);
        }elseif($action_10 !=''){
            $staff_have_sufficient_space = json_encode(['staff_have_sufficient_space'=>$staff_have_sufficient_space, 'action_10'=>$action_10]);
        }elseif($action_11 !=''){
            $bins_are_emptied_regularly = json_encode(['bins_are_emptied_regularly'=>$bins_are_emptied_regularly, 'action_11'=>$action_11]);
        }elseif($action_12 !=''){
            $desk_work_area_suitable = json_encode(['desk_work_area_suitable'=>$desk_work_area_suitable, 'action_12'=>$action_12]);
        }elseif($action_13 !=''){
            $seat_lower_back_support = json_encode(['seat_lower_back_support'=>$seat_lower_back_support, 'action_13'=>$action_13]);
        }elseif($action_14 !=''){
            $rooms_are_adequately_ventilated = json_encode(['rooms_are_adequately_ventilated'=>$rooms_are_adequately_ventilated, 'action_14'=>$action_14]);
        }elseif($action_15 !=''){
            $photocopier_printer_in_good_condition = json_encode(['photocopier_printer_in_good_condition'=>$photocopier_printer_in_good_condition, 'action_15'=>$action_15]);
        }elseif($action_16 !=''){
            $unused_water_outlet_flushed = json_encode(['unused_water_outlet_flushed'=>$unused_water_outlet_flushed, 'action_16'=>$action_16]);
        }elseif($action_17 !=''){
            $showerheads_in_good_conditions = json_encode(['showerheads_in_good_conditions'=>$showerheads_in_good_conditions, 'action_17'=>$action_17]);
        }elseif($action_18 !=''){
            $provision_disposal_of_sanitary_towels = json_encode(['provision_disposal_of_sanitary_towels'=>$provision_disposal_of_sanitary_towels, 'action_18'=>$action_18]);
        }elseif($action_19 !=''){
            $cable_coverings_in_good_conditions = json_encode(['cable_coverings_in_good_conditions'=>$cable_coverings_in_good_conditions, 'action_19'=>$action_19]);
        }elseif($action_20 !=''){
            $electrical_equipment_in_good_condition = json_encode(['lectrical_equipment_in_good_condition'=>$lectrical_equipment_in_good_condition, 'action_20'=>$action_20]);
        }elseif($action_21 !=''){
            $electrical_sockets_in_good_condition = json_encode(['electrical_sockets_in_good_condition'=>$electrical_sockets_in_good_condition, 'action_21'=>$action_21]);
        }elseif($action_22 !=''){
            $power_socket_not_overloaded = json_encode(['power_socket_not_overloaded'=>$power_socket_not_overloaded, 'action_22'=>$action_22]);
        }elseif($action_23 !=''){
            $working_environment_satisfactory = json_encode(['working_environment_satisfactory'=>$working_environment_satisfactory, 'action_23'=>$action_23]);
        }elseif($action_24 !=''){
            $chairs_in_good_condition_adjustable = json_encode(['chairs_in_good_condition_adjustable'=>$chairs_in_good_condition_adjustable, 'action_24'=>$action_24]);
        }elseif($action_25 !=''){
            $coshh_cupboards_signed_locked = json_encode(['coshh_cupboards_signed_locked'=>$coshh_cupboards_signed_locked, 'action_25'=>$action_25]);
        }elseif($action_26 !=''){
            $first_notice_and_posters = json_encode(['first_notice_and_posters'=>$first_notice_and_posters, 'action_26'=>$action_26]);
        }elseif($action_27 !=''){
            $first_exit_and_other_signs_in_place = json_encode(['first_exit_and_other_signs_in_place'=>$first_exit_and_other_signs_in_place, 'action_27'=>$action_27]);
        }elseif($action_28 !=''){
            $first_aid_arrangement_posters = json_encode(['first_aid_arrangement_posters'=>$first_aid_arrangement_posters, 'action_28'=>$action_28]);
        }elseif($action_29 !=''){
            $employers_insurance_liability_shown = json_encode(['employers_insurance_liability_shown'=>$employers_insurance_liability_shown, 'action_29'=>$action_29]);
        }elseif($action_30 !=''){
            $health_safety_law_poster_shown = json_encode(['health_safety_law_poster_shown'=>$health_safety_law_poster_shown, 'action_30'=>$action_30]);
        }elseif($action_31 !=''){
            $items_are_safely_stored = json_encode(['items_are_safely_stored'=>$items_are_safely_stored, 'action_31'=>$action_31]);
        }elseif($action_32 !=''){
            $entrance_exit_free_from_obstruction = json_encode(['entrance_exit_free_from_obstruction'=>$entrance_exit_free_from_obstruction, 'action_32'=>$action_32]);
        }elseif($action_33 !=''){
            $entrance_area_in_good_condition = json_encode(['entrance_area_in_good_condition'=>$entrance_area_in_good_condition, 'action_33'=>$action_33]);
        }elseif($action_34 !=''){
            $cctv_in_good_working_condtion = json_encode(['cctv_in_good_working_condtion'=>$cctv_in_good_working_condtion, 'action_34'=>$action_34]);
        }elseif($action_35 !=''){
            $box_location_1 = json_encode(['box_location_1'=>$box_location_1, 'action_35'=>$action_35]);
        }elseif($action_36 !=''){
            $no_of_guidance_leaflet_1 = json_encode(['no_of_guidance_leaflet_1'=>$no_of_guidance_leaflet_1, 'action_36'=>$action_36]);
        }elseif($action_37 !=''){
            $no_of_adhesive_dressings_1 = json_encode(['no_of_adhesive_dressings_1'=>$no_of_adhesive_dressings_1, 'action_37'=>$action_37]);
        }elseif($action_38 !=''){
            $no_of_adhesive_pads_with_bandage_1 = json_encode(['no_of_adhesive_pads_with_bandage_1'=>$no_of_adhesive_pads_with_bandage_1, 'action_38'=>$action_38]);
        }elseif($action_39 !=''){
            $no_of_wrapped_triangular_bandage_1 = json_encode(['no_of_wrapped_triangular_bandage_1'=>$no_of_wrapped_triangular_bandage_1, 'action_39'=>$action_39]);
        }elseif($action_40 !=''){
            $no_of_medium_dressings_1 = json_encode(['no_of_medium_dressings_1'=>$no_of_medium_dressings_1, 'action_40'=>$action_40]);
        }elseif($action_41 !=''){
            $no_of_large_dressings_1 = json_encode(['no_of_large_dressings_1'=>$no_of_large_dressings_1, 'action_41'=>$action_41]);
        }elseif($action_42 !=''){
            $no_of_safety_pins_1 = json_encode(['no_of_safety_pins_1'=>$no_of_safety_pins_1, 'action_42'=>$action_42]);
        }elseif($action_43 !=''){
            $no_of_guidance_leaflet_2 = json_encode(['no_of_adhesive_dressings_2'=>$no_of_adhesive_dressings_2, 'action_43'=>$action_43]);
        }elseif($action_44 !=''){
            $no_of_adhesive_dressings_2 = json_encode(['no_of_adhesive_dressings_2'=>$no_of_adhesive_dressings_2, 'action_44'=>$action_44]);
        }elseif($action_45 !=''){
            $no_of_adhesive_pads_with_bandage_2 = json_encode(['no_of_adhesive_pads_with_bandage_2'=>$no_of_adhesive_pads_with_bandage_2, 'action_45'=>$action_45]);
        }elseif($action_46 !=''){
            $no_of_wrapped_triangular_bandage_2 = json_encode(['no_of_wrapped_triangular_bandage_2'=>$no_of_wrapped_triangular_bandage_2, 'action_46'=>$action_46]);
        }elseif($action_47 !=''){
            $bathroom_clean_and_working = json_encode(['bathroom_clean_and_working'=>$bathroom_clean_and_working, 'action_47'=>$action_47]);
        }elseif($action_48 !=''){
            $no_of_large_dressings_2 = json_encode(['no_of_large_dressings_2'=>$no_of_large_dressings_2, 'action_48'=>$action_48]);
        }elseif($action_49 !=''){
            $no_of_safety_pins_2 = json_encode(['no_of_safety_pins_2'=>$no_of_safety_pins_2, 'action_49'=>$action_49]);
        }elseif($action_50 !=''){
            $no_of_moisture_cleaning_wipes = json_encode(['no_of_moisture_cleaning_wipes'=>$no_of_moisture_cleaning_wipes, 'action_50'=>$action_50]);
        }



        $user = new User();
        $response = $user->post_service_check_monthly_report(
            $door_seals_and_self_closing_devices,
            $internal_self_closing_firedoors,
            $emergency_lightning_function,
            $evidence_of_used_battery_charger,
            $washing_machine_filter_cleaned,
            $water_dispenser_drip_trays_cleaned,
            $auto_hold_open_freeswing_doors_fitted,
            $sample_water_temperature_test,
            $no_smoking_sign_displayed,
            $furniture_complaints_updated_closed,
            $completed_repairs_updated_closed,
            $add_decoration_to_maintainance,
            $portal_appliances_tested_accurately,
            $kitchen_is_clean_tidy,
            $cooker_extractor_in_good_condition,
            $fridge_and_freezers_are_working,
            $staff_have_sufficient_space,
            $bins_are_emptied_regularly,
            $desk_work_area_suitable,
            $seat_lower_back_support,
            $rooms_are_adequately_ventilated,
            $photocopier_printer_in_good_condition,
            $unused_water_outlet_flushed,
            $showerheads_in_good_conditions,
            $provision_disposal_of_sanitary_towels,
            $cable_coverings_in_good_conditions,
            $electrical_equipment_in_good_condition,
            $electrical_sockets_in_good_condition,
            $power_socket_not_overloaded,
            $working_environment_satisfactory,
            $chairs_in_good_condition_adjustable,
            $coshh_cupboards_signed_locked,
            $first_notice_and_posters,
            $first_exit_and_other_signs_in_place,
            $first_aid_arrangement_posters,
            $employers_insurance_liability_shown,
            $health_safety_law_poster_shown,
            $items_are_safely_stored,
            $entrance_exit_free_from_obstruction,
            $entrance_area_in_good_condition,
            $cctv_in_good_working_condition,
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