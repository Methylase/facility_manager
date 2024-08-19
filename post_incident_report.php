<?php
require_once 'RoleMiddleware.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $police_involve = isset($data['police_involve']) ? $user->protectData($data['police_involve']):'';
        $fire_brigade_involved = isset($data['fire_brigade_involved']) ? $user->protectData($data['fire_brigade_involved']) :'';
        $ambulance_involved = isset($data['ambulance_involved']) ? $user->protectData($data['ambulance_involved']) : '';
        $details_of_emergency_survive_involved = isset($data['details_of_emergency_survive_involved']) ? $user->protectData($data['details_of_emergency_survive_involved']) :'';
        $involved_external_person = isset($data['involved_external_person']) ? $user->protectData($data['involved_external_person']) :'';
        $names_of_external_person = isset($data['names_of_external_person']) ? $user->protectData($data['names_of_external_person']) : '';
        $social_service_involved = isset($data['social_service_involved']) ? $user->protectData($data['social_service_involved']) : '';
        $cmht_involved = isset($data['cmht_involved']) ? $user->protectData($data['cmht_involved']) : '';
        $other_external_services_involved = isset($data['other_external_services_involved']) ? $user->protectData($data['other_external_services_involved']) : '';
        $names_of_other_external_services_involved = isset($data['names_of_other_external_services_involved']) ?  $user->protectData($data['names_of_other_external_services_involved']) : '';
        $date_of_incident = isset($data['date_of_incident']) ? $user->protectData($data['date_of_incident']) : '';
        $time_of_incident = isset($data['time_of_incident']) ? $user->protectData($data['time_of_incident']) : '';
        $is_this_serious_incident = isset($data['is_this_serious_incident']) ? $user->protectData($data['is_this_serious_incident']) : '';
        $your_cause_of_concern_about_yp_yps_child = isset($data['your_cause_of_concern_about_yp_yps_child'])? $user->protectData($data['your_cause_of_concern_about_yp_yps_child']) : '' ;
        $what_is_the_sub_category_of_your_cause_of_concern = isset($data['what_is_the_sub_category_of_your_cause_of_concern']) ? $user->protectData($data['your_cause_of_concern_about_yp_yps_child']) : '';
        $want_to_monitor_concern = isset($data['want_to_monitor_concern']) ? $user->protectData($data['want_to_monitor_concern']) : '';
        $is_yp_in_significant_harm = isset($data['is_yp_in_significant_harm']) ? $user->protectData($data['is_yp_in_significant_harm']) : '';
        $do_you_want_to_take_further_action = isset($data['do_you_want_to_take_further_action']) ? $user->protectData($data['do_you_want_to_take_further_action']) : '';
        $is_yp_aware_that_you_will_contact_external_agencies = isset($data['is_yp_aware_that_you_will_contact_external_agencies']) ? $user->protectData($data['is_yp_aware_that_you_will_contact_external_agencies']) : '';
        $if_no_enter_brief_outline_otherwise_write_n_a = isset($data['if_no_enter_brief_outline_otherwise_write_n_a']) ? $user->protectData($data['if_no_enter_brief_outline_otherwise_write_n_a']) : '';
        $allegations_suspension_of_substance_abuse = isset($data['allegations_suspension_of_substance_abuse']) ? $user->protectData($data['allegations_suspension_of_substance_abuse']) : '';
        $witness_es_statements_need_to_be_taken_down = isset($data['witness_es_statements_need_to_be_taken_down']) ? $user->protectData($data['witness_es_statements_need_to_be_taken_down']) : '';
        $has_a_manager_been_informed = isset($data['has_a_manager_been_informed']) ? $user->protectData($data['has_a_manager_been_informed']) : '';
        $has_a_marac_referral_been_made = isset($data['has_a_marac_referral_been_made']) ? $user->protectData($data['has_a_marac_referral_been_made']) : '';
        $i_a_of_marac_refferal = isset($data['i_a_of_marac_refferal']) ? $user->protectData($data['i_a_of_marac_refferal']) : '';
        $created_by = isset($data['created_by']) ? $user->protectData($data['created_by']) : '';
        $last_modified = isset($data['last_modified']) ?  $user->protectData($data['last_modified']) : '';
        $start_date = isset($data['start_date']) ? $user->protectData($data['start_date']) : '';
        $start_time = isset($data['start_time']) ? $user->protectData($data['start_time']) : '';
        $end_date = isset($data['end_date']) ? $user->protectData($data['end_date']) : '';
        $end_time = isset($data['end_time']) ? $user->protectData($data['end_time']) : '';
        $session = isset($data['session']) ? $user->protectData($data['session']) : '';
        $communication_method = isset($data['communication_method']) ? $user->protectData($data['communication_method']) : '';
        $venue_of_session = isset($data['venue_of_session']) ? $user->protectData($data['venue_of_session']) : '';
        $notes = isset($data['notes']) ? $user->protectData($data['notes']) : '';

        
        $response = $user->post_incident_report(
            $police_involve,
            $fire_brigade_involved,
            $ambulance_involved,
            $details_of_emergency_survive_involved,
            $involved_external_person,
            $names_of_external_person,
            $social_service_involved,
            $cmht_involved,
            $other_external_services_involved,
            $names_of_other_external_services_involved,
            $date_of_incident,
            $time_of_incident,
            $is_this_serious_incident,
            $your_cause_of_concern_about_yp_yps_child,
            $what_is_the_sub_category_of_your_cause_of_concern,
            $want_to_monitor_concern,
            $is_yp_in_significant_harm,
            $do_you_want_to_take_further_action,
            $is_yp_aware_that_you_will_contact_external_agencies,
            $if_no_enter_brief_outline_otherwise_write_n_a,
            $allegations_suspension_of_substance_abuse,
            $witness_es_statements_need_to_be_taken_down,
            $has_a_manager_been_informed,
            $has_a_marac_referral_been_made,
            $i_a_of_marac_refferal,
            $created_by,
            $last_modified,
            $start_date,
            $start_time,
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