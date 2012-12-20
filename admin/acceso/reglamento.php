<?php
    include_once("../scripts/fileReader.php");
    $dir        = '../fileUploader/server/reglamento/files/';
    $dirPath    = 'fileUploader/server/reglamento/files/';
    $fileReader = new fileReader($dir, $dirPath);
    $archivos   = $fileReader->read();  

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
    		foreach($archivos as $archivo): 
    			$path = $dirPath.$archivo;
    	?>
	    	
	    	<tr>
	    		<td><?php echo $archivo; ?></td>
	    		<td><?php echo $fileReader->formatBytes( filesize($dir.$archivo) ); ?></td>
	    		
	    		<td class="txtCenter">
	    			<a href="<?php echo $path; ?>" class="btn btn-villa"><i class="icon-download-alt icon-white"></i>&nbsp;Descargar</a>
	    		</td>
	    	</tr>

    	<?php endforeach; ?>
    </tbody>
</table>
    