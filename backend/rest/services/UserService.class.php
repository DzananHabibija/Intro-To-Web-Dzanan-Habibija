<?php

require_once __DIR__ . '/../dao/UserDao.class.php';

class UserService {
    private $user_dao;
    public function __construct() {
        $this->user_dao = new UserDao();
    }
    public function add_user($user){
        // TODO check a password against the repeat password
        // If they match do following
        unset($user['repeatPassword']);
        return $this->user_dao->add_user($user);
    }
}