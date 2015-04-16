<?php
		$dossier = 'upload/vignettes/';
		/*$nom = $_POST['id'];*/
		$fichier = basename($_FILES['mediaArticle']['name']);
		$taille_maxi = 1000000;
		$taille = filesize($_FILES['mediaArticle']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['mediaArticle']['name'], '.');
		
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
		     $fichier = $_GET['id'].$extension;

		     if(move_uploaded_file($_FILES['mediaArticle']['tmp_name'], $dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		     {
		          

		           require_once("required/class/queries.class.php");

				   $InsertChamp = new GeneralsQueries;

				   		$idd =str_replace('vignette-', '', $_GET['id']) ;
				   		
						 $InsertChamp->tableMaj = "articles";

						 $InsertChamp->critere = "idArticle = ".$idd." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 mediaArticle = "'.$InsertChamp->Protection($dossier.$fichier).'"

								  ';

						 $InsertChamp->Update();

						 echo 'Upload effectué avec succès !';
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