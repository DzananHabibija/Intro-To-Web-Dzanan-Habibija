<?php
require_once __DIR__ . '/rest/services/ProductService.class.php';

$product_service = new ProductService();
$product_service->add_product([]);