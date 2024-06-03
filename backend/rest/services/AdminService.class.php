<?php

require_once __DIR__ . '/../dao/AdminDao.class.php';


class AdminService{
    private $admin_dao;
    public function __construct() {
        $this->admin_dao = new AdminDao();
    }
    public function add_admin($admin){
        // TODO check a password against the repeat password
        // If they match do following
       // unset($product['yearOfOrigin']);
        return $this->admin_dao->add_admin($admin);
    }

    public function get_products_paginated($offset, $limit, $search, $order_column, $order_direction) {
        $count = $this->admin_dao->count_admins_paginated($search)['count'];

        $rows =  $this->admin_dao->get_admins_paginated($offset, $limit, $search, $order_column, $order_direction);

        return [
            'count' => $count,
            'data' => $rows
        ];
    }

    public function delete_admin_by_id($id) { 
        return $this->admin_dao->delete_admin_by_id($id);
    }

    public function get_admin_by_id($id) {
        return $this->admin_dao->get_admin_by_id($id);
    }
    
    public function get_admins(){
        return $this->admin_dao->get_admins();
    }

    public function edit_admin($id, $admin) {
        $this->admin_dao->edit_admin($id, $admin);
    }
}