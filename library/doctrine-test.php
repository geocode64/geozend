<?php
// include main Doctrine class file
include_once 'Doctrine/Doctrine.php';
spl_autoload_register(array('Doctrine', 'autoload'));
// create Doctrine manager
$manager = Doctrine_Manager::getInstance();
// create database connection
$conn = Doctrine_Manager::connection(
 'mysql://root:buzz_321@localhost/test', 'doctrine');
// get and print list of databases
$databases = $conn->import->listDatabases();
print_r($databases);
?>