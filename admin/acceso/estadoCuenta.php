<?php
    include_once("../scripts/access.php"); $Access = new Access("A,S,R");
    include_once("../scripts/fileReader.php");
?>

<table role="presentation" class="table table-striped">
    <thead>
        <tr>
            <th>Archivo</th>
            <th>Tamaño</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody class="files">
    	<?php 
        if( $_SESSION['tipou'] == 'A' ):
            $dir        = '../fileUploader/server/estadoCuenta/files/'. $_SESSION['iduser'] .'/'  ;
            $dirPath    = 'fileUploader/server/estadoCuenta/files/'. $_SESSION['iduser'] .'/';
            
            if( is_dir( $dir ) ):
                $fileReader = new fileReader($dir, $dirPath);
                $archivos   = $fileReader->read();  
                
                if( sizeof( $archivos ) > 0 ):
            		foreach($archivos as $archivo): 
            			$path = $dirPath.$archivo;
    	?>
	    	
	    	<tr>
	    		<td><?php echo $archivo; ?></td>
	    		<td><?php echo $fileReader->formatBytes( filesize($dir.$archivo) ); ?></td>
	    		
	    		<td class="txtCenter">
                    
                    <a href="scripts/download.php<?php echo "?f=". $archivo ."&folder=estadoCuenta&item=". $_SESSION['iduser'] ." " ?>" class="btn btn-villa" data-original-title="Descargar Archivo" data-placement="left" rel="tooltip" >
                        <i class="icon-download-alt icon-white"></i>&nbsp;Descargar
                    </a>                        
	    		</td>
	    	</tr>

    	<?php      endforeach; 
                endif;
            endif;
        elseif( $_SESSION['tipou'] == 'R' || $_SESSION['tipou'] == 'S' ):

            include_once( "../scripts/conecta.inc.php" );
            $conexion = new Conexion();
            
            $dir        = '../fileUploader/server/estadoCuenta/files/';
            $dirPath    = 'fileUploader/server/estadoCuenta/files/';
            $fileReader = new fileReader($dir, $dirPath);
            $archivos   = $fileReader->read();  
            
            if( sizeof( $archivos ) > 0 ):
                foreach($archivos as $archivo): 
                    $path = $dirPath.$archivo;

                $sqlFind = "SELECT idUsuario, concat(nombre,' ',apellidoPaterno,' ', apellidoMaterno) as nombreCompleto FROM usuario_tbl WHERE idUsuario = ". $archivo ." AND estatus = 1 AND nivelAcceso = 'A'";
                $dataFind = $conexion->consulta( $sqlFind );
                $rowFind = $dataFind->fetch_array( MYSQLI_ASSOC );

        ?>
            
            <tr>
                <td><?php echo $rowFind['nombreCompleto']; ?></td>
                <td><?php echo $fileReader->formatBytes( filesize($dir.$archivo) ); ?></td>
                
                <td class="txtCenter">
                    <a href="<?php echo $path; ?>" class="btn btn-villa userEdoCnt" toId="<?php echo $rowFind['idUsuario']; ?>" data-original-title="Ver Estados de cuenta" data-placement="left" rel="tooltip">
                        <i class="icon-file icon-white"></i>&nbsp;Estados de Cuenta
                    </a>
                </td>
            </tr>
        
        <?php endforeach; 
            endif;
        endif;
        ?>
    </tbody>
</table>
    