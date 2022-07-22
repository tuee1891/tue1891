<?php

	require_once("modelos/administradores_modelo.php");
	$estado = "";
	$mail = isset($_POST['mail'])?$_POST['mail']:"";
	$clave = isset($_POST['clave'])?$_POST['clave']:"";

	if($mail !="" && $clave !=""){
		
		$objAdministradores = new administradores_modelo;
		$respuesta = $objAdministradores->validarLogin($mail,$clave);
		
		if(isset($respuesta[0]['id']) && $respuesta[0]['id'] !=""){
			
			
			@session_start();
			$_SESSION['fecha'] = date("Y-m-a");
			$_SESSION['nombre'] = $respuesta[0]['nombre'];
			$_SESSION['mail'] = $respuesta[0]['mail'];
			header('Location: sistema.php');

		}else{
			$estado = "Error";
		}
	}
?>

<!DOCTYPE html>
  <html>
	<head>
	  <!--Import Google Icon Font-->
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <!--Import materialize.css-->
	  <link type="text/css" rel="stylesheet" href="web/css/materialize.css"  media="screen,projection"/>

	  <!--Let browser know website is optimized for mobile-->
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style>
			body {
				display: flex;
				min-height: 100vh;
				flex-direction: column;
			}
			main {
				flex : 1 0 auto;
			}
			table.striped > tbody > tr:nth-child(odd) {
				background-color: rgba(252, 169, 248, 0.7);
				}	

		</style>

	</head>

	<body>	

		<nav>
			<div class="nav-wrapper #ea80fc purple accent-1">
				<a href="#!" class="brand-logo center purple-text text-lighten-4">Beautiful.me </a>
			</div>
		</nav>

		<main>
			<div class="container">
				<div>
					<h3 class="center-align">Login</h3>
				</div>
				<div>
				<?php if($estado == "Error"){ ?>
					<div class="red lighten-4 valign-wrapper" style="height:50px">
						<h5 class="center-align" style="width:100%">
							Error en el usuario y/o Clave
						</h5>
					</div>
				<?PHP } ?>

					<form method="POST" action="login.php" class="col s12">
						<div class="row">
							<div class="input-field col s12 m12 l4 offset-l4">
								<input id="first_name" type="text" class="validate" name="mail">
								<label for="first_name">Mail</label>
							</div>

						</div>
						<div class="row">
							<div class="input-field col s12 m12 l4 offset-l4">
								<input id="last_name" type="password" class="validate" name="clave">
								<label for="last_name">Clave</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 l4 offset-l4">
								<input type="hidden" name="accion" value="ingresar">
								<button class="btn waves-effect waves-light center-align" type="submit">Entrar
									<i class="material-icons right">send</i>
								</button>
							</div>
						</div>					
					</form>
				</div>
			</div>
		</main>


	  
		<footer class="page-footer #ea80fc purple accent-1">
		  <div class="footer-copyright">
			<div class="container grey-text text-darken-4">
				© 2022 Copyright Text
				<a class="grey-text text-darken-4 right" href="index.php?r=contactenos">Contactenos</a>
			</div>
		  </div>
		</footer>

		  <!--JavaScript at end of body for optimized loading-->
		  <script type="text/javascript" src="web/js/materialize.js"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				M.AutoInit();
			})        

		</script>
	</body>	
</html>