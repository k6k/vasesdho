	 <?php

		 require_once("../../required/class/queries.class.php");

		 $InsertChamp = new GeneralsQueries;

			 $idMedia = @$_POST['operation'];

			 $thematique = @$_POST['thematique'];

			 $dateCreation = date('d-m-Y');

			 $autheur = @$_POST['autheur'];

			 $titreMedia = @$_POST['titreMedia'];

			 $description = @$_POST['description'];

			 $liensMedia = @$_POST['liensMedia'];

			 $categories_idCategorie = @$_POST['categories_idCategorie'];

			 $vignette = @$_POST['vignette'];

			 $typeMedia_idTypeMedia = @$_POST['typeMedia_idTypeMedia'];

			 $chemin = @$_POST['chemin'];

			 $duree = @$_POST['duree'];


				if($InsertChamp->EstVide($autheur)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire autheur n\'a pas été renseigné!</div>';

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


				 elseif($InsertChamp->EstVide($chemin)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire chemin n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($duree)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire duree n\'a pas été renseigné!</div>';

				 }

				 elseif($InsertChamp->EstVide($categories_idCategorie)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire Catégorie n\'a pas été renseigné!</div>';

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

									 "'.$InsertChamp->Protection($chemin).'",

									 "'.$InsertChamp->Protection($duree).'",

									 "'.$InsertChamp->Protection($categories_idCategorie).'",

									 "'.$InsertChamp->Protection($vignette).'"

									 ';

									 $insertion = $InsertChamp->Insert();

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

								 typeMedia_idTypeMedia = "'.$InsertChamp->Protection($typeMedia_idTypeMedia).'",

								 chemin = "'.$InsertChamp->Protection($chemin).'",

								 categorie = "'.$InsertChamp->Protection($categories_idCategorie).'",

								 vignette = "'.$InsertChamp->Protection($vignette).'",

								 duree = "'.$InsertChamp->Protection($duree).'"

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

