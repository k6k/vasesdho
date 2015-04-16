	 <?php

		 $loader = new GeneralsQueries;

		 $loader->champs="*";

		 $loader->table="articles";

		 $loader->valeurs="1";

		 $res =$loader->Select();

		 $loader->table="articles";

		 $resListCol = $loader->SelectColumn();

	 ?>

