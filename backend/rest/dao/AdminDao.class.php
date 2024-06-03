<?php

require_once __DIR__ . '/BaseDao.class.php';


class AdminDao extends BaseDao {
    public function __construct() {
        parent::__construct('admins');
    }
    public function add_admin($admin){
        // $query = "INSERT INTO customers (username, email, password)
        // VALUES(:username, :email, :password)";
        // $statement = $this->connection->prepare($query);
        // $statement->execute($user);
        // $user['id'] = $this->connection->lastInsertId();
        // return $user;
        return $this->insert('admins',$admin);
    }

    public function count_admins_paginated($search){
        $query = "SELECT COUNT(*) AS count
                  FROM admins
                  WHERE LOWER(name) LIKE CONCAT('%', :search, '%') OR 
                        LOWER(surname) LIKE CONCAT('%', :search, '%');";
        
    // $statement = $this->connection->prepare($query);
    // $statement->execute(['search' => $search]);
    // $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    // return reset($rows);
    return $this->query_unique($query, [
        'search' => $search
    ]);
        
    }

    public function get_admins_paginated($offset, $limit, $search, $order_column, $order_direction){
        $query = "SELECT *
                  FROM admins
                  WHERE LOWER(name) LIKE CONCAT('%', :search, '%') OR 
                        LOWER(surname) LIKE CONCAT('%', :search, '%')
                 ORDER BY {$order_column} {$order_direction}
                  LIMIT {$offset}, {$limit}";
        
    // $statement = $this->connection->prepare($query);
    // $statement->execute(['search' => $search]);
    // return $statement->fetchAll(PDO::FETCH_ASSOC);
    return $this->query($query, [
        'search' => $search
    ]);
        
    }

    public function delete_admin_by_id($id) {
        $query = "DELETE FROM admins WHERE id = :id";
        $this->execute($query, ['id' => $id]);
    }

    public function get_admin_by_id($id) {
        return $this->query_unique("SELECT * FROM admins WHERE id = :id", ['id' => $id]);
    }

    public function get_admins(){
        return $this->query("SELECT * FROM admins",[]);
    }

    public function edit_admin($id, $admin) {
        $query = "UPDATE admins SET name = :name, surname = :surname, email = :email
                  WHERE id = :id";
        $this->execute($query, [
            'name' => $admin['name'],
            'surname' => $admin['surname'],
            'email' => $admin['email'],
            'id' => $id
        ]);
    }
}