<?php

	require_once("modelos/generico_modelo.php");

	class  cliente_modelo extends generico_modelo{
		/*
		CREATE TABLE `cliente` (
  		`Nombre` varchar(50) DEFAULT NULL,
  		`Apellidos` varchar(150) DEFAULT NULL,
  		`NumeroDocumento` varchar(150) NOT NULL,
		`FechaNacimiento` varchar(50) DEFAULT NULL,
  		`Direccion` varchar(50) DEFAULT NULL,
  		`Estado` int(3) DEFAULT NULL,
  		PRIMARY KEY (`NumeroDocumento`)
		*/	
		protected $Nombre;

		protected $Apellidos;

		protected $NumeroDocumento;

		protected $FechaNacimiento;

		protected $Direccion;

		
		public function constructor(){

			$this->Nombre			= $this->validarPost('Nombre');
			$this->Apellidos		= $this->validarPost('Apellidos');
			$this->NumeroDocumento	= $this->validarPost('NumeroDocumento');
			$this->FechaNacimiento	= $this->validarPost('FechaNacimiento');
			$this->Direccion		= $this->validarPost('Direccion');

		}

		public function obtenerNombre(){
				return $this->Nombre;
		}		
		public function obtenerApellidos(){
			return $this->Apellidos;
		}
		public function obtenerNumeroDocumento(){
			return $this->NumeroDocumento;
		}
		public function obtenerFechaNacimiento(){
			return $this->FechaNacimiento;
		}
		public function obtenerDireccion(){
			return $this->Direccion;
		}

		public function cargarcliente($NumeroDocumento){

			$sql = "Select * From cliente WHERE NumeroDocumento = :NumeroDocumento;";
			$arrayDatos = array("NumeroDocumento"=>$NumeroDocumento);
			$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
			return $lista;
		}

		public function ingresar(){
			
			if($this->Nombre == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El Nombre no puede ser vacio");
				return $retorno;
			}			
			if($this->Apellidos == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"Apellidos no puede ser vacio");
				return $retorno;
			}			
			if($this->NumeroDocumento == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El NumeroDocumento no puede ser vacio");
				return $retorno;
			}	
			if($this->FechaNacimiento == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"Fecha Nacimiento no puede ser vacio");
				return $retorno;
			}		
			if($this->Direccion == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"Direccion no puede ser vacio");
				return $retorno;
			}

			$sqlInsert = "INSERT cliente SET							
							Nombre			= :Nombre,
							Apellidos		= :Apellidos,
							NumeroDocumento	= :NumeroDocumento,
							FechaNacimiento	= :FechaNacimiento,
							Direccion		= :Direccion,
							Estado			= 1 ;";

			$arrayInsert = array(
					"Nombre" 			=> $this->Nombre,
					"Apellidos" 		=> $this->Apellidos,
					"NumeroDocumento" 	=> $this->NumeroDocumento,
					"FechaNacimiento" 	=> $this->FechaNacimiento,
					"Direccion" 		=> $this->Direccion
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);		
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se ingresó el cliente correctamente");
			return $retorno;
		}

		public function guardar(){
			
			if($this->Nombre == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El Nombre no puede ser vacio");
				return $retorno;
			}			
			if($this->Apellidos == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"Apellidos no puede ser vacio");
				return $retorno;
			}			
			if($this->NumeroDocumento == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"NumeroDocumento no puede ser vacio");
				return $retorno;
			}	
			if($this->FechaNacimiento == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>" Fecha Nacimiento no puede ser vacio");
				return $retorno;
			}		
			if($this->Direccion == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"Direccion no puede ser vacio");
				return $retorno;
			}

			$sqlInsert = "UPDATE cliente SET							
							Nombre			= :Nombre,
							Apellidos		= :Apellidos,
							NumeroDocumento	= :NumeroDocumento,
							FechaNacimiento	= :FechaNacimiento
							WHERE Direccion	= :Direccion ;";

			$arrayInsert = array(
					"Nombre" 			=> $this->Nombre,
					"Apellidos" 		=> $this->Apellidos,
					"NumeroDocumento" 	=> $this->NumeroDocumento,
					"FechaNacimiento" 	=> $this->FechaNacimiento,
					"Direccion" 		=> $this->Direccion
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);		
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se guardo el cliente correctamente");
			return $retorno;
		}

		public function cargar($NumeroDocumento){

			if($NumeroDocumento == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El NumeroDocumento no puede ser vacio");
				return $retorno;
			}
			$sql = "SELECT * FROM cliente WHERE NumeroDocumento = :NumeroDocumento";
			$arraySQL = array("NumeroDocumento" => $NumeroDocumento);
			$lista	= $this->ejecutarConsulta($sql, $arraySQL);

			$this->Nombre			= $lista[0]['Nombre'];
			$this->Apellidos		= $lista[0]['Apellidos'];
			$this->NumeroDocumento	= $lista[0]['NumeroDocumento'];
			$this->FechaNacimiento	= $lista[0]['FechaNacimiento'];
			$this->Direccion		= $lista[0]['Direccion'];
		}

		public function borrar(){

			//$sql = "DELETE FROM cliente WHERE id = :id";
			$sql = "UPDATE cliente set estado = 0 WHERE NumeroDocumento = :NumeroDocumento";
			$arraySQL = array("NumeroDocumento"=>$this->NumeroDocumento);
			$this->persistirConsulta($sql, $arraySQL);		
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se borró el cliente correctamente");
			return $retorno;
		}

		public function listar($filtros = array()){

			$sql = "SELECT * FROM cliente WHERE estado = 1";
			$arrayDatos = array();
				
			if(isset($filtros['pagina']) && $filtros['pagina'] !=""){

			 	$pagina = ($filtros['pagina'] - 1) * 5;
				$sql .=" ORDER BY NumeroDocumento LIMIT ".$pagina.",5;";

			}else{
				
				$sql .="ORDER BY NumeroDocumento LIMIT 0,5;";

			}
			$lista	= $this->ejecutarConsulta($sql, $arrayDatos);			
			return $lista;	
		}

		public function totalRegistros(){
				$sql = "SELECT count(*) as total FROM cliente";
				$arrayDatos = array();

				$lista	= $this->ejecutarConsulta($sql, $arrayDatos);				
				$totalRegistros = $lista[0]['total'];				
				return $totalRegistros;
		}


	}


?>

