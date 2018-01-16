<?php
/**
 * Coneckting the the database
 *
 * Conecting to the database
 *
 * @param author Digitalis
 */

function connect(){
    // Define connection as a static variable, to avoid connecting more than once
    static $con;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($con)) {
        // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'./Tastaturen/config.ini');
        $con = mysqli_connect($config['host'],$config['username'],$config['password'],$config['dbname']);
    }

    if($con === false) {
        die("Connection failed: " . myrsqli_connect_error());
        header("Location: 404");
    }

    mysqli_set_charset($con, "utf-8");
    return $con;
}
?>
