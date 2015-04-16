	 <?php

		 require_once("../../required/class/queries.class.php");

		 $InsertChamp = new GeneralsQueries;

			 $idTypeMedia = @$_POST['operation'];

			 $nomMedia = @$_POST['nomMedia'];


				 if($InsertChamp->EstVide($nomMedia)){

						 echo '<div id="error" class="alert alert-error">L\'information sur le champ obligatoire nomMedia n\'a pas été renseigné !</div>';

				 }


				 else{

					 if(isset($_POST['operation'])){

							 if($_POST['operation']=="0"){

								 $InsertChamp->table = "typemedia";

								 $InsertChamp->valeurs = '

									 "",

									 "'.$InsertChamp->Protection($nomMedia).'"

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

						 $InsertChamp->tableMaj = "typemedia";

						 $InsertChamp->critere = "idTypeMedia = ".$idTypeMedia." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 nomMedia = "'.$InsertChamp->Protection($nomMedia).'"

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

