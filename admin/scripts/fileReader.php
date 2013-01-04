<?php
class fileReader{
    private $dir;
    private $dirPath;
    private $archivos;

    public function fileReader( $dir, $dirPath ){
        $this->dir     = $dir;
        $this->dirPath = $dirPath;
    }

    public function read(){
        
        $directorio = opendir($this->dir);
        while ($archivo = readdir($directorio)) {  

            if ( ($archivo == "." || $archivo == ".." || $archivo == ".htaccess" || $archivo == "thumbnail" ) ){ 
                echo " "; 
            } else {  
                $this->archivos[$archivo] = $archivo; 
            } 

        }   

        return $this->archivos; 

    }

    public function formatBytes( $numberBytes ){

        if ($numberBytes < 1024) {
            return $numberBytes .' B';
        } elseif ($numberBytes < 1048576) {
            return round($numberBytes / 1024, 2) .' KiB';
        } elseif ($numberBytes < 1073741824) {
            return round($numberBytes / 1048576, 2) . ' MiB';
        }

    }
}

?>