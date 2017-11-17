<?php

/**
 * Connect to local database
 * @param [string] APP_DB_HOST
 * @param [string] APP_DB_USER
 * @param [string] APP_DB_PWD
 * @param [string] APP_DB_NAME
 * @param [string] APP_DB_PORT
 */
    define("APP_DB_HOST", "localhost");
    define("APP_DB_USER", "root");
    define("APP_DB_PWD", "root");
    define("APP_DB_NAME", "checkpoint-1-27/10/2017");
    define("APP_DB_PORT", "3306");

/**
 * Save info in $db to run sql queries in 'ModelManager.php'
 */
$db = mysqli_connect(APP_DB_HOST, APP_DB_USER, APP_DB_PWD, APP_DB_NAME, APP_DB_PORT);

/**
 * Check if the connection is working
 */
if ($db == false){
    echo "Connection error: " . mysqli_error($db);
}

?>