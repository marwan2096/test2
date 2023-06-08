<?php

use MyApp\classes\Product;

require_once('../vendor/autoload.php');
include_once('db_credentials.php');
include_once('helper_functions.php');

// Connect to database

$server_name="localhost";
$username="root";
$password="";
$dbname="scandiweb_test_project";
$DB_PORT = 3306;;
// create connection
// $conn=mysqli_connect($server_name, $username, $password, $dbname);




$database = mysqli_connect($server_name, $username, $password, $dbname, $DB_PORT);
// Set the database for the classes
Product::set_database($database);


