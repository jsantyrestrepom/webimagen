<?php

	class Usuario{
		private $nombre;
		private $usuario;
		private $id;
		private $sessionId;
		private $ip;
		
		function setNombre( $valor ){
			$this->nombre = $valor;
		}
		function setCodigo( $valor ){
			$this->id = $valor;
		}
		function setSession($valor){
			$this->sessionId = $valor;
		}	
		function setIp( $valor ){
			$this->ip = $valor;
		}
		function getNombre(){
			return $this->nombre;
		}
		function getId(){
			return $this->id;
		}
	}


?>