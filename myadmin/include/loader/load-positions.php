	 <?php

		 $loader = new GeneralsQueries;

		 $loader->champs="*";

		 $loader->table="positions";

		 $loader->valeurs="1";

		 $res =$loader->Select();

		 $loader->table="positions";

		 $resListCol = $loader->SelectColumn();

	 ?>

