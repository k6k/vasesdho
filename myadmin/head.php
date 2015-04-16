<?php 
	session_start();
	
	 if(isset($_SESSION['appUserName'])){
	 }
	 else{
	 	echo '<script type="text/javascript">document.location.href="index.php"</script>';
	 }
 ?>