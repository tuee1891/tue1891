<?php

	require_once("modelos/cliente_modelo.php");

	$objCliente	= new cliente_modelo();

	// evaluamos las acciones que mando 
	$error = array();
	if(isset($_POST['accion']) && $_POST['accion'] == "ingresar"){
		//En caso de que la accion sea ingresar procedemos a ingresar el registro
		
		$objCliente->constructor();
		$error = $objCliente->ingresar();

	}
	if(isset($_POST['accion']) && $_POST['accion'] == "borrar"){

		$id = isset($_POST['id'])?$_POST['id']:"";
		$objCliente->cargar($id);		
		print_r($objCliente->obtenerNombre()."-");
		$error = $objCliente->borrar();
	}

	if(isset($_POST['accion']) && $_POST['accion'] == "guardar"){
		//En caso de que la accion sea ingresar procedemos a ingresar el registro
		
		$objCliente->constructor();
		$error = $objCliente->guardar();
		print_r($error);

	}
	
	// Armamos el paginador!
	$arrayFiltro	= array("pagina" => "1");
	if(isset($_GET['p']) && !Empty($_GET['p']) && $_GET['p'] != ""){
		$arrayFiltro["pagina"] = $_GET['p'];
		
	}
	$arrayPagina = $objCliente->paginador($arrayFiltro["pagina"]);
	

	$listaCliente = $objCliente->listar($arrayFiltro);	
	
?>

<div>
	<!-- Modal Trigger -->
		<h3>Clientes</h3>		
		<?php if(isset($error['estado']) && $error['estado']=="Error"){ ?>
			<div class="red valign-wrapper" style="height:50px">
				<h5 class="center-align" style="width:100%"> 
		<?PHP print_r($error['mensaje']); ?>
				</h5>			
			</div>
		<?php } ?>
		
		<?php if(isset($error['estado']) && $error['estado']=="Ok"){ ?>
			<div class="purple lighten-4 valign-wrapper" style="height:50px">
				<h5 class="center-align" style="width:100%">
		<?PHP print_r($error['mensaje']); ?>
				</h5>
			</div>
		<?PHP } ?>		
<?php 
		if(isset($_GET['a']) && $_GET['a'] == "borrar"){
			$idRegistro = isset($_GET['id'])?$_GET['id']:"";
?>
			<div class="divider"></div>
			<form method="POST" action="sistema.php?r=cliente" class="col s12">
				<h4>Desea borrar el cliente?</h4>
				<input type="hidden" name="id" value="<?=$idRegistro?>"> 
				<button class="btn waves-effect waves-light purple accent-1" type="submit" name="accion" value="borrar">Aceptar
				<i class="material-icons right">delete_sweep</i>
				</button>
				<button class="btn waves-effect waves-light red" type="submit" name="accion">Cancelar
				<i class="material-icons right">cancel</i>
				</button>
			</form>
		<br><br>
		<div class="divider"></div>
<?php } ?>

<?php 
		if(isset($_GET['a']) && $_GET['a'] == "editar" && isset($_GET['id']) && $_GET['id'] !=""){
			$idRegistro = isset($_GET['id'])?$_GET['id']:"";
			$objCliente->cargar($idRegistro);

?>
			<div class="divider"></div>
			<form method="POST" action="sistema.php?r=cliente" class="col s12">
				<h4>Editar cliente</h4>
				<input type="hidden" name="NumeroDocumento" value="<?=$idRegistro?>">
				<input type="hidden" name="accion" value="guardar">
				
				<div class="row">
						<div class="input-field col s4">
							<input id="first_name" type="text" class="validate" name="Nombre" value="<?=$objCliente->obtenerNombre()?>">
							<label for="first_name">Nombre</label>
						</div>
						<div class="input-field col s5">
							<input id="last_name" type="text" class="validate" name="Apellidos" value="<?=$objCliente->obtenerApellidos()?>">
							<label for="last_name">Apellidos</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s2">
							<input id="NumeroDocumento" type="text" class="validate" name="NumeroDocumento" value="<?=$objCliente->obtenerNumeroDocumento()?>" disabled>
							<label for="NumeroDocumento">NumeroDocumento</label>
						</div>							
						<div class="input-field col s3">
							<input id="FechaNacimiento" type="date" class="validate" name="FechaNacimiento" value="<?=$objCliente->obtenerFechaNacimiento()?>">
							<label for="FechaNacimiento">FechaNacimiento</label>
						</div>
						<div class="input-field col s4">
							<input id="Direccion" type="text" class="validate" name="Direccion" value="<?=$objCliente->obtenerDireccion()?>">
							<label for="Direccion">Direccion</label>
						</div>
					</div>
					
					<button class="btn waves-effect waves-light" type="submit">Guardar
						<i class="material-icons right">send</i>
					</button>

			</form>
		<br><br>
		<div class="divider"></div>
<?php } ?>

	<a class="waves-effect waves-light btn modal-trigger purple accent-1 right" href="#modal1">Ingresar</a>	
	<br><br>
	<table class="striped">
		<thead>
		  <tr class="purple accent-1">
			  <th>Nombre</th>
			  <th>Apellidos</th>
			  <th>NumeroDocumento</th>
			  <th>FechaNacimiento</th>
			  <th>Direccion</th>
			  <th class=right>Editar/Eliminar</th>
		  </tr>
		</thead>
		<tbody>
