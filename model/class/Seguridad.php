<?php
	require_once('class/Usuario.php');
	
	class Seguridad{
	
		function autentica( $usuario, $clave ){
			$db = new BaseDatos();
			//$clave = md5( $clave );
				$query = "
					SELECT 
					 	id_user,username_user
					FROM
						tbl_user
					WHERE
						username_user='$usuario'
					AND
						password='$clave'
					LIMIT 1	
				";
			$db->query( $query );
			if ( $db->numRows() > 0 ){
				$datos = $db->fetchArray();
				$this->crearSesion( $datos );
				return true;
			}else{
				return false;
			}
		}
		function crearSesion( $datos ){
			if ( session_is_registered('usuario') ) {
			 	session_destroy();
			}
			//session_start();
			session_register('usuario');
			session_cache_expire(1800); 			
			$usuario = new Usuario();
			
			$sessionId = session_id();
			$ip = $_SERVER["REMOTE_ADDR"];

			$usuario->setNombre( $datos['nombre'] );
			$usuario->setCodigo( $datos['id'] );
			$usuario->setSession( $sessionId );
			$usuario->setIp( $ip );			
			
			$this->actualizarSesion( $datos['id'], $sessionId, $ip );
			
			$_SESSION['usuario'] = $usuario;
		}
		function verificarSesion( $codigo = 0 ){		
			if ( session_is_registered ( 'usuario' ) ){
				$sessionId = session_id();
				$bd = new BaseDatos();
				$query = "SELECT 
						id
					  FROM
					  	usuario
					  WHERE
					  	id = '$codigo'
					  AND
					  	sesion = '$sessionId'
					  LIMIT 1
							  ";
				$bd->query( $query );
			echo $query."<br>"; 
			echo $bd->numRows();
			exit();
				if ( $bd->numRows() > 0 ){
					return true;
				}else{
					$this->eliminarSesion();
					return false;
				}		
			}else{
				return false;
			}
		}
		function mantenerSesion(){
			session_start();
		}
		function actualizarSesion( $codigo, $sesion, $ip ){
			$query = "UPDATE 
					usuario
				  SET
					sesion = '$sesion', ip = '$ip' 
  				  WHERE
					id = '$codigo';
				";
			$bd = new BaseDatos();
			$bd->query( $query );
		}
		function eliminarSesion(){
			session_destroy();
		}
	
	}



?>