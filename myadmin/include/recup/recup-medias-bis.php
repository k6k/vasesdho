	 <?php

		 require_once("../../required/class/queries.class.php");

		 $InsertChamp = new GeneralsQueries;

			 $idMedia = @$_POST['operation'];

			 $thematique = @$_POST['thematique'];

			 $dateCreation = date('d-m-Y');

			 $autheur = @$_POST['autheur'];

			 $location = @$_POST['location'];

			 $location =  preg_replace('/([^.a-z0-9]+)/i', '_', $location);

			 $titreMedia = @$_POST['titreMedia'];

			 $description = @$_POST['description'];

			 $liensMedia = @$_POST['liensMedia'];

			 $typeMedia_idTypeMedia = @$_POST['typeMedia_idTypeMedia'];


				 if($InsertChamp->EstVide($thematique)){

						 echo '<div id="error" class="alert alert-error">L\'information sur le champ obligatoire thematique n\'a pas été renseigné !</div>';

				 }


				 elseif($InsertChamp->EstVide($titreMedia)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire titreMedia n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($description)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire description n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($typeMedia_idTypeMedia)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire typeMedia_idTypeMedia n\'a pas été renseigné!</div>';

				 }


				 else{

					 if(isset($_POST['operation'])){

							 if($_POST['operation']=="0"){

								 $InsertChamp->table = "medias";

								 $InsertChamp->valeurs = '

									 "",

									 "'.$InsertChamp->Protection($thematique).'",

									 "'.$InsertChamp->Protection($dateCreation).'",

									 "'.$InsertChamp->Protection($autheur).'",

									 "'.$InsertChamp->Protection($titreMedia).'",

									 "'.$InsertChamp->Protection($description).'",

									 

									 "'.$InsertChamp->Protection($liensMedia).'",

									 "'.$InsertChamp->Protection($typeMedia_idTypeMedia).'",

									 "'.$InsertChamp->Protection($location).'"

									 ';

								 $insertion = $InsertChamp->Insert_Id();

									 if($insertion){

										  $ins=1;

										  echo'<div id="resultat" class="alert alert-success">L\'insertion a été éffectuée avec succès !</div>#'.$insertion;

									  }else{

										  $ins=2;

										  echo '<div id="error" class="alert alert-error"> Une Erreur s\'est produite lors de l\'insertion ! </div>  ';

									  }

							 }else{

						 $InsertChamp->tableMaj = "medias";

						 $InsertChamp->critere = "idMedia = ".$idMedia." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 thematique = "'.$InsertChamp->Protection($thematique).'",

								 dateCreation = "'.$InsertChamp->Protection($dateCreation).'",

								 autheur = "'.$InsertChamp->Protection($autheur).'",

								 titreMedia = "'.$InsertChamp->Protection($titreMedia).'",

								 description = "'.$InsertChamp->Protection($description).'",

								 liensMedia = "'.$InsertChamp->Protection($liensMedia).'",

								 typeMedia_idTypeMedia = "'.$InsertChamp->Protection($typeMedia_idTypeMedia).'"

								  ';

						 $MAJ = $InsertChamp->Update();

									 if($MAJ){

										  $ins=3;

										   echo '<div id="resultat" class="alert alert-success">La mise à jour  a été éffectuée avec succès !</div>#'.$idMedia;

									  }else{

										  $ins=4;

										  echo '<div id="error" class="alert alert-error"> Une Erreur s\'est produite lors de la Mise à jour ! </div>  ';

									  }

							 }

					 }

					 

				 }

	 ?>

