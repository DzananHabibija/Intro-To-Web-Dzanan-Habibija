<?php

require_once __DIR__ . '/BaseDao.class.php';

class UserDao extends BaseDao {
    public function __construct() {
        parent::__construct('user');
    }
    public function add_user($user){
        // $query = "INSERT INTO customers (username, email, password)
        // VALUES(:username, :email, :password)";
        // $statement = $this->connection->prepare($query);
        // $statement->execute($user);
        // $user['id'] = $this->connection->lastInsertId();
        // return $user;
        return $this->insert('customers',$user);
    }

    public function count_users_paginated($search){
        $query = "SELECT COUNT(*) AS count
                  FROM customers
                  WHERE LOWER(username) LIKE CONCAT('%', :search, '%') OR 
                        LOWER(email) LIKE CONCAT('%', :search, '%');";
        
    // $statement = $this->connection->prepare($query);
    // $statement->execute(['search' => $search]);
    // $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    // return reset($rows);
    return $this->query_unique($query, [
        'search' => $search
    ]);
        
    }

    public function get_users_paginated($offset, $limit, $search, $order_column, $order_direction){
        $query = "SELECT *
                  FROM customers
                  WHERE LOWER(username) LIKE CONCAT('%', :search, '%') OR 
                        LOWER(email) LIKE CONCAT('%', :search, '%')
                 ORDER BY {$order_column} {$order_direction}
                  LIMIT {$offset}, {$limit}";
        
    // $statement = $this->connection->prepare($query);
    // $statement->execute(['search' => $search]);
    // return $statement->fetchAll(PDO::FETCH_ASSOC);
    return $this->query($query, [
        'search' => $search
    ]);
        
    }

    public function delete_user_by_id($id) {
        $query = "DELETE FROM customers WHERE id = :id";
        $this->execute($query, ['id' => $id]);
    }

    public function get_user_by_id($id) {
        return $this->query_unique("SELECT * FROM customers WHERE id = :id", ['id' => $id]);
    }

    public function get_users(){
        return $this->query("SELECT * FROM customers",[]);
    }

    public function edit_user($id, $user) {
        $query = "UPDATE customers SET username = :username, email = :email, password = :password
                  WHERE id = :id";
        $this->execute($query, [
            'username' => $user['username'],
            'email' => $user['email'],
            'password' => $user['password'],
            'id' => $id
        ]);
    }
}