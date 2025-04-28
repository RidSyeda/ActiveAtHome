<?php
require_once( 'class_database.php');

class Activities extends Database {


	static public $table_name="Activities";
    static public $primary_key = "actiId";
	static protected $db_columns = ['actiId', 'actiName', 'actiBriefDescription', 'actiBenefits', 'actiPrice'];
		
    public $actiId;
    public $actiName;
    public $actiBriefDescription;
    public $actiBenefits;
    public $actiPrice;



}

?>