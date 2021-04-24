<?php 
	session_start();

		// SESION
	function logged_in(){
		if(isset($_SESSION['success'])){
			return true;
		}
		// SESSION END
	}

 ?>