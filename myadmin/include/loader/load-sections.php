	 <?php

		 $loader = new GeneralsQueries;

		 $loader->champs="*";

		 $loader->table="sections";

		 $loader->valeurs="1";

		 $res =$loader->Select();

		 $loader->table="sections";

		 $resListCol = $loader->SelectColumn();

	 ?>

