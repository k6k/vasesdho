	 <?php

		 $loader = new GeneralsQueries;

		 $loader->champs="*";

		 $loader->table="categories";

		 $loader->valeurs="1";

		 $res =$loader->Select();

		 $loader->table="categories";

		 $resListCol = $loader->SelectColumn();

	 ?>

