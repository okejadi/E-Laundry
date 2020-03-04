<?php
	setlocale(LC_TIME, "id_ID");
	$working_dir = "http://".$_SERVER['HTTP_HOST'];
	$domain_name = $_SERVER['HTTP_HOST'];
	//$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$domain_name$_SERVER[REQUEST_URI]";
	$link = "$_SERVER[REQUEST_URI]";
	//echo $actual_link;

	$URL_segment = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	$last_URL_Segment = array_pop($URL_segment);
	// Change this to your connection info.
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	$DATABASE_NAME = 'elaundry';
	// Try and connect using the info above.
	$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
	if ( mysqli_connect_errno() ) {
		// If there is an error with the connection, stop the script and display the error.
		die ('Failed to connect to MySQL: ' . mysqli_connect_error());
	}


	class Database{
		var $host = "localhost";
		var $username = "root";
		var $password = "";
		var $database = "elaundry";
		var $koneksi = "";
		public function __construct(){
			
			$this->koneksi = new mysqli($this->host, $this->username, $this->password,$this->database);
			if ($this->koneksi -> connect_errno){
				echo "Koneksi database gagal : " . mysqli_connect_error();
			}
		}
	}

	include_once 'admin.php';

	// class DbConfig{    
	//     private $_host = 'localhost';
	//     private $_username = 'root';
	//     private $_password = '';
	//     private $_database = 'elaundry';
	    
	//     protected $connection;
	    
	//     public function __construct()
	//     {
	//         if (!isset($this->connection)) {
	            
	//             $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
	            
	//             if (!$this->connection) {
	//                 echo 'Cannot connect to database server';
	//                 exit;
	//             }            
	//         }    
	        
	//         return $this->connection;
	//     }
	// }
?>