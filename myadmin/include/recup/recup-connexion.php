<?php 
		require_once("../../required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

		if(isset($_POST['login']) AND isset($_POST['password'])){
			$login = $_POST['login'];
			$password = $_POST['password'];

			 if($testChamp->EstVide($login)){
			 		echo '<div id="error" class="alert alert-error">Veuillez renseigner votre login SVP !</div>';
			}
			elseif($testChamp->EstVide($password))
			{
					echo '<div id="error" class="alert alert-error">Veuillez renseigner votre Mot de passe SVP !</div>';
			}
			else
			{
						  $testChamp->tableExiste = "utilisateur";
						  $testChamp->champsExiste ="*";
						  $testChamp->valeursExiste ='login = "'.$login.'" AND password = "'.$password.'" ';
						  $test = $testChamp->Existe();

						  if($test){

						  	@session_start();
						  	echo '<div id="resultat" class="alert alert-success">connexion réussie</div>';
						  	$testChamp->table = "utilisateur";
						    $testChamp->champs ="*";
						    $testChamp->valeurs ='login = "'.$login.'" AND password = "'.$password.'" ';
						    $sel = $testChamp->Select();
						    	if($sel){
						    		$_SESSION['appUser'] = $sel[0]['nom']; // numero de mobile
									$_SESSION['appUserName'] = $sel[0]['prenom'].' '.$sel[0]['nom']; // nom
									$_SESSION['appUserAccount'] = $sel[0]['login']; // type de compte
									$_SESSION['appUserId'] = $sel[0]['id_user']; // identifiant du type de compte
									$_SESSION['appUserTyp'] = $sel[0]['role']; // identifiant du type de compte
									

									echo '<script type="text/javascript">document.location.href="accueil.php"</script>';
						    	}

						  	
						  }else{
						  	echo '<div id="error" class="alert alert-error">Le Login Et/Ou le mot de passe sont invalides !</div>';
						  }
			}

			/*echo '<div id="resultat" class="alert alert-success">connexion réussie</div>';*/
		}else{
				echo '<div id="error" class="alert alert-error">Problème de connexion</div>';
		}
 ?>