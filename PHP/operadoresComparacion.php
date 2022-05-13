<?php
$x = 10;
$y = 5;
$z = 2;
$a = 10;
$b ="10";

// creamos variable para ver comportamiento igualacion
$varIgual1 = $y == $a;
$varIgual2 = $x == $a;
$varIgual3 = $x == $b;
$varIgual4 = $x == $b;

// comparamos la diferencia
$varDif1 = $y != $a;
$varDif2 = $x != $a;
$varDif3 = $x != $b;
$varDif4 = $x != $b;

// comparamos los si mayores o menores
// compprobamos que $y sewa mayor a $x
$varMayor1 = $y > $x;
$varMayor2 = $y < $x;
$varMayor3 = $x > $y;

?>

<html>
    <head>
    </head>
    <body>
        <h1>Operadores</h1>    
        <h3>Resultado var_dump $varIgual1:<?PHP var_dump($varIgual1)?></h3>
        <h3>Resultado var_dump $varIgual2:<?PHP var_dump($varIgual2)?></h3>
        <h3>Resultado var_dump $varIgual3:<?PHP var_dump($varIgual3)?></h3>
        <h3>Resultado var_dump $varIgual4:<?PHP var_dump($varIgual4)?></h3>

        <h3>Resultado var_dump $varDif1:<?PHP var_dump($varDif1)?></h3>
        <h3>Resultado var_dump $varDif2:<?PHP var_dump($varDif2)?></h3>
        <h3>Resultado var_dump $varDif3:<?PHP var_dump($varDif3)?></h3>
        <h3>Resultado var_dump $varDif4:<?PHP var_dump($varDif4)?></h3>

        <h3>Resultado var_dump $varMayor1:<?PHP var_dump($varMayor1)?></h3>
        <h3>Resultado var_dump $varMayor2:<?PHP var_dump($varMayor2)?></h3>
        <h3>Resultado var_dump $varMayor3:<?PHP var_dump($varMayor3)?></h3>

    </body>
</html>




