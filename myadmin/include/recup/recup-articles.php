	 <?php

		 require_once("../../required/class/queries.class.php");

		 $InsertChamp = new GeneralsQueries;

		 $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð',
                'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã',
                'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ',
                'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ',
                'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę',
                'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī',
                'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ',
                'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ',
                'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 
                'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 
                'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ',
                'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');

  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O',
                'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c',
                'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u',
                'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D',
                'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g',
                'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K',
                'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o',
                'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S',
                's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W',
                'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i',
                'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');


			 $idArticle = @$_POST['operation'];

			 $titreArticle = str_replace($a, $b, @$_POST['titreArticle']);

			 $contenuArticle = @$_POST['contenuArticle'];

			 $autheur = @$_POST['autheur'];

			 $dateArticle =date('d-m-Y');

			 $postNm = @$_POST['postName'];

			 $postName = str_replace('', '_', $postNm);

			 $mediaArticle = @$_POST['mediaArticle'];

			 $categories_idCategorie = @$_POST['categories_idCategorie'];

			 $statuts_idStatut = @$_POST['statuts_idStatut'];

			 $idLangues = @$_POST['idLangues'];

			 /*$extrait = str_replace($a, $b,@$_POST['extrait']);*/
			 $extrait = @$_POST['extrait'];

			 	
				  	
				 	


				 if($InsertChamp->EstVide($titreArticle)){

						 echo '<div id="error" class="alert alert-error">L\'information sur le champ obligatoire titre n\'a pas été renseigné !</div>';

				 }


				 elseif($InsertChamp->EstVide($contenuArticle)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire contenu n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($categories_idCategorie)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire renseignant sur la categorie n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($statuts_idStatut)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire information sur le statut n\'a pas été renseigné!</div>';

				 }


				 elseif($InsertChamp->EstVide($idLangues)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire informant sur la Langue n\'a pas été renseigné!</div>';

				 }

				 elseif($InsertChamp->EstVide($extrait)){

						 echo'<div id="error" class="alert alert-error">L\'information sur le champ obligatoire informant sur l\'extrait n\'a pas été renseigné!</div>';

				 }


				 else{

					 if(isset($_POST['operation'])){

							 if($_POST['operation']=="0"){

								 $InsertChamp->table = "articles";

								 $InsertChamp->valeurs = '

									 "",

									 "'.$InsertChamp->Protection(utf8_encode($titreArticle)).'",

									 "'.$InsertChamp->Protection($contenuArticle).'",

									 "'.$InsertChamp->Protection($autheur).'",

									 "'.$InsertChamp->Protection($dateArticle).'",

									 "'.$InsertChamp->Protection($postName).'",

									 "'.$InsertChamp->Protection($mediaArticle).'",

									 "'.$InsertChamp->Protection($categories_idCategorie).'",

									 "'.$InsertChamp->Protection($statuts_idStatut).'",

									 "'.$InsertChamp->Protection($idLangues).'",

									 "'.$InsertChamp->Protection($extrait).'"

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

						 $InsertChamp->tableMaj = "articles";

						 $InsertChamp->critere = "idArticle = ".$idArticle." LIMIT 1";

						 $InsertChamp->donneesMAJ = '

								 titreArticle = "'.$InsertChamp->Protection($titreArticle).'",

								 contenuArticle = "'.$InsertChamp->Protection($contenuArticle).'",

								 autheur = "'.$InsertChamp->Protection($autheur).'",

								 dateArticle = "'.$InsertChamp->Protection($dateArticle).'",

								 postName = "'.$InsertChamp->Protection($postName).'",

								 categories_idCategorie = "'.$InsertChamp->Protection($categories_idCategorie).'",

								 statuts_idStatut = "'.$InsertChamp->Protection($statuts_idStatut).'",

								 idLangues = "'.$InsertChamp->Protection($idLangues).'",

								 extrait = "'.$InsertChamp->Protection($extrait).'"

								  ';

						 $MAJ = $InsertChamp->Update();

									 if($MAJ){

										  $ins=3;

										   echo '<div id="resultat" class="alert alert-success">La mise à jour  a été éffectuée avec succès !</div>#'.$idArticle;

									  }else{

										  $ins=4;

										  echo '<div id="error" class="alert alert-error"> Une Erreur s\'est produite lors de la Mise à jour ! </div>  ';

									  }

							 }

					 }

					 

				 }

	 ?>

