<?php

	require_once("modelos/generico_modelo.php");

	class  cosmeticos_modelo extends generico_modelo {
		/*
		CREATE TABLE cosmeticos (
  		`Nombre` varchar(50) DEFAULT NULL,
  		`Descripcion` varchar(150) NOT NULL,
  		`Precio` varchar(150) DEFAULT NULL,
  		`Imagen` varchar(50) DEFAULT NULL,
  		`id` int(3) NOT NULL,
  			PRIMARY KEY (`id`)
		*/	
		protected $Nombre;

		protected $Descripcion;

		protected $Precio;

		protected $Imagen;

		protected $id;

		
		public function constructor(){

			$this->Nombre		= $this->validarPost('Nombre');
			$this->Descripcion	= $this->validarPost('Descripcion');
			$this->Precio		= $this->validarPost('Precio');
			$this->Imagen		= $this->validarPost('Imagen');
			$this->id			= $this->validarPost('id');

		}

		public function obtenerNombre(){
				return $this->Nombre;
		}		
		public function obtenerDescripcion(){
			return $this->Descripcion;
		}
		public function obtenerPrecio(){
			return $this->Precio;
		}
		public function obtenerImagen(){
			return $this->Imagen;
		}
		public function obtenerid(){
			return $this->id;
		}

		public function cargarCosmeticos($Descripcion){

			$sql = "Select * From cosmeticos WHERE Descripcion = :Descripcion;";
			$arrayDatos = array("Descripcion"=>$Descripcion);
			$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
			return $lista;
		}

		public function ingresar(){
			
			if($this->Nombre == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El Nombre no puede ser vacio");
				return $retorno;
			}			
			if($this->Descripcion == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"Descripcion no puede ser vacio");
				return $retorno;
			}			
			if($this->Precio == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El Precio no puede ser vacio");
				return $retorno;
			}	
			if($this->Imagen == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>" Imagen no puede ser vacio");
				return $retorno;
			}		
			if($this->id == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El id no puede ser vacio");
				return $retorno;
			}

			$sqlInsert = "INSERT cosmeticos SET							
							Nombre			= :Nombre,
							Descripcion		= :Descripcion,
							Precio			= :Precio,
							Imagen			= :Imagen,
							id				= :id ;";

			$arrayInsert = array(
					"Nombre" 		=> $this->Nombre,
					"Descripcion" 	=> $this->Descripcion,
					"Precio" 		=> $this->Precio,
					"Imagen" 		=> $this->Imagen,
					"id" 			=> $this->id
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);		
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se ingresó el producto correctamente");
			return $retorno;
		}

		public function guardar(){
			
			if($this->Nombre == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El Nombre no puede ser vacio");
				return $retorno;
			}			
			if($this->Descripcion == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"Descripcion no puede ser vacio");
				return $retorno;
			}			
			if($this->Precio == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El Precio no puede ser vacio");
				return $retorno;
			}	
			if($this->Imagen == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>" Imagen no puede ser vacio");
				return $retorno;
			}		
			if($this->id == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El id no puede ser vacio");
				return $retorno;
			}

			$sqlInsert = "UPDATE cosmeticos SET							
							Nombre			= :Nombre,
							Descripcion		= :Descripcion,
							Precio			= :Precio,
							Imagen			= :Imagen
							WHERE id		= :id ;";

			$arrayInsert = array(
					"Nombre" 		=> $this->Nombre,
					"Descripcion" 	=> $this->Descripcion,
					"Precio" 		=> $this->Precio,
					"Imagen" 		=> $this->Imagen,
					"id" 			=> $this->id
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);		
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se guardo el cosmetico correctamente");
			return $retorno;
		}

		public function cargar($id){

			if($id == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El id no puede ser vacio");
				return $retorno;
			}
			$sql = "SELECT * FROM cosmeticos WHERE id = :id";
			$arraySQL = array("id" => $id);
			$lista	= $this->ejecutarConsulta($sql, $arraySQL);

			$this->Nombre		= $lista[0]['Nombre'];
			$this->Descripcion	= $lista[0]['Descripcion'];
			$this->Precio		= $lista[0]['Precio'];
			$this->Imagen		= $lista[0]['Imagen'];
			$this->id			= $lista[0]['id'];
		}

		public function borrar(){

			//$sql = "DELETE FROM cosmeticos WHERE id = :id";
			$sql = "UPDATE cosmeticos set estado = 0 WHERE id = :id";
			$arraySQL = array("id"=>$this->id);
			$this->persistirConsulta($sql, $arraySQL);		
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se borró el artículo correctamente");
			return $retorno;
		}

		public function listar($filtros = array()){

			$sql = "SELECT * FROM cosmeticos WHERE estado = 1";
			$arrayDatos = array();
				
			if(isset($filtros['pagina']) && $filtros['pagina'] !=""){

			 	$pagina = ($filtros['pagina'] - 1) * 5;
				$sql .=" ORDER BY id LIMIT ".$pagina.",5;";

			}else{
				
				$sql .="ORDER BY id	LIMIT 0,5;";

			}
			$lista	= $this->ejecutarConsulta($sql, $arrayDatos);			
			return $lista;	
		}

		public function totalRegistros(){
				$sql = "SELECT count(*) as total FROM cosmeticos";
				$arrayDatos = array();

				$lista	= $this->ejecutarConsulta($sql, $arrayDatos);				
				$totalRegistros = $lista[0]['total'];				
				return $totalRegistros;
		}

		public function listaTipoDocumuento(){

			$arrayRetorno = array();
			$arrayRetorno['CI'] = "CI";
			$arrayRetorno['Pasaporte'] = "Pasaporte";
			$arrayRetorno['Credencial'] = "Credencial";
			return $arrayRetorno;
	
		}
	}


?>

