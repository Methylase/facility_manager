<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $contact_type = $user->protectData($data['contact_type']);
        $phone_number= $user->protectData($data['phone_number']);
        $email = $user->protectData($data['email']);
        $mailing_ress= $user->protectData($data['mailing_ress']);
        $country= $user->protectData($data['country']);
        $city= $user->protectData($data['city']);
        $postal_code= $user->protectData($data['postal_code']);
        $contact_emergency= $user->protectData($data['contact_emergency']);
        $nationality= $user->protectData($data['nationality']);
        $first_language= $user->protectData($data['first_language']);
        $immigration_status= $user->protectData($data['immigration_status']);
        $immigration_doc_held= $user->protectData($data['immigration_doc_held']);
        $last_entry_date= $user->protectData($data['last_entry_date']);
        $care_level= $user->protectData($data['care_level']);
        $training= $user->protectData($data['training']);
        $education= $user->protectData($data['education']);
        $hobbies= protectData($data['hobbies']);
        $reasons_not_edu_training= $user->protectData($data['reasons_not_edu_training']);
        $occupation= $user->protectData($data['occupation']);
        $length_of_unemployment= $user->protectData($data['length_of_unemployment']);
        $height= $user->protectData($data['height']);
        $eye_color= $user->protectData($data['eye_color']);
        $hair_color_n_style= $user->protectData($data['hair_color_n_style']);
        $distinguishing_feature= $user->protectData($data['distinguishing_feature']);
        $cloth_usually_worn= $user->protectData($data['cloth_usually_worn']);
        $death= $user->protectData($data['death']);
        $plan_name= $user->protectData($data['plan_name']);
        $service_name = $user->protectData($data['service_name']);
        $accessment_date= $user->protectData($data['accessment_date']);
        $next_accessment_date= $user->protectData($data['next_accessment_date']);
        $any_historic_details= $user->protectData($data['any_historic_details']);
        $date= $user->protectData($data['date']);
        $end_date= $user->protectData($data['end_date']);
        $category= $user->protectData($data['category']);
        $concerns_mornitoring = $user->protectData($data['concerns_mornitoring']);
        $take_further_actions= $user->protectData($data['take_further_actions']);
        $notes= $user->protectData($data['notes']);
        $created_by= $user->protectData($data['created_by']);
        $id =isset($data['id']) ? $user->protectData($data['id']) :'';

        if (empty($contact_type)) {
            echo json_encode([ 'error_name'=>'contact_type', 'message' => 'Contact type is required']);
        }elseif(empty($phone_number)){
            echo json_encode([ 'error_name'=>'phone_number', 'message' => 'Phone number is required']);
        }elseif(empty($email)){
            echo json_encode([ 'error_name'=>'email', 'message' => 'Email is required']);
        }elseif(empty($mailing_ress)){
            echo json_encode([ 'error_name'=>'mailing_ress', 'message' => 'Mailing ressis required']);
        }elseif(empty($country)){
            echo json_encode([ 'error_name'=>'country', 'message' => 'Country is required']);
        }elseif(empty($city)){
            echo json_encode([ 'error_name'=>'city', 'message' => 'City is required']);
        }elseif(empty($postal_code)){
            echo json_encode([ 'error_name'=>'postal_code', 'message' => 'Postal code is required']);
        }elseif(empty($contact_emergency)){
            echo json_encode([ 'error_name'=>'contact_emergency', 'message' => 'Contact emergency is required']);
        }elseif(empty($nationality)){
            echo json_encode([ 'error_name'=>'nationality', 'message' => 'Nationality is required']);
        }elseif(empty($first_language)){
            echo json_encode([ 'error_name'=>'first_language', 'message' => 'First language is required']);
        }elseif(empty($immigration_status)){
            echo json_encode([ 'error_name'=>'immigration_status', 'message' => 'Immigration status is required']);
        }elseif(empty($immigration_doc_held)){
            echo json_encode([ 'error_name'=>'immigration_doc_held', 'message' => 'Immigration document held is required']);
        }elseif(empty($last_entry_date)){
            echo json_encode([ 'error_name'=>'last_entry_date', 'message' => 'Last entry date is required']);
        }elseif(empty($care_level)){
            echo json_encode([ 'error_name'=>'care_level', 'message' => 'Care level is required']);
        }elseif(empty($training)){
            echo json_encode([ 'error_name'=>'training', 'message' => 'Training is required']);
        }elseif(empty($education)){
            echo json_encode([ 'error_name'=>'education', 'message' => 'Education is required']);
        }elseif(empty($hobbies)){
            echo json_encode([ 'error_name'=>'hobbies', 'message' => 'Hobbies are required']);
        }elseif(empty($reasons_not_edu_training)){
            echo json_encode([ 'error_name'=>'reasons_not_edu_training', 'message' => 'Reasons not in for education and training is required']);
        }elseif(empty($occupation)){
            echo json_encode([ 'error_name'=>'occupation', 'message' => 'Occupation is required']);
        }elseif(empty($length_of_unemployment)){
            echo json_encode([ 'error_name'=>'length_of_unemployment', 'message' => 'length of unemployment is required']);
        }elseif(empty($height)){
            echo json_encode([ 'error_name'=>'height', 'message' => 'Height  is required']);
        }elseif(empty($eye_color)){
            echo json_encode([ 'error_name'=>'eye_color', 'message' => 'Eye color is required']);
        }elseif(empty($hair_color_n_style)){
            echo json_encode([ 'error_name'=>'hair_color_n_style', 'message' => 'Hair color and style is required']);
        }elseif(empty($distinguishing_feature)){
            echo json_encode([ 'error_name'=>'distinguishing_feature', 'message' => 'Distinguishing feature is required']);
        }elseif(empty($cloth_usually_worn)){
            echo json_encode([ 'error_name'=>'cloth_usually_worn', 'message' => 'Cloth usually worn is required']);
        }elseif(empty($death)){
            echo json_encode([ 'error_name'=>'death', 'message' => 'Death is required']);
        }elseif(empty($plan_name)){
            echo json_encode([ 'error_name'=>'plan_name', 'message' => 'Plan name is required']);
        }elseif(empty($service_name)){
            echo json_encode([ 'error_name'=>'service_name', 'message' => 'Service name is required']);
        }elseif(empty($accessment_date)){
            echo json_encode([ 'error_name'=>'accessment_date', 'message' => 'Accessment date is required']);
        }elseif(empty($next_accessment_date)){
            echo json_encode([ 'error_name'=>'next_accessment_date', 'message' => 'Next accessment date is required']);
        }elseif(empty($any_historic_details)){
            echo json_encode([ 'error_name'=>'any_historic_details', 'message' => 'Any historic details is required']);
        }elseif(empty($date)){
            echo json_encode([ 'error_name'=>'date', 'message' => 'Date is required']);
        }elseif(empty($end_date)){
            echo json_encode([ 'error_name'=>'end_date', 'message' => 'End date is required']);
        }elseif(empty($category)){
            echo json_encode([ 'error_name'=>'category', 'message' => 'Category is required']);
        }elseif(empty($concerns_mornitoring)){
            echo json_encode([ 'error_name'=>'concerns_mornitoring', 'message' => 'Concerns mornitoring is required']);
        }elseif(empty($take_further_actions)){
            echo json_encode([ 'error_name'=>'take_further_actions', 'message' => 'Take further actions is required']);
        }elseif(empty($notes)){
            echo json_encode([ 'error_name'=>'notes', 'message' => 'Notes is required']);
        }elseif(empty($created_by)){
            echo json_encode([ 'error_name'=>'created_by', 'message' => 'Created by is required']);
        }elseif($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'You don\'t have permission to carry out this update']);
        }else{

            $response = $user->update_young_people_profile(
                $contact_type,
                $phone_number,
                $email,
                $mailing_ress,
                $country,
                $city,
                $postal_code,
                $contact_emergency,
                $nationality,
                $first_language,
                $immigration_status,
                $immigration_doc_held,
                $last_entry_date,
                $care_level,
                $training,
                $education,
                $hobbies,
                $reasons_not_edu_training,
                $occupation,
                $length_of_unemployment,
                $height,
                $eye_color,
                $hair_color_n_style,
                $distinguishing_feature,
                $cloth_usually_worn,
                $death,
                $plan_name,
                $service_name,
                $accessment_date,
                $next_accessment_date,
                $any_historic_details,
                $date,
                $end_date,
                $category,
                $concerns_mornitoring,
                $take_further_actions,
                $notes,
                $created_by,
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