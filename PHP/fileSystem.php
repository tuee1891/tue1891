<?php

$archivo = fopen("archivos/archivo.txt", "a+");

fwrite($archivo, "Hola soy un texto \n ");

fclose($archivo);

echo("Finalice");

?>
