<?php

// Set the reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ (E_NOTICE | E_DEPRECATED));

// Database access credentials
define('DB_NAME', 'web-project-db');
define('DB_PORT', 3306);
define('DB_USER', 'dzanan');
define('DB_PASSWORD', 'password');
define('DB_HOST', '127.0.0.1'); // localhost

//JWT Secret
define('JWT_SECRET', 'CaA3&::yZJ5.dzFFgr%J,Gh#Kz,BVQ');



