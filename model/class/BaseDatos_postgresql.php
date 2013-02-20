<?php
	
		//CLASE PARA EL MANEJO DE BASE DE DATOS EN POSTGRESQL
	class BaseDatos {
		private $result;		
		
		function BaseDatos() {		//constructor		
			$server="localhost";
			$port = 5432;
			$dbname = "webimagen";
			$user = "postgres";			
			$password = "pgroot";
			error_reporting(~E_ALL);
			if ($conn = pg_connect("host=$server port=$port dbname=$dbname user=$user password=$password")) {
				error_reporting(E_ALL);
			} else {
				echo '<center><b>Sitio temporalmente fuera de linea</b></center>';
				exit();
			}
		}
		function free() {
			return pg_free_result($this->result);		
		}
		function query($query, $log = true){
			$a = array("/--/");			
			$b = array("_");
			$query = preg_replace($a,$b,$query);
			if ( $this->result = pg_query($query) ) {
			    $estado = 1;
			} else {
			    $estado = 0;
			    echo $query;
			    exit();
			}
		}
		function fetchArray() {
			return pg_fetch_array($this->result);		
		}
		function numRows() {			// num: SELECT
			return pg_num_rows($this->result);		
		}
		function affectedRows() {		//affected: INSERT, UPDATE, DELETE
			return pg_affected_rows($this->result);		
		}
		function seek($offset) {
			pg_result_seek($this->result,$offset);		
		}
		
	}


?>