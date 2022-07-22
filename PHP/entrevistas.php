<?php

    echo("<h1>Yo me llamo Milton </h1>");
    $vartextoOriginal = "Yo me llamo Milton";
    $varArrayTexto = str_split($vartextoOriginal);

    $total = count($varArrayTexto) - 1;
    print_r($varArrayTexto);

    $arrayInverso = array();

    foreach($varArrayTexto as $clave => $letra){

        print_r("clave:".$clave);
        print_r("letra:".$letra);
        print_r("<br>");

        $arrayInverso[$total - $clave] = $letra;
    }
    print_r($arrayInverso);
    $arrayAuxiliar = array();
    $claveChica = $total;
    for($i = 0; $i<$total; $i++){

            foreach($arrayInverso as $claveDos => $letraDos){

                if ($claveDos <= $claveChica){
                    $claveChica = $claveDos;
                    $letraGuardar = $letraDos;
                    }
                
            }
            unset($arrayInverso[$claveChica]);
            $arrayAuxiliar[] = $letraGuardar;
            
    }
            print_r($arrayAuxiliar);





?>