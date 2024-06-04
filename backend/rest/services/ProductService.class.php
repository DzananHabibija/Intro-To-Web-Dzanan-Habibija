<?php

require_once __DIR__ . '/../dao/ProductDao.class.php';


class ProductService{
    private $product_dao;
    public function __construct() {
        $this->product_dao = new ProductDao();
    }
    public function add_product($product){
        // TODO check a password against the repeat password
        // If they match do following
       // unset($product['yearOfOrigin']);
        return $this->product_dao->add_product($product);
    }

    public function get_products_paginated($offset, $limit, $search, $order_column, $order_direction) {
        $count = $this->product_dao->count_products_paginated($search)['count'];

        $rows =  $this->product_dao->get_products_paginated($offset, $limit, $search, $order_column, $order_direction);

        return [
            'count' => $count,
            'data' => $rows
        ];
    }

    public function delete_product_by_id($id) { 
        return $this->product_dao->delete_product_by_id($id);
    }

    public function get_product_by_id($id) {
        return $this->product_dao->get_product_by_id($id);
    }
    
    public function get_products(){
        return $this->product_dao->get_products();
    }

    public function edit_product($id, $product) {
        $this->product_dao->edit_product($id, $product);
    }
}