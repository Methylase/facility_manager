<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['admin']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $firstname = $user->protectData($data['firstname']);
        $lastname = $user->protectData($data['lastname']);
        $email = $user->protectData($data['email']);
        $phone_number = $user->protectData($data['phone_number']);
        $ress = $user->protectData($data['ress']);
        $profile_image = $user->protectData($data['profile_image']);
        $created_by = $user->protectData($data['created_by']);
        $id =isset($data['id']) ? $user->protectData($data['id']) :'';

        if(empty($firstname)){
            echo json_encode([ 'error_name'=>'firstname', 'message' => 'Firstname is required']);
        }elseif(empty($lastname)){
            echo json_encode([ 'error_name'=>'lastname', 'message' => 'Lastname is required']);
        }elseif(empty($ress)){
            echo json_encode([ 'error_name'=>'ress', 'message' => 'ress is required']);
        }elseif(empty($phone_number)){
            echo json_encode([ 'error_name'=>'phone_number', 'message' => 'Phone number is required']);
        }elseif(empty($email)){
            echo json_encode([ 'error_name'=>'email', 'message' => 'Email is required']);
        }elseif(empty($created_by)){
            echo json_encode([ 'error_name'=>'created_by', 'message' => 'Created by is required']);
        }elseif($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'You don\'t have permission to carry out this update']);
        }else{

            $response = $user->update_service_worker_profile(
                $firstname,
                $lastname,
                $email,
                $phone_number,
                $ress,
                $profile_image,
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