<?php
	require_once('mysql.class.php');
	
	class MyCms extends MysqlConnect{
		/*
			Attributs
		*/
		public $erreurs;
		
		
		/*
			constructeur il faut tjrs mettre un contructeur (à l'intérieur on initialise les méthodes) et un destructeur
		*/
		public function __construct(){
			$this->erreurs = array(
									0=>"Connexion impossible au serveur de base de données",
									1=>"Paramètre vide",
									2=>"Les données que vous avez demandé n'ont pas été trouvé.",
									3=>"Aucune donnée à afficher"
							);
		}
		
		/*
			Méthode pour tronquer les chaînes longues
		*/
		public function Tronquer($chaine, $nb){
			
			// Si le nombre de caractères présents dans la chaine est supérieur au nombre 
			// maximum, alors on découpe la chaine au nombre de caractères 
			if (strlen($chaine) > $nb) 
			{
				$chaine = substr($chaine, 0, $nb);
				$position_espace = strrpos($chaine, " "); //on récupère l'emplacement du dernier espace dans la chaine, pour ne pas découper un mot.
				$texte = substr($chaine, 0, $position_espace);  //on redécoupe à la fin du dernier mot
				$chaine = $chaine."..."; //puis on rajoute des ...
			}
			return $chaine; //on retourne la variable modifiée

		}
		

		/*
			Méthode pour tronquer les chaînes longues
		*/
		public function TronquerImage($chaine, $nb){
			
			// Si le nombre de caractères présents dans la chaine est supérieur au nombre 
			// maximum, alors on découpe la chaine au nombre de caractères 
			if (strlen($chaine) > $nb) 
			{
				$chaine = substr($chaine, 0, $nb);
				$position_espace = strrpos($chaine, " "); //on récupère l'emplacement du dernier espace dans la chaine, pour ne pas découper un mot.
				$texte = substr($chaine, 0, $position_espace);  //on redécoupe à la fin du dernier mot
				$texte = preg_replace('#<img (.+?)/>#i', '', $texte) ; //on redécoupe à la fin du dernier mot
				$chaine = $chaine."..."; //puis on rajoute des ...
			}
			return $chaine; //on retourne la variable modifiée

		}
		/*
			Méthode de Liens Lire plus
		*/
			
			
			public function lireplus($link,$classe='more'){
				$res = '<div class="span12 '.$classe.'">
					<a href="'.$link.'">Lire plus </a>
				</div>';
				return $res;
			}

		/*
			Méthode de protection des données pour les requête MySQL
		*/
		public function Secure($data){
			return mysql_real_escape_string(htmlentities($data));
		}
		
		/*
			Méthode d'affichage des articles
		*/
		public function Articles($type,$categorie,$limite){
			if($limite!=0 and !empty($type) and strlen($type)>0 and !empty($categorie) and strlen($categorie)>0){
				if($this->Connecter()){
					$sel = 'SELECT * FROM wp_posts WHERE post_type="'.$this->Secure($type).'" AND post_status="publish" AND (SELECT term_taxonomy_id FROM wp_term_relationships WHERE term_taxonomy_id="'.$this->Secure($categorie).'" AND wp_term_relationships.object_id=wp_posts.ID) ORDER BY ID DESC LIMIT '.$this->Secure($limite);
					$rep = mysql_query($sel) or exit(mysql_error());
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$articles = array(); // initialisation du tableau à retourner
						$i=0;
						while($article = mysql_fetch_array($rep)){
							$articles[$i] = $article;
							$i++;
						}
						return $articles;
					}
				}else{
					return $this->erreurs[0];
				}
			}else{
				return $this->erreurs[3];
			}
		}

			/*
			Méthode qui renvoie les informations d'un article
		*/
		public function Lire($id,$element1,$element2){
			if(ctype_digit($id)){
				if($this->Connecter()){
					$sel = 'SELECT * FROM view_articles WHERE idArticle LIKE "%'.$this->Secure($id).'%" ';
					$rep = mysql_query($sel) or exit('Erreur!');
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$article = mysql_fetch_array($rep);
						return $article;
					}else{
						return $this->erreurs[2];
					}
				}else{
					return  $this->erreurs[0];
				}
			}else{
				return $this->erreurs[3];
			}
		}
		/*
			Méthode qui renvoie les informations d'un article
		*/
		public function LireArticle($id,$cat){
			if(ctype_digit($id)){
				if($this->Connecter()){
					$sel = 'SELECT * FROM view_articles WHERE idArticle = "'.$this->Secure($id).'" AND categorieterms = "'.$this->Secure($cat).'" AND statut LIKE "%publie%" ORDER BY idArticle DESC ';
					$rep = mysql_query($sel) or exit('Erreur!');
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$articles = array(); // initialisation du tableau à retourner
						$i=0;
						while($article = mysql_fetch_array($rep)){
							$articles[$i] = $article;
							$i++;
						}
						return $articles;
					}
				}
				else{
					return  $this->erreurs[0];
				}
			}else{
				return $this->erreurs[3];
			}
		}

		/*
			Méthode qui liste les articles d'une catégorie
		*/
			public function CatArticle($categorie,$limite,$ordre="DESC"){
			if($limite!=0 and !empty($categorie) and strlen($categorie)>0){
				if($this->Connecter()){
					$sel = 'SELECT * FROM view_articles WHERE categorieterms = "'.$this->Secure($categorie).'" AND statut LIKE "%publie%" ORDER BY idArticle '.$this->Secure($ordre).' LIMIT '.$this->Secure($limite);
					$rep = mysql_query($sel) or exit(mysql_error());
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$articles = array(); // initialisation du tableau à retourner
						$i=0;
						while($article = mysql_fetch_array($rep)){
							$articles[$i] = $article;
							$i++;
						}
						return $articles;
					}
				}else{
					return $this->erreurs[0];
				}
			}else{
				return $this->erreurs[3];
			}
		}
		/*
			Méthode qui liste les medias d'une catégorie
		*/
			public function CatMedia($type,$limite,$ordre="DESC"){
			if($limite!=0){
				if($this->Connecter()){
					$sel = 'SELECT * FROM view_media WHERE nomMedia = "'.$this->Secure($type).'"  ORDER BY idMedia '.$this->Secure($ordre).' LIMIT '.$this->Secure($limite);
					$rep = mysql_query($sel) or exit(mysql_error());
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$articles = array(); // initialisation du tableau à retourner
						$i=0;
						while($article = mysql_fetch_array($rep)){
							$articles[$i] = $article;
							$i++;
						}
						return $articles;
					}
				}else{
					return $this->erreurs[0];
				}
			}else{
				return $this->erreurs[3];
			}
		}
		/*
			Méthode qui renvoie le nom du repertoire medias d'une catégorie
		*/
			public function SelectMedia($id,$limite,$ordre="DESC"){
			if($limite!=0 and !empty($id) and strlen($id)>0){
				if($this->Connecter()){
					$sel = 'SELECT * FROM medias WHERE idMedia = "'.$this->Secure($id).'" ORDER BY idMedia '.$this->Secure($ordre).' LIMIT '.$this->Secure($limite);
					$rep = mysql_query($sel) or exit(mysql_error());
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$articles = array(); // initialisation du tableau à retourner
						$i=0;
						while($article = mysql_fetch_array($rep)){
							$articles[$i] = $article;
							$i++;
						}
						return $articles;
					}
				}else{
					return $this->erreurs[0];
				}
			}else{
				return $this->erreurs[3];
			}
		}
		/*
			Méthode qui liste les articles d'une catégorie
		*/
			public function ListCatMedia($limite,$ordre="DESC"){
			if($limite!=0 and !empty($categorie) and strlen($categorie)>0){
				if($this->Connecter()){
					$sel = 'SELECT * FROM medias WHERE statut LIKE "%publie%" ORDER BY idArticle '.$this->Secure($ordre).' LIMIT '.$this->Secure($limite);
					$rep = mysql_query($sel) or exit(mysql_error());
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$articles = array(); // initialisation du tableau à retourner
						$i=0;
						while($article = mysql_fetch_array($rep)){
							$articles[$i] = $article;
							$i++;
						}
						return $articles;
					}
				}else{
					return $this->erreurs[0];
				}
			}else{
				return $this->erreurs[3];
			}
		}

		/*
			Méthode qui liste les Menu et sous menu à partir d'un menu 
		*/
			public function ListMenu($menu){
			if(!empty($menu) and strlen($menu)>0){
				if($this->Connecter()){
					$sel = 'SELECT * FROM view_sousmenu WHERE textMenu LIKE "%'.$this->Secure($menu).'%" ORDER BY idSousMenu ASC';
					$rep = mysql_query($sel) or exit(mysql_error());
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$menuItem = array(); // initialisation du tableau à retourner
						$i=0;
						while($menuItm = mysql_fetch_array($rep)){
							$menuItem[$i] = $menuItm;
							$i++;
						}
						return $menuItem;
					}
				}else{
					return $this->erreurs[0];
				}
			}else{
				return $this->erreurs[3];
			}
		}
		
