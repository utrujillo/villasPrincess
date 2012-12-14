<?php
        
        include_once("../scripts/conecta.inc.php");
        $conexion = new Conexion( "villas" );


        $abc             = $_POST["abc"];
        
        $nombre          = ucwords( $_POST["nombre"] );
        $apellidoPaterno = ucwords( $_POST["apellidoPaterno"] );
        $apellidoMaterno = ucwords( $_POST["apellidoMaterno"] );
        
        $usuario         = $_POST["usuario"];
        $password        = md5( trim( $_POST["password"] ) );
        $nivelAcceso     = $_POST["nivelAcceso"];

        $sql = "";

        if( $abc == "a" ){

                $sql = "INSERT INTO usuario_tbl(nombre, apellidoPaterno, apellidoMaterno, usuario, password, nivelAcceso, fechaCreado) 
                        VALUES('". $nombre ."','". $apellidoPaterno ."', '". $apellidoMaterno ."', '". $usuario ."', '". $password ."', '". $nivelAcceso ."', NOW() )";

        }
        
        if( $conexion->consulta( $sql ) )
                echo "Tu transacción ha sido completada";               


?>