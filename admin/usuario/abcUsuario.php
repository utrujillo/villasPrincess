
<?php
        header('Content-Type: text/html; charset=UTF-8'); 
        include_once("../scripts/conecta.inc.php");
        $conexion = new Conexion();


        
        $abc               = $_POST["abc"];
        $idUsuario         = $_POST["idUsuario"];
        
        $nombre            = ucwords( $_POST["nombre"] );
        $apellidoPaterno   = ucwords( $_POST["apellidoPaterno"] );
        $apellidoMaterno   = ucwords( $_POST["apellidoMaterno"] );
        
        $usuario           = $_POST["usuario"];
        $password          = md5( trim( $_POST["password"] ) );
        $correoElectronico = $_POST["correoElectronico"];
        $telefono          = $_POST["telefono"];
        $noPropiedad       = $_POST["noPropiedad"];

        ( isset($_POST["nivelAcceso"]) )?( $nivelAcceso = $_POST["nivelAcceso"] ):( $nivelAcceso = 'A' );

        $sql = "";

        if( $abc == "a" ){


                $sql = "INSERT INTO usuario_tbl(nombre, apellidoPaterno, apellidoMaterno, usuario, password, nivelAcceso, correoElectronico, telefono, noPropiedad, fechaCreado) 
                        VALUES('". $nombre ."','". $apellidoPaterno ."', '". $apellidoMaterno ."', '". $usuario ."', '". $password ."', '". $nivelAcceso ."', '". $correoElectronico ."', '". $telefono ."', '". $noPropiedad ."', NOW() )";

        }

        if( $abc == "b" ){
                
                $sql = "UPDATE usuario_tbl set estatus = '0' WHERE idUsuario = ". $idUsuario;        
                
        }


        if( $abc == "c" ){

                $sql = "UPDATE usuario_tbl SET nombre = '". $nombre ."', apellidoPaterno = '". $apellidoPaterno ."', apellidoMaterno = '". $apellidoMaterno ."', usuario = '". $usuario ."',
                                nivelAcceso = '". $nivelAcceso ."', correoElectronico = '". $correoElectronico ."', telefono = '". $telefono ."', noPropiedad = '". $noPropiedad ."' 
                                WHERE idUsuario = ". $idUsuario;

        }

        if( $abc == "d" ){

                $sql = "UPDATE usuario_tbl SET password = '". $password ."' WHERE idUsuario = ". $idUsuario;

        }

        
        if( $conexion->consulta( $sql ) )
                echo "Tu transaccion ha sido completada";               


?>