<?php
	
	@session_start();

	if(isset($_SESSION['nombre'])){

	}else{
		header('Location: login.php');
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
				<a href="#!" class="brand-logo center purple-text text-lighten-4">Beautiful.me</a>
				<ul class="right hide-on-med-and-down">
					<li>
						<a class="purple-text text-accent-4" href="sistema.php?r=cosmeticos">Cosmeticos</a>
					</li>
					<li>
						<a class="purple-text text-accent-4" href="sistema.php?r=cliente">Clientes</a>
					</li>
					<li>
						<a class="purple-text text-accent-4" href="sistema.php?r=carrito">Carrito</a>
					</li>

			<!-- Dropdown Trigger -->
					<li>
						<a class="dropdown-trigger" href="#!" data-target="dropdown1">
							<i class="material-icons right purple-text text-lighten-5">settings</i>
						</a>
					</li>
					<li>&nbsp&nbsp&nbsp&nbsp</li>
				</ul>
			</div>
		</nav>		
		<!--  Menú del boton -->
		<ul id="dropdown1" class="dropdown-content">
			<li>
				<a class="purple-text text-accent-4" href="#!">Usuarios</a>
			</li>
			<li>
				<a class="purple-text text-accent-4" href="#!">Perfil</a>
			</li>
			<li class="divider"></li>
			<li>
				<a class="purple-text text-accent-4" href="logout.php">Salir</a> 
			</li>
		</ul>

		<main>
			<div class="container">

			<h5><?=$_SESSION['nombre']?></h5>
			<?PHP include ("router.php"); ?>

			</div>
		</main>
	
			<div class="fixed-action-btn hide-on-large-only">
			<a class="btn-floating btn-large red">
				<i class="large material-icons">add</i>
			</a>
			<ul>
				<li><a class="btn-floating red"href="sistema.php?r=cosmeticos"><i class="material-icons">store</i></a></li>
				<li><a class="btn-floating yellow darken-1" href="sistema.php?r=accesorios"><i class="material-icons">loyalty</i></a></li>
				<li><a class="btn-floating green" href="sistema.php?r=contactenos"><i class="material-icons">contact_phone</i></a></li>
				<li><a class="btn-floating blue" href="sistema.php?r=carrito"><i class="material-icons">local_grocery_store</i></a></li>
			</ul>
			</div>
	  
		<footer class="page-footer #ea80fc purple accent-1">
		  <div class="footer-copyright">
			<div class="container grey-text text-darken-4">
				© 2022 Copyright Text
				<a class="grey-text text-darken-4 right" href="sistema.php?r=contactenos">Contactenos</a>
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
		

