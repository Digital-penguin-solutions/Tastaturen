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
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
        // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file('../config.ini');
        $connection = mysqli_connect($config['host'],$config['username'],$config['password'],$config['dbname']);
    }
    if($connection === false) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: 404");

    }
    mysqli_set_charset($connection, "utf-8");
    return $connection;
}
?>
