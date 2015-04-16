	 <?php

		 require_once("../../required/class/queries.class.php");

		 $InsertChamp = new GeneralsQueries;

			 $idStatut = @$_POST['operation'];

			 $statut = @$_POST['statut'];


				 if($InsertChamp->EstVide($statut)){

						 echo '<div id="error" class="alert alert-error">L\'information sur le champ obligatoire statut n\'a pas été renseigné !</div>';

				 }


				 else{

					 if(isset($_POST['operation'])){

							 if($_POST['operation']=="0"){

								 $InsertChamp->table = "statuts";

								 $InsertChamp->valeurs = '

									 "",

									 "'.$InsertChamp->Protection($statut).'"

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

						 $InsertChamp->tableMaj = "statuts";

						 $InsertChamp->critere = "idStatut = ".$idStatut." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 statut = "'.$InsertChamp->Protection($statut).'"

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

