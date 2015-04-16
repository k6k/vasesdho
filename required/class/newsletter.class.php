<?php 

	require_once('mysql.class.php');
	require_once('alb.class.php');



	/* NOtre classe va héritée de la classe Leaders qui elle même hérite de la classe Mysql*/

	class Newslet extends Leaders{

		/*
			Attributs
		*/
		public $erreurs;
		
		
		/*
			constructeur il faut tjrs mettre un contructeur (à l'intérieur on initialise les méthodes) et un destructeur
		*/
		public function __construct(){
			$this->erreurs = array(
									0=>"Connexion impossible au serveur de base de données !",
									1=>"Paramètre vide !",
									2=>"Cette adresse a déjà été enrégistrée !",
									3=>"Aucune donnée à afficher !"
							);
		}

		/* On verifie que l'adresse n'existe pas en BD*/
					public function VerifierMail($mail){
							if(!empty($mail) and strlen($mail)>0){
								if($this->Connecter()){
									$sel = 'SELECT * FROM newsletter WHERE mail="'.$this->$mail.'" LIMIT 1';
									$rep = mysql_query($sel) or exit('Erreur!');
									$n = mysql_num_rows($rep);
									
									if($n!=0)
									{
										/*On a au moins un enregistrement donc pas d'insertion supplémentaire*/
										
										return $this->erreurs[2];
									}
									else
									{
										
									}
								}else{
									return  $this->erreurs[0];
								}
							}
							else{
								return  $this->erreurs[1];
							}
						}

		/* On insère l'adresse en BD*/
			public function insertMail($mail){
			if(!empty($mail) and strlen($mail)>0){
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
			destructeur
		*/
		public function __destruct(){
		}

	}

 ?>