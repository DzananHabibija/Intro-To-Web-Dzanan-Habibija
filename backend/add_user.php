<?php
require_once __DIR__ . '/rest/services/UserService.class.php';

$payload = $_REQUEST;
//Not working 
if($payload['username'] == NULL || $payload['username'] == '') {
    header('HTTP/1.1 500 Bad Request');
    die(json_encode(['error' => "Username field is missing"]));
}


$user_service = new UserService();
$user = $user_service->add_user($payload);
echo json_encode($user);