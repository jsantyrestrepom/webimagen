<?php	
		//CLASE PARA EL MANEJO DE BASE DE DATOS EN MYSQL
	class BaseDatos {
		private $result;
		private $conn;
		
		function BaseDatos() {		//constructor
			$server="localhost";
			$port = 3306;
			$dbname = "jrestr76_reto1"; //"webimagen";
			$user = "root";
			$password = "escopolamina";
			error_reporting(~E_ALL);			
			if ($conn = mysql_connect($server, $user, $password)) {
				if($use = mysql_select_db($dbname ,$conn)) {
					error_reporting(E_ALL);
				} else {
					echo '<center><b>Error seleccionando la base de datos</b></center>';
					exit();
				}
			} else {
				echo '<center><b>Sitio temporalmente fuera de linea</b></center>';
				exit();
			}
		}
		function free() {
			return mysql_free_result($this->result);		
		}
		function query($query, $log = true){
			$a = array("/--/");			
			$b = array("_");
			$query = preg_replace($a,$b,$query);
			if ( $this->result = mysql_query($query) ){
			    $estado = 1;
			} else {
			    $estado = 0;
			    echo $query;
			    exit();
			}
		}
		function fetchArray() {
			return mysql_fetch_array($this->result);		
		}
		function numRows() {			// num: SELECT
			return mysql_num_rows($this->result);		
		}
		function affectedRows() {		//affected: INSERT, UPDATE, DELETE
			return mysql_affected_rows();		
		}
		function seek($row_number) {
			mysql_data_seek($this->result,$row_number);		
		}
	}


?>
