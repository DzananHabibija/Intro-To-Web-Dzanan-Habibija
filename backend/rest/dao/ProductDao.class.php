<?php

require_once __DIR__ . '/BaseDao.class.php';


class ProductDao extends BaseDao {
    public function __construct() {
        parent::__construct('products');
    }
    public function add_product($product){
        // $query = "INSERT INTO customers (username, email, password)
        // VALUES(:username, :email, :password)";
        // $statement = $this->connection->prepare($query);
        // $statement->execute($user);
        // $user['id'] = $this->connection->lastInsertId();
        // return $user;
        return $this->insert('products',$product);
    }

    public function count_products_paginated($search){
        $query = "SELECT COUNT(*) AS count
                  FROM products
                  WHERE LOWER(productName) LIKE CONCAT('%', :search, '%') OR 
                        LOWER(countryOfOrigin) LIKE CONCAT('%', :search, '%');";
        
    // $statement = $this->connection->prepare($query);
    // $statement->execute(['search' => $search]);
    // $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    // return reset($rows);
    return $this->query_unique($query, [
        'search' => $search
    ]);
        
    }

    public function get_products_paginated($offset, $limit, $search, $order_column, $order_direction){
        $query = "SELECT *
                  FROM products
                  WHERE LOWER(productName) LIKE CONCAT('%', :search, '%') OR 
                        LOWER(countryOfOrigin) LIKE CONCAT('%', :search, '%')
                 ORDER BY {$order_column} {$order_direction}
                  LIMIT {$offset}, {$limit}";
        
    // $statement = $this->connection->prepare($query);
    // $statement->execute(['search' => $search]);
    // return $statement->fetchAll(PDO::FETCH_ASSOC);
    return $this->query($query, [
        'search' => $search
    ]);
        
    }

    public function delete_product_by_id($id) {
        $query = "DELETE FROM products WHERE id = :id";
        $this->execute($query, ['id' => $id]);
    }

    public function get_product_by_id($id) {
        return $this->query_unique("SELECT * FROM products WHERE id = :id", ['id' => $id]);
    }

    public function get_products(){
        return $this->query("SELECT * FROM products",[]);
    }

    public function edit_product($id, $product) {
        $query = "UPDATE products SET productName = :productName, productPrice = :productPrice, countryOfOrigin = :countryOfOrigin
                  WHERE id = :id";
        $this->execute($query, [
            'productName' => $product['productName'],
            'productPrice' => $product['productPrice'],
            'countryOfOrigin' => $product['countryOfOrigin'],
            'id' => $id
        ]);
    }
}