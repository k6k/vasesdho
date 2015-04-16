<?php 

		$images=glob('myadmin/upload/images/caravane_de_la_foi/*.{jpg,png,gif}', GLOB_BRACE);
		/*var_dump($images);*/

		echo "<ul>";
		for ($i=0; $i < sizeof($images); $i++) { 
			# code...
			echo '<li>'.$images[$i].'</li>';
		}
		echo "<ul>";
 ?>
