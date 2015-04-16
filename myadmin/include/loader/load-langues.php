	 <?php

		 $loader = new GeneralsQueries;

		 $loader->champs="*";

		 $loader->table="langues";

		 $loader->valeurs="1";

		 $res =$loader->Select();

		 $loader->table="langues";

		 $resListCol = $loader->SelectColumn();

	 ?>

