<?php
		$dossier = 'upload/medias/thumbs/';
		/* */

		/*print_r($_FILES);*/

		$fichier = basename($_FILES['location']['name']);

		$taille_maxi = 2000000000;
		$taille = filesize($_FILES['location']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg','.bmp', '.jpeg','.flv','.mp3');
		$extension = strrchr($_FILES['location']['name'], '.');
		
		//Début des vérifications de sécurité...

		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
		     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, mp3, flv, txt ou doc...';
		}
		if(($taille / 1024)>$taille_maxi)
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

		     $fichier = 'image-'.$_GET['id'].$extension;

		     if(move_uploaded_file($_FILES['location']['tmp_name'], $dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		     {
		          		echo 'Upload effectué avec succès !';

		           		require_once("required/class/queries.class.php");

				   		$InsertChamp = new GeneralsQueries;

				   		 $InsertChamp->tableMaj = "medias";

						 $InsertChamp->critere = "idMedia = ".$_GET['id']." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 location = "'.$InsertChamp->Protection($dossier.$fichier).'"

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