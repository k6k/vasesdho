	 <?php

		 require_once("../../required/class/queries.class.php");

		 $InsertChamp = new GeneralsQueries;

			 $idSection = @$_POST['operation'];

			 $nomSection = @$_POST['nomSection'];

			 $description = @$_POST['description'];


				 if($InsertChamp->EstVide($nomSection)){

						 echo '<div id="error" class="alert alert-error">L\'information sur le champ obligatoire nomSection n\'a pas été renseigné !</div>';

				 }


				 else{

					 if(isset($_POST['operation'])){

							 if($_POST['operation']=="0"){

								 $InsertChamp->table = "sections";

								 $InsertChamp->valeurs = '

									 "",

									 "'.$InsertChamp->Protection($nomSection).'",

									 "'.$InsertChamp->Protection($description).'"

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

						 $InsertChamp->tableMaj = "sections";

						 $InsertChamp->critere = "idSection = ".$idSection." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 nomSection = "'.$InsertChamp->Protection($nomSection).'",

								 description = "'.$InsertChamp->Protection($description).'"

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

