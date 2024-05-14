<?php 

require_once __DIR__ . '/rest/services/UserService.class.php';



$user_service = new UserService();

// Count query
$data = $user_service->get_users();

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
 foreach($data as $id => $user) {
     $actionHtml = '<div class="btn-group" role="group" aria-label="Actions">' .
     '<button style="margin-right: 10px;" type="button" class="btn btn-warning" onClick="openEditNewModal('. htmlspecialchars($user['id']) .')">Edit</button>' .
     '<button type="button" class="btn btn-danger" onClick="deleteUser('. htmlspecialchars($user['id']) .')">Delete</button>' .
     '</div>';
 $data[$id]['action'] = $actionHtml;
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

 

echo json_encode([
    "data" => $data
]);

