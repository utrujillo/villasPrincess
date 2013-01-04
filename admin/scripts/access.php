<?php
class Access{
	private $bValid = 0;
	public function Access($level){

		session_start();
		$vars = explode(",",$level);
		
		if( isset( $_SESSION['authorized'] ) ){
			foreach($vars as $permiso){
					$this->checkAcess($permiso);		
			}
			
			if($this->bValid == 0)
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=restricted.html">';	
		}else
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.html">';
	}
	
	public function checkAcess($toCheck){
		session_start();
		if($_SESSION['tipou'] == $toCheck)
			$this->bValid++;
	}
}
?>