<?php
    session_start();

    // Database params
    define('DB_HOST', 'YOUR_HOST');
    define('DB_USER', 'YOUR_DB_USER');
    define('DB_PASSWORD', 'YOUR_DB_PASSWORD');
    define('DB_NAME', 'YOUR_DB_NAME');


    // root params
    define('APPROOT', dirname(dirname(__FILE__))) ;

    define('URLROOT', 'YOUR_URL_ROOT');
    
    // Sitename params
    define('SITENAME', 'PostsHive');

    // APP version
    define('APPVERSION', '1.0.0');



?>