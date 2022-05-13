<?php
    $soyVariable = 10;
    // con // Escribimos comentarios y no se interpreta
    // echo ($soyVariable);
    $varTexto = "Soy un texto en php";
    var_dump($soyVariable);
    // muestra los datos de la variable (cantidad, tipo)
    var_dump($varTexto);
    // definimos una variable de tipo real
    $varReal = 12.13;
    var_dump($varReal);
    // ________________________________________________________________________
    // definimos varibled e tipo Booleanas
    $varBolean = False;
    var_dump($varBolean);
    // solo muestra si es true
    print_r($varBolean);
    // no muestra nada
    echo($varBolean);
    // ________________________________________________________________________
    // Definimos una Variable de tipo array
    // ejemplo de array asociativo
    $arrayVar = array("Primero"=>"Uno", "Segundo"=>"Dos");
    var_dump($arrayVar);
    print_r($arrayVar);
    // Espacio
    echo ("<br>")
    // Ejemplo de array Numerado
    $varArrayNum = array("uno","dos","tres");
    var_dump($varArrayNum);
    print_r($varArrayNum);

?>


<html>
    <head>
    </head>
    <body>
        <br><br>
        Hola HTML
        <br>
        <?php echo ("Soy PHP") ?>
        <br>
        <?= $soyVariable?>
    </body>
</html>


