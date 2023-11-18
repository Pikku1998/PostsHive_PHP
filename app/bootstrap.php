<?php

// Load config files
require_once 'config/config.php';

// Load helper files
require_once 'helpers/urlhelper.php';
require_once 'helpers/sessionstatus.php';

// Load library files
// require_once 'libraries/core.php';
// require_once 'libraries/controller.php';
// require_once 'libraries/database.php';


// Autoload library files
spl_autoload_register(function($classname){
    require_once 'libraries/'.$classname.'.php';
});

