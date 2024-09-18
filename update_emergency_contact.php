<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        $first_name = isset($data['first_name']) ? $user->protectData($data['first_name']):'';
        $last_name = isset($data['last_name']) ? $user->protectData($data['last_name']):'';
        $other_relationship_to_yp = isset($data['other_relationship_to_yp']) ? $user->protectData($data['other_relationship_to_yp']):'';
        $main_contact_number = isset($data['main_contact_number']) ? $user->protectData($data['main_contact_number']):'';
        $secondary_contact_number = isset($data['secondary_contact_number']) ? $user->protectData($data['secondary_contact_number']):'';
        $email =  isset($data['email']) ? $user->protectData($data['email']):'';
        $address = isset($data['address']) ? $user->protectData($data['address']):'';
        $country_territory = isset($data['country_territory']) ? $user->protectData($data['country_territory']):'';
        $state = isset($data['state']) ? $user->protectData($data['state']):'';
        $street = isset($data['street']) ? $user->protectData($data['street']):'';
        $id =isset($data['id']) ? $user->protectData($data['id']):'';
        
        if($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'You don\'t have permission to carry out this update']);
        }else{
            $response = $user->update_emergency_contact(
                $first_name,
                $last_name,
                $other_relationship_to_yp,
                $main_contact_number,
                $secondary_contact_number,
                $email,
                $address,
                $country_territory,
                $state,
                $street,
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