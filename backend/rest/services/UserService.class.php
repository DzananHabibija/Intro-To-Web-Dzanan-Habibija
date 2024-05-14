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
        $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT); //for password encryption
        return $this->user_dao->add_user($user);
    }

    public function get_users_paginated($offset, $limit, $search, $order_column, $order_direction) {
        $count = $this->user_dao->count_users_paginated($search)['count'];

        $rows =  $this->user_dao->get_users_paginated($offset, $limit, $search, $order_column, $order_direction);

        return [
            'count' => $count,
            'data' => $rows
        ];
    }

    public function delete_user_by_id($id) { 
        return $this->user_dao->delete_user_by_id($id);
    }

    public function get_user_by_id($id) {
        return $this->user_dao->get_user_by_id($id);
    }
    
    public function get_users(){
        return $this->user_dao->get_users();
    }

    public function edit_user($user) {
        $id = $user['id'];
        unset($user['id']);
        
        $this->user_dao->edit_user($id, $user);
    }
}