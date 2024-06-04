<?php

require_once __DIR__ . '/../services/UserService.class.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

Flight::set('user_service', new UserService());



 /**
     * @OA\Get(
     *      path="/users/all",
     *      tags={"users"},
     *      summary="Get all users",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Array of all users in database"
     *      )
     * )
     */
Flight::route('GET /users/all', function() {

//$payload = Flight::request()->query;

$user_service = Flight::get('user_service');
    
//$user_service = new UserService();

// Count query
$data = Flight::get("user_service")->get_users();

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
     *      path="/users/add",
     *      tags={"users"},
     *      summary="Add user data to the database",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="User data, or exception if user is not added properly"
     *      ),
     *      @OA\RequestBody(
     *          description="User data payload",
     *          @OA\JsonContent(
     *              required={"username","email","password"},
     *              @OA\Property(property="id", type="string", example="1", description="User ID"),
     *              @OA\Property(property="username", type="string", example="Some username", description="Username"),
     *              @OA\Property(property="email", type="string", example="example@example.com", description="User email address"),
     *              @OA\Property(property="password", type="string", example="some_secret_password", description="User password")
     *          )
     *      )
     * )
     */
Flight::route('POST /users/add', function() {

//$payload = $_REQUEST;
$payload = Flight::request()->data->getData();

 if($payload['username'] == NULL || $payload['username'] == '') {
     //header('HTTP/1.1 500 Bad Request');
     //die(json_encode(['error' => "Username field is missing"]));
     Flight::halt(500,"Username field is missing");
 }


 $user = Flight::get('user_service')->add_user($payload);

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


Flight::json($user);

});

/**
     * @OA\Delete(
     *      path="/users/delete/{user_id}",
     *      tags={"users"},
     *      summary="Delete user by id",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Deleted user data or 500 status code exception otherwise"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="user_id", example="1", description="User ID")
     * )
     */
Flight::route('DELETE /users/delete/@user_id', function($user_id) { 

if($user_id == NULL || $user_id == '') {
    Flight::halt(500,"Username field is missing");
}

Flight::get('user_service')-> delete_user_by_id($user_id);

Flight::json(["message" => "You have successfully delelted the user!"]);

});


Flight::route('PUT /users/edit/@user_id', function($user_id) { 

    $payload = Flight::request()->data->getData();


      if($user_id != null && $user_id != '') {
      $user = Flight::get("user_service")->edit_user((int)$user_id, $payload);
  } else {
     unset($payload['id']);
      $user = Flight::get("user_service")->add_user($payload);
  }
});


/**
     * @OA\Get(
     *      path="/users/{user_id}",
     *      tags={"users"},
     *      summary="Get user by id",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Get user data or 500 status code exception otherwise"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="user_id", example="1", description="User ID")
     * )
     */
Flight::route('GET /users/@user_id', function($user_id) { 
    
    $user = Flight::get('user_service')-> get_user_by_id($user_id);

    Flight::json($user);
});






























// /**
//      * @OA\Get(
//      *      path="/users/info",
//      *      tags={"users"},
//      *      summary="Get logged in user information",
//      *      security={
//      *          {"ApiKey": {}}   
//      *      },
//      *      @OA\Response(
//      *           response=200,
//      *           description="Get user data or 500 status code exception otherwise"
//      *      )
//      * )
//      */
    //  Flight::route('GET /users/info', function() {
    //     Flight::json(Flight::get('user_service')->get_user_by_id(Flight::get('user')->id));
    // });

    // Flight::route('GET /info', function() {     
    //     Flight::json(Flight::get("user"),200);
    // });