	 <?php

		 require_once("../../required/class/queries.class.php");

		 $InsertChamp = new GeneralsQueries;

			 $idSousMenu = @$_POST['operation'];

			 $subMenu = @$_POST['subMenu'];

			 $menus_idMenu = @$_POST['menus_idMenu'];

			 $menulink = @$_POST['menulink'];


				 if($InsertChamp->EstVide($subMenu)){

						 echo '<div id="error" class="alert alert-error">L\'information sur le champ obligatoire subMenu n\'a pas été renseigné !</div>';

				 }


				 elseif($InsertChamp->EstVide($menus_idMenu)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire menus_idMenu n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($menulink)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire menulink n\'a pas été renseigné!</div>';

				 }


				 else{

					 if(isset($_POST['operation'])){

							 if($_POST['operation']=="0"){

								 $InsertChamp->table = "sousmenu";

								 $InsertChamp->valeurs = '

									 "",

									 "'.$InsertChamp->Protection($subMenu).'",

									 "'.$InsertChamp->Protection($menus_idMenu).'",

									 "'.$InsertChamp->Protection($menulink).'"

									 ';

								 $insertion = $InsertChamp->Insert();

									 if($insertion){

										  $ins=1;

										  echo'<div id="resultat" class="alert alert-success">L\'insertion a été éffectuée avec succès !</div>';

									  }else{

										  $ins=2;

										  echo '<div id="error" class="alert alert-error"> Une Erreur s\'est produite lors de l\'insertion ! </div>  ';

									  }

							 }else{

						 $InsertChamp->tableMaj = "sousmenu";

						 $InsertChamp->critere = "idSousMenu = ".$idSousMenu." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 subMenu = "'.$InsertChamp->Protection($subMenu).'",

								 menus_idMenu = "'.$InsertChamp->Protection($menus_idMenu).'",

								 menulink = "'.$InsertChamp->Protection($menulink).'"

								  ';

						 $MAJ = $InsertChamp->Update();

									 if($MAJ){

										  $ins=3;

										   echo '<div id="resultat" class="alert alert-success">La mise à jour  a été éffectuée avec succès !</div>';

									  }else{

										  $ins=4;

										  echo '<div id="error" class="alert alert-error"> Une Erreur s\'est produite lors de la Mise à jour ! </div>  ';

									  }

							 }

					 }

					 

				 }

	 ?>

