	 <?php

		 require_once("../../required/class/queries.class.php");

		 $InsertChamp = new GeneralsQueries;

			 $id_user = @$_POST['operation'];

			 $nom = @$_POST['nom'];

			 $prenom = @$_POST['prenom'];

			 $contact = @$_POST['contact'];

			 $login = @$_POST['login'];

			 $password = @$_POST['password'];

			 $role = @$_POST['role'];


				 if($InsertChamp->EstVide($nom)){

						 echo '<div id="error" class="alert alert-error">L\'information sur le champ obligatoire nom n\'a pas été renseigné !</div>';

				 }


				 elseif($InsertChamp->EstVide($prenom)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire prenom n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($contact)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire contact n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($login)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire login n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($password)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire password n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($role)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire role n\'a pas été renseigné!</div>';

				 }


				 else{

					 if(isset($_POST['operation'])){

							 if($_POST['operation']=="0"){

								 $InsertChamp->table = "utilisateur";

								 $InsertChamp->valeurs = '

									 "",

									 "'.$InsertChamp->Protection($nom).'",

									 "'.$InsertChamp->Protection($prenom).'",

									 "'.$InsertChamp->Protection($contact).'",

									 "'.$InsertChamp->Protection($login).'",

									 "'.$InsertChamp->Protection($password).'",

									 "'.$InsertChamp->Protection($role).'"

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

						 $InsertChamp->tableMaj = "utilisateur";

						 $InsertChamp->critere = "id_user = ".$id_user." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 nom = "'.$InsertChamp->Protection($nom).'",

								 prenom = "'.$InsertChamp->Protection($prenom).'",

								 contact = "'.$InsertChamp->Protection($contact).'",

								 login = "'.$InsertChamp->Protection($login).'",

								 password = "'.$InsertChamp->Protection($password).'",

								 role = "'.$InsertChamp->Protection($role).'"

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