/*
			Méthode qui selectionne un Menu à partir de son Id
		*/
			public function SelectMenuById($id){
			
				if($this->Connecter()){
					$sel = 'SELECT * FROM menus  WHERE idMenu LIKE "%'.$this->Secure($id).'%"   ';
					$rep = mysql_query($sel) or exit(mysql_error());
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$menuItem = array(); // initialisation du tableau à retourner
						$i=0;
						while($menuItm = mysql_fetch_array($rep)){
							$menuItem[$i] = $menuItm;
							$i++;
						}
						return $menuItem;
					}
				}else{
					return $this->erreurs[0];
				}
			
		}/*
			Méthode qui liste les Menu 
		*/
			public function ListMenuSimple($limite){
			
				if($this->Connecter()){
					$sel = 'SELECT * FROM menus  ORDER BY idMenu ASC LIMIT '.$this->Secure($limite);
					$rep = mysql_query($sel) or exit(mysql_error());
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$menuItem = array(); // initialisation du tableau à retourner
						$i=0;
						while($menuItm = mysql_fetch_array($rep)){
							$menuItem[$i] = $menuItm;
							$i++;
						}
						return $menuItem;
					}
				}else{
					return $this->erreurs[0];
				}
			
		}

		/*
			Méthode qui liste les item Menu à partir de la langue
		*/
			public function ListMenubyLang($lang){
			
				if($this->Connecter()){
					$sel = 'SELECT * FROM view_countmenuchild WHERE langue LIKE "%'.$this->Secure($lang).'%"  ORDER BY idMenu ASC ';
					$rep = mysql_query($sel) or exit(mysql_error());
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$menuItem = array(); // initialisation du tableau à retourner
						$i=0;
						while($menuItm = mysql_fetch_array($rep)){
							$menuItem[$i] = $menuItm;
							$i++;
						}
						return $menuItem;
					}
				}else{
					return $this->erreurs[0];
				}
			
		}



		/*
			Méthode qui liste les sous Menu
		*/
			public function ListSubMenu($idmenu){
			
				if($this->Connecter()){

					$sel = 'SELECT * FROM view_sousmenu WHERE idMenu LIKE "%'.$this->Secure($idmenu).'%"  ORDER BY idSousMenu ASC ';
					$rep = mysql_query($sel) or exit(mysql_error());
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$menuItem = array(); // initialisation du tableau à retourner
						$i=0;
						while($menuItm = mysql_fetch_array($rep)){
							$menuItem[$i] = $menuItm;
							$i++;
						}
						return $menuItem;
					}
				}else{
					return $this->erreurs[0];
				}
			
		}


		/*
			Méthode qui liste les catégories d'une section
		*/
			public function ListSectionCat($Idsection,$limite,$ordre="DESC"){
			if($limite!=0 and !empty($Idsection) and strlen($Idsection)>0){
				if($this->Connecter()){
					$sel = 'SELECT * FROM categories WHERE section_idSection LIKE "%'.$this->Secure($Idsection).'%"  ORDER BY idCategorie '.$this->Secure($ordre).' LIMIT '.$this->Secure($limite);
					$rep = mysql_query($sel) or exit(mysql_error());
					$n = mysql_num_rows($rep);
					
					if($n!=0){
						$articles = array(); // initialisation du tableau à retourner
						$i=0;
						while($article = mysql_fetch_array($rep)){
							$articles[$i] = $article;
							$i++;
						}
						return $articles;
					}
				}else{
					return $this->erreurs[0];
				}
			}else{
				return $this->erreurs[3];
			}
		}

		
		/*
			destructeur
		*/
		public function __destruct(){
		}
		
	}