	 <?php

		 $loader = new GeneralsQueries;

		 $loader->champs="*";

		 $loader->table="statuts";

		 $loader->valeurs="1";

		 $res =$loader->Select();

		 $loader->table="statuts";

		 $resListCol = $loader->SelectColumn();

	 ?>

