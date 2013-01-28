<?php
session_start();
include_once("conecta.inc.php");

class login extends Conexion{
	private $user;
	private $pass;
	private $query = NULL;
	
	public function __construct($usu, $pwd){

		$this->user = trim($usu);
		$this->pass = md5(trim($pwd));

		if( !isset($this->conexion) )
			$this->conexion();
	}
	
	public function validarUsuario(){
		
		$sqlFind = "SELECT * FROM usuario_tbl WHERE usuario = '". $this->user ."' AND estatus = '1' ";
		
		$dataFind = $this->consulta( $sqlFind );
		$MAX = mysqli_num_rows( $dataFind );
		
		if( $MAX > 0){

			$rowFind = $dataFind->fetch_array( MYSQLI_ASSOC );

			if( $this->pass == $rowFind["password"] ){
				
				$nombreUsuario = utf8_decode( $rowFind["nombre"] ." ". $rowFind["apellidoPaterno"] ." ". $rowFind["apellidoMaterno"] );
				$this->iniciarSesion($rowFind["idUsuario"], $nombreUsuario, $rowFind["nivelAcceso"] );

			}else{

				$arrayItem = array(
						'status' => 'error',
						'message' => 'Contraseña Incorrecta'
					);

					echo json_encode( $arrayItem );
			}

		}else{
			
			$arrayItem = array(
						'status' => 'error',
						'message' => 'El Usuario no existe'
					);
					
					echo json_encode( $arrayItem );
		}
		

			// $msg = 'access|u';
		
		// return $msg;
	}//function iniciaSesion()
	
	private function iniciarSesion($idUser, $nomUser, $tipUser){

		$_SESSION['authorized'] = true;
		$_SESSION['iduser']     = $idUser;
		$_SESSION['nombre']     = $nomUser;
		$_SESSION['tipou']      = $tipUser;

		$pathAccess = "init.php";		

		$arrayItem = array(
						'status' => 'bien',
						'init' => $pathAccess
					);

					echo json_encode( $arrayItem );

	}
	
	public function __destruct(){
		$this->user;
		$this->pass;
		$this->query;
	}
	
}

?>