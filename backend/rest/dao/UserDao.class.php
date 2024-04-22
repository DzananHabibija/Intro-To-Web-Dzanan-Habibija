<?php

require_once __DIR__ . '/BaseDao.class.php';

class UserDao extends BaseDao {
    public function __construct() {
        parent::__construct('user');
    }
    public function add_user($user){
        $query = "INSERT INTO customers (username, email, passwords)
        VALUES(:username, :email, :password)";
        $statement = $this->connection->prepare($query);
        $statement->execute($user);
        $user['id'] = $this->connection->lastInsertId();
        return $user;
    }
}