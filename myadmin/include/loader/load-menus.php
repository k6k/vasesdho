	 <?php

		 $loader = new GeneralsQueries;

		 $loader->champs="*";

		 $loader->table="menus";

		 $loader->valeurs="1";

		 $res =$loader->Select();

		 $loader->table="menus";

		 $resListCol = $loader->SelectColumn();

	 ?>

