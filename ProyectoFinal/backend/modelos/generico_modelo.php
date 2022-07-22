<?php

class generico_modelo{

    protected function ejecutarConsulta($sql, $arraySQL){

        // String conexion a la base de datos
        $srtConexion 	= "mysql:host=localhost;dbname=curso_2123";
        // Credenciales
        $usuario 		= "root";
        $clave 			= "";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
        ];
        $conexion 	= new PDO($srtConexion, $usuario, $clave, $options); 		
        $preparo 	= $conexion->prepare($sql);
        $preparo	->execute($arraySQL);
        $lista 		= $preparo->fetchAll();
        return $lista;

    }

    protected function persistirConsulta($sqlInsert, $arrayInsert){

        // String conexion a la base de datos
        $srtConexion 	= "mysql:host=localhost;dbname=curso_2123";
        // Credenciales
        $usuario 		= "root";
        $clave 			= "";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
        ];
        $conexion 	= new PDO($srtConexion, $usuario, $clave, $options); 
    
        $preparo 	= $conexion->prepare($sqlInsert);
        $respuesta	= $preparo->execute($arrayInsert);	

    }

    public function validarPost($nombreParametro, $default =""){

        $retorno = isset($_POST[$nombreParametro])?$_POST[$nombreParametro]:$default;
        return $retorno;
    }


    public function paginador($numPagina){
        
        //Valido si el $numPagina es un numero
        if(!is_numeric($numPagina)){		
            // en caso de noser un numero le asigno el numero 1
            $numPagina = 1;
        }

        $paginaAtras = $numPagina - 1;
        // valido si pagina atras es menor a 1
        if($paginaAtras < 1){
            // en caso de que sea menor le asigno el valor 1
            $paginaAtras	= 1;
            $numPagina		= 1;
        }
        //primero obtengo el total de registros
        $totalRegistros = $this->totalRegistros();
        // Despues sacamos la cuenta de cuantas paginas tenemos.
        //Con la funcion CEIL($var)	siempre redondeamos para arriba el resultado
        $totalpaginas = ceil(($totalRegistros/5));
        // le sumamos a la pagina actual +1 para indicar la pagina siguiente
        $paginaSiguiente = $numPagina + 1;

        if($paginaSiguiente >= $totalpaginas){
            //si supera el maximo de paginas ponemos el maximo de pagina
            $paginaSiguiente = $totalpaginas;

        }
        $arrayPagina = array(
                            "paginaAtras"		=>$paginaAtras,
                            "Pagina"			=>$numPagina,
                            "paginaSiguiente"	=>$paginaSiguiente,
                            "totalpaginas"		=>$totalpaginas);

                        return $arrayPagina;
                        }

    
}

?>