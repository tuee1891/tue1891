
<?php

	if(isset($_GET['r']) && !Empty($_GET['r']) && $_GET['r'] != ""){

		$ruta = $_GET['r'];

		echo("El parametro es:".$ruta);

		if($ruta == "cosmeticos"){
			include("vistas/cosmeticos.php");
		}
		if($ruta == "cliente"){
			include("vistas/cliente.php");
		}
		if($ruta == "contactenos"){
			include("vistas/contactenos.php");
		}	
		if($ruta == "carrito"){
			include("vistas/carrito.php");
		}

	}else{

		echo("NO HAY PARAMETROS");
	}


?>