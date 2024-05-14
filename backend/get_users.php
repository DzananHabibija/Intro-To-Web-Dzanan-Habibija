<?php 

require_once __DIR__ . '/rest/services/UserService.class.php';

$payload = $_REQUEST;

$params = [
    "start" => (int)$payload['start'],
    "search" => $payload['search']['value'],
    "draw" => $payload['draw'],
    "limit" => (int)$payload['length'],
    "order_column" => $payload['order'][0]['name'],
    "order_direction" => $payload['order'][0]['dir'],
    //"order_column" => isset($payload['order']) ? $payload['order'][0]['name'] : 'first_name', //ispraviti
    //order_direction" => isset($payload['order']) ? $payload['order'][0]['dir'] : 'asc', //ispraviti
];

$user_service = new UserService();

// Count query
$data = $user_service->get_users_paginated(
    $params['start'],
    $params['limit'],
    $params['search'],
    $params['order_column'],
    $params['order_direction']
);

// foreach($data['data'] as $id => $user) {
//     // $data['data'][$id]['action'] = '<div class="btn-group" role="group" aria-label="Basic mixed styles example">' .
//     // '<button type="button" class="btn btn-danger">Edit</button>' .
//     // '<button type="button" class="btn btn-warning">Delete</button>' .
//     // '</div>';
//     $actionHtml = '<div class="btn-group" role="group" aria-label="Basic mixed styles example">' .
//                   '<button type="button" class="btn btn-danger">Edit</button>' .
//                   '<button type="button" class="btn btn-warning">Delete</button>' .
//                   '</div>';
//     $data['data'][$id]['action'] = $actionHtml;
// }
foreach($data['data'] as $id => $user) {
    $actionHtml = '<div class="btn-group" role="group" aria-label="Actions">' .
    '<button style="margin-right: 10px;" type="button" class="btn btn-outline-primary" onClick="UserService.open_edit_user_modal('. htmlspecialchars($user['id']) .')">Edit</button>' .
    '<button type="button" class="btn btn-outline-danger" onClick="UserService.delete_user('. htmlspecialchars($user['id']) .')">Delete</button>' .
    '</div>';
$data['data'][$id]['action'] = $actionHtml;
}
 
// foreach ($data['data'] as $id => $user) {
//     $actionHtml = '<div class="btn-group" role="group" aria-label="Basic mixed styles example">' .
//                   '<button type="button" class="btn btn-danger">Edit</button>' .
//                   '<button type="button" class="btn btn-warning">Delete</button>' .
//                   '</div>';
//     $data['data'][$id]['action'] = json_encode($actionHtml);
// }
// foreach($data['data'] as $id => $user) {
//     $data['data'][$id]['action'] = '<div class="btn-group" role="group" aria-label="Action">
//     <button type="button" class="btn btn-danger">Edit</button>
//     <button type="button" class="btn btn-warning">Delete</button> 
//     </div>';
//  } 

 

// Response
echo json_encode([
    'draw' => $params['draw'],
    'data' => $data['data'], //$customers
    'recordsFiltered' => $data['count'],
    'recordsTotal' => $data['count'], //count instead of data in these 3 rows
    'end' => $data['count']
]);