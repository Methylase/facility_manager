<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        
        $service  = isset($data['service']) ? $user->protectData($data['service']):'';
        $room = isset($data['room']) ? $user->protectData($data['room']):'';
        $intended_void_date = isset($data['intended_void_date']) ? $user->protectData($data['intended_void_date']):'';
        $starter_pack_available = isset($data['starter_pack_available']) ? $user->protectData($data['starter_pack_available']):'';
        $void_tips = isset($data['void_tips']) ? $user->protectData($data['void_tips']):'';
        $bed = isset($data['bed']) ? $user->protectData($data['bed']):'';
        $mattress = isset($data['mattress']) ? $user->protectData($data['mattress']):'';
        $side_table = isset($data['side_table']) ? $user->protectData($data['side_table']):'';
        $wardrobe = isset($data['wardrobe']) ? $user->protectData($data['wardrobe']):'';
        $desk_and_chair = isset($data['desk_and_chair']) ? $user->protectData($data['desk_and_chair']):'';
        $curtains = isset($data['curtains']) ? $user->protectData($data['curtains']):'';
        $lamps = isset($data['lamps']) ? $user->protectData($data['lamps']):'';
        $keys_and_spare = isset($data['keys_and_spare']) ? $user->protectData($data['keys_and_spare']):'';
        $furniture_comments = isset($data['furniture_comments']) ? $user->protectData($data['furniture_comments']):'';
        $cooker = isset($data['cookers']) ? $user->protectData($data['cookers']):'';
        $fridge_freezer = isset($data['fridge_freezer']) ? $user->protectData($data['fridge_freezer']):'';
        $washing_machine = isset($data['washing_machine']) ? $user->protectData($data['washing_machine']):'';
        $microwave = isset($data['microwave']) ? $user->protectData($data['microwave']):'';
        $comments = isset($data['comments']) ? $user->protectData($data['comments']):'';
        $cleaning_needed  = isset($data['cleaning_needed']) ? $user->protectData($data['cleaning_needed']):'';
        $deep_cleaning_needed  = isset($data['deep_cleaning_needed']) ? $user->protectData($data['deep_cleaning_needed']):'';
        $bedroom  = isset($data['bedroom']) ? $user->protectData($data['bedroom']):'';
        $bathroom  = isset($data['bathroom']) ? $user->protectData($data['bathroom']):'';
        $kitchen  = isset($data['kitchen']) ? $user->protectData($data['kitchen']):'';
        $others  = isset($data['others']) ? $user->protectData($data['others']):'';
        $system_info  = isset($data['system_info']) ? $user->protectData($data['system_info']):'';
        $last_modified_by  = isset($data['last_modified_by']) ? $user->protectData($data['last_modified_by']):'';
        $created_by  = isset($data['created_by']) ? $user->protectData($data['created_by']):'';
        $white_goods  = isset($data['white_goods']) ? $user->protectData($data['white_goods']):'';
        $flooring  = isset($data['flooring']) ? $user->protectData($data['flooring']):'';
        $outdoors_areas  = isset($data['outdoors_areas']) ? $user->protectData($data['outdoors_areas']):'';
        $cleaning_comments  = isset($data['cleaning_comments']) ? $user->protectData($data['cleaning_comments']):'';
        $id =isset($data['id']) ? $user->protectData($data['id']):'';
        
        if($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'You don\'t have permission to carry out this update']);
        }else{
            $response = $user->update_prevoid_management(
                $service,
                $room,
                $intended_void_date,
                $starter_pack_available,
                $void_tips,
                $bed,
                $mattress,
                $side_table,
                $wardrobe,
                $desk_and_chair,
                $curtains,
                $lamps,
                $keys_and_spare,
                $furniture_comments,
                $cooker,
                $fridge_freezer,
                $washing_machine,
                $microwave,
                $comments,
                $cleaning_needed,
                $deep_cleaning_needed,
                $bedroom,
                $bathroom,
                $kitchen,
                $others,
                $system_info,
                $last_modified_by,
                $created_by,
                $white_goods,
                $flooring,
                $outdoors_areas,
                $cleaning_comments,
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