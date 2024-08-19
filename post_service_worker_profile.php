<?php

require_once 'User.php';
require_once 'RoleMiddleware.php';

$response = RoleMiddleware::checkRole(['admin']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $username = $user->protectData($data['username']);
        $password = $user->protectData($data['password']);
        $firstname = $user->protectData($data['firstname']);
        $lastname = $user->protectData($data['lastname']);
        $email = $user->protectData($data['email']);
        $phone_number = $user->protectData($data['phone_number']);
        $ress = $user->protectData($data['ress']);
        $profile_image = $user->protectData($data['profile_image']);
        $created_by = $user->protectData($data['created_by']);
        $role = 'user'; 

        if (empty($username)) {
            echo json_encode([ 'error_name'=>'username', 'message' => 'Username is required']);
        }elseif(empty($password )){
            echo json_encode([ 'error_name'=>'password', 'message' => 'Password  is required']);
        }elseif(empty($firstname)){
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
        }

        $response = $user->post_service_worker_profile(
            $username, 
            $password, 
            $role,
            $firstname,
            $lastname,
            $email,
            $phone_number,
            $ress,
            $profile_image,
            $created_by,
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