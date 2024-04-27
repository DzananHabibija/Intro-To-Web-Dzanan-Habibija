<?php

require_once __DIR__ . '/../dao/ProductDao.class.php';

class ProductService {
    private $product_dao;
    public function __construct() {
        $this->product_dao = new ProductDao();
    }
    public function add_product($product){
        return $this->product_dao->add_product($product);
    }
}