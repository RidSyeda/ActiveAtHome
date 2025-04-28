<?php

require_once('class_database.php');

class Trainers extends Database {

    static public $table_name = "Trainers";
    static public $primary_key = "triId";
    static protected $db_columns = ['triId', 'triName', 'triEmail', 'triLocation', 'triCertifications', 'triYear', 'triSpecialization'];

		
	public $triId;
	public $triName;
	public $triEmail;
	public $triLocation;
	public $triCertifications;
	public $triYear;
	public $triSpecialization;



}




?>