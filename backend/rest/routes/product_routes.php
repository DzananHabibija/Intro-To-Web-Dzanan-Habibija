<?php

require_once __DIR__ . '/../services/ProductService.class.php';

Flight::set('product_service', new ProductService());



 /**
     * @OA\Get(
     *      path="/products/all",
     *      tags={"products"},
     *      summary="Get all products",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Array of all products in database"
     *      )
     * )
     */
Flight::route('GET /products/all', function() {

//$payload = Flight::request()->query;

$product_service = Flight::get('product_service');
    
//$user_service = new UserService();

// Count query
$data = Flight::get("product_service")->get_products();

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
     *      path="/products/add",
     *      tags={"products"},
     *      summary="Add product data to the database",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Product data, or exception if product is not added properly"
     *      ),
     *      @OA\RequestBody(
     *          description="Product data payload",
     *          @OA\JsonContent(
     *              required={"productName","productPrice","countryOfOrigin"},
     *              @OA\Property(property="id", type="string", example="1", description="Product ID"),
     *              @OA\Property(property="productName", type="string", example="Some product name", description="Product Name"),
     *              @OA\Property(property="productPrice", type="integer", example="1000", description="Product Price"),
     *              @OA\Property(property="countryOfOrigin", type="string", example="Bosnia and Hercegovina", description="Country Of Origin"),
     *              @OA\Property(property="yearOfProduction", type="integer", example="2024", description="Year of Production")
     *          )
     *      )
     * )
     */
Flight::route('POST /products/add', function() {

//$payload = $_REQUEST;
$payload = Flight::request()->data->getData();

 if($payload['productName'] == NULL || $payload['productName'] == '') {
     //header('HTTP/1.1 500 Bad Request');
     //die(json_encode(['error' => "Username field is missing"]));
     Flight::halt(500,"Product Name field is missing");
 }


 $product = Flight::get('product_service')->add_product($payload);

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


Flight::json($product);

});

/**
     * @OA\Delete(
     *      path="/products/delete/{product_id}",
     *      tags={"products"},
     *      summary="Delete product by id",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Deleted product data or 500 status code exception otherwise"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="product_id", example="1", description="Product ID")
     * )
     */
Flight::route('DELETE /products/delete/@product_id', function($product_id) { 

if($product_id == NULL || $product_id == '') {
    Flight::halt(500,"Product Name field is missing");
}

Flight::get('product_service')-> delete_product_by_id($product_id);

Flight::json(["message" => "You have successfully delelted the product!"]);

});

/**
 * @OA\Put(
 *      path="/products/edit/{product_id}",
 *      tags={"products"},
 *      summary="Edit product data in the database",
 *      security={
 *          {"ApiKey": {}}   
 *      },
 *      @OA\Response(
 *           response=200,
 *           description="Product data after editing or exception if product is not edited properly"
 *      ),
 *      @OA\Parameter(
 *           name="product_id",
 *           in="path",
 *           description="ID of the product to be edited",
 *           required=true,
 *           @OA\Schema(
 *               type="integer",
 *               example=1
 *           )
 *      ),
 *      @OA\RequestBody(
 *          description="Product data payload",
 *          @OA\JsonContent(
 *              required={"productName","productPrice","countryOfOrigin"},
 *              @OA\Property(property="id", type="integer", example=1, description="Product ID"),
 *              @OA\Property(property="productName", type="string", example="Updated product name", description="Product Name"),
 *              @OA\Property(property="productPrice", type="integer", example=1200, description="Product Price"),
 *              @OA\Property(property="countryOfOrigin", type="string", example="Bosnia and Herzegovina", description="Country Of Origin"),
 *              @OA\Property(property="yearOfProduction", type="integer", example=2024, description="Year of Production")
 *          )
 *      )
 * )
 */
Flight::route('PUT /products/edit/@product_id', function($product_id) { 

    $payload = Flight::request()->data->getData();

    if($product_id != null && $product_id != '') {
        $product = Flight::get("product_service")->edit_product((int)$product_id, $payload);
    } else {
        unset($payload['id']);
        $product = Flight::get("product_service")->add_product($payload);
    }

    Flight::json($product);

});

Flight::route('PUT /products/edit/@product_id', function($product_id) { 

    $payload = Flight::request()->data->getData();


      if($product_id != null && $product_id != '') {
      $product = Flight::get("product_service")->edit_product((int)$product_id, $payload);
  } else {
     unset($payload['id']);
      $product = Flight::get("product_service")->add_product($payload);
  }
});


/**
     * @OA\Get(
     *      path="/products/{product_id}",
     *      tags={"products"},
     *      summary="Get product by id",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Get product data or 500 status code exception otherwise"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="product_id", example="1", description="Product ID")
     * )
     */
Flight::route('GET /products/@product_id', function($product_id) { 

    $product = Flight::get('product_service')-> get_product_by_id($product_id);

    Flight::json($product);
});