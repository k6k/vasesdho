	 <?php

		 require_once("../../required/class/queries.class.php");

		 $InsertChamp = new GeneralsQueries;

			 $idLangues = @$_POST['operation'];

			 $langues = @$_POST['langues'];


				 if($InsertChamp->EstVide($langues)){

						 echo '<div id="error" class="alert alert-error">L\'information sur le champ obligatoire langues n\'a pas été renseigné !</div>';

				 }


				 else{

					 if(isset($_POST['operation'])){

							 if($_POST['operation']=="0"){

								 $InsertChamp->table = "langues";

								 $InsertChamp->valeurs = '

									 "",

									 "'.$InsertChamp->Protection($langues).'"

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

						 $InsertChamp->tableMaj = "langues";

						 $InsertChamp->critere = "idLangues = ".$idLangues." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 langues = "'.$InsertChamp->Protection($langues).'"

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

