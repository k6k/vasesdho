	 <?php

		 require_once("../../required/class/queries.class.php");

		 $InsertChamp = new GeneralsQueries;

			 $idagenda = @$_POST['operation'];

			 $titre = @$_POST['titre'];

			 $categorie_id = @$_POST['categorie_id'];

			 $heure = @$_POST['heure'];

			 $date = @$_POST['date'];

			 $mois = @$_POST['mois'];


				 if($InsertChamp->EstVide($titre)){

						 echo '<div id="error" class="alert alert-error">L\'information sur le champ obligatoire titre n\'a pas été renseigné !</div>';

				 }


				 elseif($InsertChamp->EstVide($categorie_id)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire categorie_id n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($heure)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire heure n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($date)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire date n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($mois)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire mois n\'a pas été renseigné!</div>';

				 }


				 else{

					 if(isset($_POST['operation'])){

							 if($_POST['operation']=="0"){

								 $InsertChamp->table = "agenda";

								 $InsertChamp->valeurs = '

									 "",

									 "'.$InsertChamp->Protection($titre).'",

									 "'.$InsertChamp->Protection($categorie_id).'",

									 "'.$InsertChamp->Protection($heure).'",

									 "'.$InsertChamp->Protection($date).'",

									 "'.$InsertChamp->Protection($mois).'"

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

						 $InsertChamp->tableMaj = "agenda";

						 $InsertChamp->critere = "idagenda = ".$idagenda." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 titre = "'.$InsertChamp->Protection($titre).'",

								 categorie_id = "'.$InsertChamp->Protection($categorie_id).'",

								 heure = "'.$InsertChamp->Protection($heure).'",

								 date = "'.$InsertChamp->Protection($date).'",

								 mois = "'.$InsertChamp->Protection($mois).'"

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

