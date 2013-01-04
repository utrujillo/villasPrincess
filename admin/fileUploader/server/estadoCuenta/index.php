<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

if( isset($_POST["idUsuario"]) ){

	$id = $_POST["idUsuario"];		
	$upload_handler = new UploadHandler( $options = null, $initialize = true, $id );

}else if( isset($_GET["item"]) ){

	$id = $_GET["item"];
	$upload_handler = new UploadHandler( $options = null, $initialize = true, $id );

	}else if( isset( $_GET["folderItem"] ) ){
		$id = $_GET["folderItem"];
		$upload_handler = new UploadHandler( $options = null, $initialize = true, $id );

	}