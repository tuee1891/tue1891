<?php

	require_once("modelos/generico_modelo.php");

	class  administradores_modelo extends generico_modelo {
		
		protected $id;

		protected $nombre;

		protected $mail;

		protected $clave;		

		
		public function constructor(){

			$this->id		= $this->validarPost('id');
			$this->nombre	= $this->validarPost('nombre');
			$this->mail		= $this->validarPost('mail');
			$this->clave	= $this->validarPost('clave');		

		}

		public function obtenerid(){
				return $this->id;
		}		
		public function obtenernombre(){
			return $this->nombre;
		}
		public function obtenermail(){
			return $this->mail;
		}

		public function cargarAdministrador($idRegistro){

			$sql = "Select * From administradores WHERE id = :idRegistro;";
			$arrayDatos = array("idRegistro"=>$idRegistro);
			$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
			return $lista;
		}
		public function validarLogin($mail, $clave){

			$sql = "Select * From administradores WHERE mail = :mail AND clave = :clave;";
			$arrayDatos = array("mail"=>$mail, "clave"=>md5($clave));
			$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
			return $lista;
		}

		public function ingresar(){
			
			if($this->mail == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El mail no puede ser vacio");
				return $retorno;
			}
			if($this->clave == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"La clave no puede ser vacia");
				return $retorno;
			}			

			$sqlInsert = "INSERT administradores SET							
							nombre		= :nombre,
							mail		= :mail,
							clave		= :clave,
							estado		= :1 ;";

			$arrayInsert = array(
					"nombre" 	=> $this->nombre,
					"mail" 		=> $this->mail,
					"clave" 	=> $this->clave,					
				
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);		
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se ingresó el administrador correctamente");
			return $retorno;
		}

		public function guardar(){
			
			if($this->nombre == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El nombre no puede ser vacio");
				return $retorno;
			}			
			if($this->mail == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"mail no puede ser vacio");
				return $retorno;
			}			
			if($this->clave == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"La clave no puede ser vacia");
				return $retorno;
			}	
			
			$sqlInsert = "UPDATE administradores SET							
							nombre		= :nombre,
							mail		= :mail,
							WHERE id	= :id ;";

			$arrayInsert = array(
					"nombre" 	=> $this->nombre,
					"mail" 		=> $this->mail,
					"id" 		=> $this->id
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);		
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se guardo el administrador correctamente");
			return $retorno;
		}

		public function cargar($id){

			if($id == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El id no puede ser vacio");
				return $retorno;
			}
			$sql = "SELECT * FROM administradores WHERE id = :id";
			$arraySQL = array("id" => $id);
			$lista	= $this->ejecutarConsulta($sql, $arraySQL);

			$this->nombre	= $lista[0]['nombre'];
			$this->mail		= $lista[0]['mail'];
			$this->id		= $lista[0]['id'];
		}

		public function borrar(){

			//$sql = "DELETE FROM cosmeticos WHERE id = :id";
			$sql = "UPDATE administradores set estado = 0 WHERE id = :id";
			$arraySQL = array("id"=>$this->id);
			$this->persistirConsulta($sql, $arraySQL);		
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se borró el administrador correctamente");
			return $retorno;
		}

		public function listar($filtros = array()){

			$sql = "SELECT * FROM administradores WHERE estado = 1";
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

