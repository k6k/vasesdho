	 <?php

		 require_once("../../required/class/queries.class.php");

		 $InsertChamp = new GeneralsQueries;

			 $idMenu = @$_POST['operation'];

			 $textMenu = @$_POST['textMenu'];

			 $liensMenu = @$_POST['liensMenu'];

			 $lang_id = @$_POST['lang_id'];

			 $icone = @$_POST['icone'];

			 $positions_idPosition = @$_POST['positions_idPosition'];


				 if($InsertChamp->EstVide($textMenu)){

						 echo '<div id="error" class="alert alert-error">L\'information sur le champ obligatoire textMenu n\'a pas été renseigné !</div>';

				 }


				 elseif($InsertChamp->EstVide($liensMenu)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire liensMenu n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($lang_id)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire lang_id n\'a pas été renseigné!</div>';

				 }


				 else{

					 if(isset($_POST['operation'])){

							 if($_POST['operation']=="0"){

								 $InsertChamp->table = "menus";

								 $InsertChamp->valeurs = '

									 "",

									 "'.$InsertChamp->Protection($textMenu).'",

									 "'.$InsertChamp->Protection($liensMenu).'",

									 "'.$InsertChamp->Protection($lang_id).'",

									 "'.$InsertChamp->Protection($positions_idPosition).'",

									 "'.$InsertChamp->Protection($icone).'"

									 ';

								 $insertion = $InsertChamp->Insert();

									 if($insertion){

										  $ins=1;

										  echo'<div id="resultat" class="alert alert-success">L\'insertion a été éffectuée avec succès !</div> ';

									  }else{

										  $ins=2;

										  echo '<div id="error" class="alert alert-error"> Une Erreur s\'est produite lors de l\'insertion ! </div>  ';

									  }

							 }else{

						 $InsertChamp->tableMaj = "menus";

						 $InsertChamp->critere = "idMenu = ".$idMenu." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 textMenu = "'.$InsertChamp->Protection($textMenu).'",

								 liensMenu = "'.$InsertChamp->Protection($liensMenu).'",

								 lang_id = "'.$InsertChamp->Protection($lang_id).'",

								 positions_idPosition = "'.$InsertChamp->Protection($positions_idPosition).'",

								 icone = "'.$InsertChamp->Protection($icone).'"

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

