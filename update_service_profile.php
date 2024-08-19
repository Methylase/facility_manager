<?php
require_once 'RoleMiddleware.php';

$response = RoleMiddleware::checkRole(['admin']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $service_code = $user->protectData($data['service_code']);
        $service = $user->protectData($data['service']);
        $ress= $user->protectData($data['ress']);
        $phone_number= $user->protectData($data['phone_number']);
        $landline= $user->protectData($data['landline']);
        $emergency_number= $user->protectData($data['emergency_number']);
        $service_type= $user->protectData($data['service_type']);
        $number_of_beds= $user->protectData($data['number_of_beds']);
        $specialization= $user->protectData($data['specialization']) ;
        $service_manager= $user->protectData($data['service_manager']);
        $deputy_manager= $user->protectData($data['deputy_manager']);
        $on_call_1= $user->protectData($data['on_call_1']);
        $on_call_2= $user->protectData($data['on_call_2']);
        $gender= $user->protectData($data['gender']);
        $age_range= $user->protectData($data['age_range']);
        $duration_of_stay= $user->protectData($data['duration_of_stay']);
        $lone_working= $user->protectData($data['lone_working']);
        $challenging_behavior= $user->protectData($data['challenging_behavior']);
        $personal_care_support= $user->protectData($data['personal_care_support']);
        $physical_challenge = $user->protectData($data['physical_challenge']);
        $sleep_in_bed= $user->protectData($data['sleep_in_bed']);
        $parking= $user->protectData($data['parking']);
        $pets= $user->protectData($data['pets']);
        $unpaid_breaks= $user->protectData($data['unpaid_breaks']);
        $created_by= $user->protectData($data['created_by']);
        $id =isset($data['id']) ? protectData($data['id']):'';


        if (empty($service_code)) {
            echo json_encode([ 'error_name'=>'service_code', 'message' => 'Service code is required']);
        }elseif(empty($service)){
            echo json_encode([ 'error_name'=>'service', 'message' => 'Service is required']);
        }elseif(empty($ress)){
            echo json_encode([ 'error_name'=>'ress', 'message' => 'ress is required']);
        }elseif(empty($phone_number)){
            echo json_encode([ 'error_name'=>'phone_number', 'message' => 'Phone number is required']);
        }elseif(empty($landline)){
            echo json_encode([ 'error_name'=>'landline', 'message' => 'Landline is required']);
        }elseif(empty($emergency_number)){
            echo json_encode([ 'error_name'=>'emergency_number', 'message' => 'Landline is required']);
        }elseif(empty($service_type)){
            echo json_encode([ 'error_name'=>'service_type', 'message' => 'Service type is required']);
        }elseif(empty($number_of_beds)){
            echo json_encode([ 'error_name'=>'number_of_beds', 'message' => 'Number of beds are required']);
        }elseif(empty($specialization)){
            echo json_encode([ 'error_name'=>'specialization', 'message' => 'Specialization is required']);
        }elseif(empty($service_manager)){
            echo json_encode([ 'error_name'=>'service_manager', 'message' => 'Service manager is required']);
        }elseif(empty($deputy_manager)){
            echo json_encode([ 'error_name'=>'deputy_manager', 'message' => 'Deputy manager is required']);
        }elseif(empty($on_call_1)){
            echo json_encode([ 'error_name'=>'on_call_1', 'message' => 'On call 1 is required']);
        }elseif(empty($on_call_2)){
            echo json_encode([ 'error_name'=>'on_call_2', 'message' => 'on_call 2 is required']);
        }elseif(empty($gender)){
            echo json_encode([ 'error_name'=>'gender', 'message' => 'Gender is required']);
        }elseif(empty($age_range)){
            echo json_encode([ 'error_name'=>'age_range', 'message' => 'Age range is required']);
        }elseif(empty($duration_of_stay)){
            echo json_encode([ 'error_name'=>'duration_of_stay', 'message' => 'Duration of stay is required']);
        }elseif(empty($lone_working)){
            echo json_encode([ 'error_name'=>'lone_working', 'message' => 'Lone working is required']);
        }elseif(empty($challenging_behavior)){
            echo json_encode([ 'error_name'=>'challenging_behavior', 'message' => 'Challenging behavior is required']);
        }elseif(empty($personal_care_support)){
            echo json_encode([ 'error_name'=>'personal_care_support', 'message' => 'Personal care support is required']);
        }elseif(empty($physical_challenge)){
            echo json_encode([ 'error_name'=>'physical_challenge', 'message' => 'Physical challenge is required']);
        }elseif(empty($sleep_in_bed)){
            echo json_encode([ 'error_name'=>'sleep_in_bed', 'message' => 'Sleep in bed is required']);
        }elseif(empty($parking)){
            echo json_encode([ 'error_name'=>'parking', 'message' => 'Parking is required']);
        }elseif(empty($pets)){
            echo json_encode([ 'error_name'=>'pets', 'message' => 'Pets is required']);
        }elseif(empty($unpaid_breaks)){
            echo json_encode([ 'error_name'=>'unpaid_breaks', 'message' => 'Unpaid breaks is required']);
        }elseif(empty($created_by)){
            echo json_encode([ 'error_name'=>'created_by', 'message' => 'Created by is required']);
        }elseif($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'You don\'t have permission to carry out this update']);
        }else{

            
                $user = new User();
                $response = $user->update_service_profile(
                $service_code,
                $service,
                $ress,
                $phone_number,
                $landline,
                $emergency_number,
                $service_type,
                $number_of_beds,
                $specialization,
                $service_manager,
                $deputy_manager,
                $on_call_1,
                $on_call_2,
                $gender,
                $age_range,
                $duration_of_stay,
                $lone_working,
                $challenging_behavior,
                $personal_care_support,
                $physical_challenge,
                $sleep_in_bed,
                $parking,
                $pets,
                $unpaid_breaks,
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