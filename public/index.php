<?php

// Get Vendor autoload
require_once '../vendor/autoload.php';
//require_once '../app/config.php';

use Tea\Controllers\DefaultController;

if (empty($_GET)){
	$defaultController = new DefaultController();
	echo $defaultController->indexAction();
}

elseif (isset($_GET['id'])){
	$defaultController = new DefaultController();
	echo $defaultController->showOneAction();
}

elseif($_GET['section']=='home'){
    $defaultController = new DefaultController();
    echo $defaultController->homeAction();
}

elseif($_GET['section']=='concept'){
    $defaultController = new DefaultController();
    echo $defaultController->conceptAction();
}

elseif($_GET['section']=='shop'){
    $defaultController = new DefaultController();
    echo $defaultController->shopAction();
}

elseif($_GET['section']=='contact'){
    $defaultController = new DefaultController();
    echo $defaultController->contactAction();
}