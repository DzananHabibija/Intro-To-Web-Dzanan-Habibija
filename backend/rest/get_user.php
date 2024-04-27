<?php 

require_once __DIR__ . '/services/UserService.class.php';

$book_id = $_REQUEST['id'];

$book_service = new UserService();
$book = $book_service -> get_user_by_id($book_id);

header('Content-Type: application/json');
echo json_encode($user);