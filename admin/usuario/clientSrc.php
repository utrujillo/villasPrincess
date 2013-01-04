<?php
	include_once("../scripts/conecta.inc.php");
    $conexion = new Conexion();

    $user = $_GET['term'];

	$sql = "SELECT idUsuario, concat(nombre,' ',apellidoPaterno,' ',apellidoMaterno) as nombreCompleto FROM usuario_tbl 
				WHERE concat(nombre,' ',apellidoPaterno,' ',apellidoMaterno) LIKE '%". $user ."%' AND nivelAcceso = 'A' ";

	
	$data = $conexion->consulta($sql);

	while( $row = $data->fetch_array(MYSQLI_ASSOC) ){
		
		// $nombreCompleto = ;
		
		$array[] = array(
				'id'    => $row['idUsuario'],
				'value' => $row['nombreCompleto'],
				'label' => $row['nombreCompleto']
			);

	}


	echo json_encode( $array );
?>