<?php
		foreach($listaCliente as $cliente){
?>
		<tr>
			<td><?=$cliente['Nombre']?></td>
			<td><?=$cliente['Apellidos']?></td>
			<td><?=$cliente['NumeroDocumento']?></td>
			<td><?=$cliente['FechaNacimiento']?></td>
			<td><?=$cliente['Direccion']?></td>
			<td>
				<div class="right">
				<a class="waves-effect waves-light btn purple accent-1" href="sistema.php?r=cliente&id=<?=$cliente['NumeroDocumento']?>&a=editar">
				<i class="material-icons ">create</i>
				</a>
				<a class="waves-effect waves-light btn red" href="sistema.php?r=cliente&id=<?=$cliente['NumeroDocumento']?>&a=borrar">
				<i class="material-icons ">delete</i>
				</a>
				</div>		
			</td>			
		</tr>
<?php
		}
?>		  
		<tr>
			<td colspan="6">
				<ul class="pagination right">
					<li class="waves-effect"><a href="sistema.php?r=cliente&p=<?=$arrayPagina['paginaAtras']?>"><i class="material-icons">chevron_left</i></a></li>
<?php
					for($i = 1; $i<=$arrayPagina['totalpaginas']; $i++){
						$activo = "waves-effect";						 
						if($arrayPagina == $i){
							$activo = "active";
						}
						
?>
					<li class="<?=$activo?>"><a href="sistema.php?r=cliente&p=<?=$i?>"><?=$i?></a></li>
<?php
					}
?>
					<li class="waves-effect"><a href="sistema.php?r=cliente&p=<?=$arrayPagina['paginaSiguiente']?>"><i class="material-icons">chevron_right</i></a></li>
				</ul>			
			</td>
		</tr>
		</tbody>
	  </table>		

</div>

	<!-- Modal Structure -->
	<div id="modal1" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4>Ingresar Clientes</h4>
			<form method="POST" action="sistema.php?r=cliente" class="col s12">
					<div class="row">
						<div class="input-field col s4">
							<input id="first_name" type="text" class="validate" name="Nombre">
							<label for="first_name">Nombre</label>
						</div>
						<div class="input-field col s5">
							<input id="last_name" type="text" class="validate" name="Apellidos">
							<label for="last_name">Apellidos</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s3">
							<input id="NumeroDocumento" type="text" class="validate" name="NumeroDocumento">
							<label for="NumeroDocumento">NumeroDocumento</label>
						</div>							
						<div class="input-field col s3">
							<input id="fechaNacimiento" type="date" class="validate" name="FechaNacimiento">
							<label for="fechaNacimiento">FechaNacimiento</label>
						</div>
						<div class="input-field col s4">
							<input id="Direccion" type="text" class="validate" name="Direccion">
							<label for="Direccion">Direccion</label>
						</div>
					</div>

					<input type="hidden" name="accion" value="ingresar">
					<button class="btn waves-effect waves-light" type="submit">ingresar
						<i class="material-icons right">send</i>
					</button>
			</form>
		</div>
			<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
		</div>
	</div>
		  