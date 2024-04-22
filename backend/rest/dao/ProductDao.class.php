<?php

require_once __DIR__ . '/BaseDao.class.php';

class ProductDao extends BaseDao {
    public function __construct() {
        parent::__construct('products');
    }
    public function add_product($product){
        return $product;
    }
}