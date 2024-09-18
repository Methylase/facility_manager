<?php
require_once 'RoleMiddleware.php';
include 'cors.php';

$response = RoleMiddleware::checkRole(['user']);

if ($response['status'] === 'success') {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();
        
        $service_name = isset($data['service_name']) ? $user->protectData($data['service_name']):'';
        $room_number = isset($data['room_number']) ? $user->protectData($data['room_number']):'';
        $job_reported_by_staff_or_young_person = isset($data['job_reported_by_staff_or_young_person']) ? $user->protectData($data['job_reported_by_staff_or_young_person']):'';
        $name_of_young_person = isset($data['name_of_young_person']) ? $user->protectData($data['name_of_young_person']):'';
        $date_repair_requested = isset($data['date_repair_requested']) ? $user->protectData($data['date_repair_requested']):'';
        $time_repair_requested = isset($data['time_repair_requested']) ? $user->protectData($data['time_repair_requested']):'';
        $upload_file = isset($data['upload_file']) ? $user->protectData($data['upload_file']):'';
        $job_priority = isset($data['job_priority']) ? $user->protectData($data['job_priority']):'';
        $reference_number = isset($data['reference_number']) ? $user->protectData($data['reference_number']):'';
        $cost_of_repairs = isset($data['cost_of_repairs']) ? $user->protectData($data['cost_of_repairs']):'';
        $purchase_order_number = isset($data['purchase_order_number']) ? $user->protectData($data['purchase_order_number']):'';
        $post_job_completion_amount = isset($data['post_job_completion_amount']) ? $user->protectData($data['post_job_completion_amount']):'';
        $contractor_name = isset($data['contractor_name']) ? $user->protectData($data['contractor_name']):'';
        $date_po_raised = isset($data['date_po_raised']) ? $user->protectData($data['date_po_raised']):'';
        $repair_timescale = isset($data['repair_timescale']) ? $user->protectData($data['repair_timescale']):'';
        $pre_inspection_date = isset($data['pre_inspection_date']) ? $user->protectData($data['pre_inspection_date']):'';
        $pre_inspection_comments = isset($data['pre_inspection_comments']) ? $user->protectData($data['pre_inspection_comments']):'';
        $post_job_completion_date = isset($data['post_job_completion_date']) ? $user->protectData($data['post_job_completion_date']):'';
        $repair_completion_date = isset($data['repair_completion_date']) ? $user->protectData($data['repair_completion_date']):'';
        $staff_member_sign_out = isset($data['staff_member_sign_out']) ? $user->protectData($data['staff_member_sign_out']):'';
        $system_info = isset($data['system_info']) ? $user->protectData($data['system_info']):'';
        $created_by = isset($data['created_by']) ? $user->protectData($data['created_by']):'';
        $last_modified_by = isset($data['last_modified_by']) ? $user->protectData($data['last_modified_by']):'';
        $post_completion_comments = isset($data['post_completion_comments']) ? $user->protectData($data['post_completion_comments']):'';
        $id =isset($data['id']) ? $user->protectData($data['id']):'';
        
        if($id ==''){
            echo json_encode(['status' => 'error', 'message' => 'You don\'t have permission to carry out this update']);
        }else{
            $response = $user->update_maintenance(
                $service_name,
                $room_number,
                $job_reported_by_staff_or_young_person,
                $name_of_young_person,
                $date_repair_requested,
                $time_repair_requested,
                $upload_file,
                $job_priority,
                $reference_number,
                $cost_of_repairs,
                $purchase_order_number,
                $post_job_completion_amount,
                $contractor_name,
                $date_po_raised,
                $repair_timescale,
                $pre_inspection_date,
                $pre_inspection_comments,
                $post_job_completion_date,
                $repair_completion_date,
                $staff_member_sign_out,
                $system_info,
                $created_by,
                $last_modified_by,
                $post_completion_comments,
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