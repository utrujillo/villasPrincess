<?php
	// $name = $_GET['f'];
	// header("Content-disposition: attachment; filename=$name");
	// header("Content-type: application/octet-stream");
	// readfile($name);
if (!isset($_GET['f']) || empty($_GET['f'])) {
    exit();
}

$folder = $_GET['folder'];

if( isset($_GET['item']) ){

    $root = '../fileUploader/server/'. $folder .'/files/'. $_GET['item'] .'/';

}else{

    $root = '../fileUploader/server/'. $folder .'/files/';

}
$file = basename($_GET['f']);

$path = $root.$file;
$type = '';
 
if (is_file($path)) {
    $size = filesize($path);
    if (function_exists('mime_content_type')) {
        $type = mime_content_type($path);
    } else if (function_exists('finfo_file')) {
        $info = finfo_open(FILEINFO_MIME);
        $type = finfo_file($info, $path);
        finfo_close($info); 
    }
    if ($type == '') {
        $type = "application/force-download";
    }
    // Set Headers
    header("Content-Type: $type");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . $size);
    // Download File
    readfile($path);
} else {
    die("File not exist !!");
}


?>