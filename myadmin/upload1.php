<?php
		$dossier = 'upload/images/';
		/*$nom = $_POST['catId'];*/
		$fichier = basename($_FILES['imageCategorie']['name']);
		$taille_maxi = 1000000;
		$taille = filesize($_FILES['imageCategorie']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg','.ppt');
		$extension = strrchr($_FILES['imageCategorie']['name'], '.');
		
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
		     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
		}
		if($taille>$taille_maxi)
		{
		     $erreur = 'Le fichier est trop gros...';
		}
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
		     //On formate le nom du fichier ici...
		     $fichier = strtr($fichier, 
		          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
		          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

		     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		     $fichier = $_GET['catId'].$extension;

		     if(move_uploaded_file($_FILES['imageCategorie']['tmp_name'], $dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		     {
		          echo 'Upload effectué avec succès !';

		           require_once("required/class/queries.class.php");

				   $InsertChamp = new GeneralsQueries;

				   		$idd =str_replace('dataImage-', '', $_GET['catId']) ;
						 $InsertChamp->tableMaj = "categories";

						 $InsertChamp->critere = "idCategorie = ".$idd." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 imageCategorie = "'.$InsertChamp->Protection($dossier.$fichier).'"

								  ';

						 $InsertChamp->Update();

		     }
		     else //Sinon (la fonction renvoie FALSE).
		     {
		          echo 'Echec de l\'upload !';
		     }
		}
		else
		{
		     echo $erreur;
		}
?>