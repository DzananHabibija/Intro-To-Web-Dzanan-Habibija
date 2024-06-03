<?php

require_once __DIR__ . '/../services/AdminService.class.php';

Flight::set('admin_service', new AdminService());



 /**
     * @OA\Get(
     *      path="/admins/all",
     *      tags={"admins"},
     *      summary="Get all admins",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Array of all admins in database"
     *      )
     * 
     * )
     */
Flight::route('GET /admins/all', function() {

//$payload = Flight::request()->query;

$admin_service = Flight::get('admin_service');
    
//$user_service = new UserService();

// Count query
$data = Flight::get("admin_service")->get_admins();

//  foreach($data as $id => $user) {
//      $actionHtml = '<div class="btn-group" role="group" aria-label="Actions">' .
//      '<button style="margin-right: 10px;" type="button" class="btn btn-warning" onClick="openEditNewModal('. htmlspecialchars($user['id']) .')">Edit</button>' .
//      '<button type="button" class="btn btn-danger" onClick="deleteUser('. htmlspecialchars($user['id']) .')">Delete</button>' .
//      '</div>';
//  $data[$id]['action'] = $actionHtml;
//  }
 
// echo json_encode([
//     "data" => $data
// ]);

Flight:: json([
    "data" => $data
],200);



});


/**
     * @OA\Post(
     *      path="/admins/add",
     *      tags={"admins"},
     *      summary="Add admin data to the database",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Admin data, or exception if admin is not added properly"
     *      ),
     *      @OA\RequestBody(
     *          description="Admin data payload",
     *          @OA\JsonContent(
     *              required={"name","surname","email"},
     *              @OA\Property(property="id", type="string", example="1", description="Admin ID"),
     *              @OA\Property(property="name", type="string", example="Some admin name", description="Admin Name"),
     *              @OA\Property(property="surname", type="string", example="Some admin surname", description="Admin Surname"),
     *              @OA\Property(property="email", type="string", example="admin@admin.com", description="Admin email"),
     *              @OA\Property(property="password", type="string", example="some_secret_password", description="Secret Password")
     *          )
     *      )
     * )
     */
Flight::route('POST /admins/add', function() {

//$payload = $_REQUEST;
$payload = Flight::request()->data->getData();

 if($payload['name'] == NULL || $payload['name'] == '') {
     //header('HTTP/1.1 500 Bad Request');
     //die(json_encode(['error' => "Username field is missing"]));
     Flight::halt(500,"Admin Name field is missing");
 }


 $admin = Flight::get('admin_service')->add_admin($payload);

//  if($payload['username'] == NULL || $payload['username'] == '') {
//      header('HTTP/1.1 500 Bad Request');
//      die(json_encode(['error' => 'Username field is missing']));
//  }

//   $user_service = new UserService();

//   if($payload['id'] != null && $payload['id'] != '') {
//       $user = $user_service->edit_user($payload);
//   } else {
//      unset($payload['id']);
//       $user = $user_service->add_user($payload);
//   }


Flight::json($admin);

});

/**
     * @OA\Delete(
     *      path="/admins/delete/{admin_id}",
     *      tags={"admins"},
     *      summary="Delete admin by id",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Deleted admin data or 500 status code exception otherwise"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="admin_id", example="1", description="Admin ID")
     * )
     */
Flight::route('DELETE /admins/delete/@admin_id', function($admin_id) { 

if($admin_id == NULL || $admin_id == '') {
    Flight::halt(500,"Admin Name field is missing");
}

Flight::get('admin_service')-> delete_admin_by_id($admin_id);

Flight::json(["message" => "You have successfully delelted the admin!"]);

});

/**
 * @OA\Put(
 *      path="/admins/edit/{admin_id}",
 *      tags={"admins"},
 *      summary="Edit admin data in the database",
 *      security={
 *          {"ApiKey": {}}   
 *      },
 *      @OA\Response(
 *           response=200,
 *           description="Admin data after editing or exception if admin is not edited properly"
 *      ),
 *      @OA\Parameter(
 *           name="admin_id",
 *           in="path",
 *           description="ID of the admin to be edited",
 *           required=true,
 *           @OA\Schema(
 *               type="integer",
 *               example=1
 *           )
 *      ),
 *      @OA\RequestBody(
 *          description="Admin data payload",
 *          @OA\JsonContent(
 *            required={"name","surname","email"},
  *              @OA\Property(property="id", type="string", example="1", description="Admin ID"),
  *              @OA\Property(property="name", type="string", example="Some admin name", description="Admin Name"),
  *              @OA\Property(property="surname", type="string", example="Some admin surname", description="Admin Surname"),
  *              @OA\Property(property="email", type="string", example="admin@admin.com", description="Admin email"),
  *              @OA\Property(property="password", type="string", example="some_secret_password", description="Secret Password")
 *          )
 *      )
 * )
 */
Flight::route('PUT /admins/edit/@admin_id', function($admin_id) { 

    $payload = Flight::request()->data->getData();


      if($admin_id != null && $admin_id != '') {
      $admin = Flight::get("admin_service")->edit_admin((int)$admin_id, $payload);
  } else {
     unset($payload['id']);
      $admin = Flight::get("admin_service")->add_admin($payload);
  }
});


/**
     * @OA\Get(
     *      path="/admins/{admin_id}",
     *      tags={"admins"},
     *      summary="Get admin by id",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Get admin data or 500 status code exception otherwise"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="admin_id", example="1", description="Admin ID")
     * )
     */
Flight::route('GET /admins/@admin_id', function($admin_id) { 

    $admin = Flight::get('admin_service')-> get_admin_by_id($admin_id);

    Flight::json($admin);
});