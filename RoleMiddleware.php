<?php
require_once 'User.php';

class RoleMiddleware {
    public static function checkRole($requiredRoles) {
        $headers = apache_request_headers();
        $token = substr($headers['Authorization'],7);

        $user = new User();
        $response = $user->validateToken($token);

        if ($response['status'] === 'success') {
            $userRole = $response['role'];
            if (in_array($userRole, $requiredRoles)) {
                return ['status' => 'success', 'creator_id'=>$response['creator_id']];
            } else {
                return ['status' => 'error', 'message' => 'Unauthorized'];
            }
        } else {
            return $response;
        }
    }
}
?>