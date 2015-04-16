	 <?php

		 $loader = new GeneralsQueries;

		 $loader->champs="*";

		 $loader->table="sousmenu";

		 $loader->valeurs="1";

		 $res =$loader->Select();

		 $loader->table="sousmenu";

		 $resListCol = $loader->SelectColumn();

	 ?>

