<table role="presentation" class="table table-striped">
    <thead>
        <tr>
            <th>Archivo</th>
            <th>Tama&ntilde;o</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody class="files">
    	<?php 
       		include_once("../scripts/fileReader.php");
            
            $dir        = '../fileUploader/server/estadoCuenta/files/'. $_POST['id'] .'/'  ;
            $dirPath    = 'fileUploader/server/estadoCuenta/files/'. $_POST['id'] .'/';
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
	    			<a href="scripts/download.php<?php echo "?f=". $archivo ."&folder=estadoCuenta&item=". $_POST['id'] ." " ?>" class="btn btn-villa" data-original-title="Descargar Archivo" data-placement="left" rel="tooltip" >
                        <i class="icon-download-alt icon-white"></i>&nbsp;Descargar
                    </a>            
	    		</td>
	    	</tr>

    	<?php  endforeach; 
            endif;
       	?>
    </tbody>
</table>