	 <?php

		 $loader = new GeneralsQueries;

		 $loader->champs="*";

		 $loader->table="typemedia";

		 $loader->valeurs="1";

		 $res =$loader->Select();

		 $loader->table="typemedia";

		 $resListCol = $loader->SelectColumn();

	 ?>

