<?php

/**
 * @OA\Info(
 *   title="API",
 *   description="Web project API",
 *   version="1.0",
 *   @OA\Contact(
 *     email="dzanan.habibija@stu.ibu.edu.ba",
 *     name="Dzanan Habibija"
 *   )
 * ),
 * @OA\OpenApi(
 *   @OA\Server(
 *       url=BASE_URL
 *   )
 * )
 * @OA\SecurityScheme(
 *     securityScheme="ApiKey",
 *     type="apiKey",
 *     in="header",
 *     name="Authentication"
 * )
 */
