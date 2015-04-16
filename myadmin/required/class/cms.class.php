<?php
	require_once('mysql.class.php');
	
	class Leaders extends MysqlConnect{
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
		public function LireArticle($id){
			if(ctype_digit($id)){
				if($this->Connecter()){
					$sel = 'SELECT * FROM wp_posts WHERE ID="'.$this->Secure($id).'" LIMIT 1';
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
			Méthode qui liste les articles d'une catégorie
		*/
			public function CatArticle($categorie,$limite){
			if($limite!=0 and !empty($categorie) and strlen($categorie)>0){
				if($this->Connecter()){
					$sel = 'SELECT * FROM view_articles WHERE nomCategorie ="'.$this->Secure($categorie).'" AND statut="publié" ORDER BY ID DESC LIMIT '.$this->Secure($limite);
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