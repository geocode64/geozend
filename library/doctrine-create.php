<?php
// include main Doctrine class file
include_once 'Doctrine/Doctrine.php';
spl_autoload_register(array('Doctrine', 'autoload'));
// create Doctrine manager
$manager = Doctrine_Manager::getInstance();
// create database connection
$conn = Doctrine_Manager::connection(
 'mysql://square:square@localhost/square', 'doctrine');
// auto-generate models
Doctrine::generateModelsFromDb('/home/geo/models2',
 array('doctrine'), 
 array('classPrefix' => 'Square_Model_')
);
?>