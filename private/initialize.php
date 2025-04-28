<?php

require_once('credentials.php');
require_once( 'database_functions.php');
require_once( 'class_database.php');
require_once( 'class_activties.php');
require_once('class_trainers.php');

$database = db_connect(); // connect to DB
Database::set_database($database); // link database to class

?>

