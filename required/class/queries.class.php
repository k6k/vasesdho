<?php
	require_once('mysql.class.php');
	class GeneralsQueries extends MysqlConnect{
		public $table;
		public $tableExiste;
		public $tableMaj;
		public $valeurs;
		public $valeursExiste;
		public $champs;
		public $champsExiste;
		public $insertId;
		public $donneesMAJ;
		public $critere;
		/*
			Constructeur
		*/
		public function __construct(){
			
		}
		/*
			Affichage des messages d'erreur
		*/
		public function Msg($type,$msg){
			return '<div class="'.$type.'">'.$msg.'</div>';
		}
		
		/*
			Erreur SQL
		*/
		public function ErreurSQL(){
			return mysql_error();
			// return "Erreur SQL";
		}
		/*
			Méthode d'affichage de DIV de réponse
		*/
		public function DivReponse($classe,$msg){
			if($classe=="error"){
				return "<div class='error'>".$msg."</div>";
			}elseif($classe=="valide"){
				return "<div class='valide'>".$msg."</div>";
			}
		}
		
		/*
			tester si une valeur est vide
		*/
		public function EstVide($donnees){
			$donnees = trim($donnees);
			if(empty($donnees) or strlen($donnees)<1 or $donnees=="") return true;
			else return false;
		}
		
		/*
			Méthode de protection de données
		*/
		public function Protection($donnees){
			if($this->Connecter()){
				return mysql_real_escape_string(htmlentities($donnees));
			}
		}
		
		/*
			Méthode d'enregistrement générale
		*/
		public function Insert(){
			if($this->Connecter()){
				$insertion = "INSERT INTO ".$this->Protection($this->table)." VALUES(".$this->valeurs.")";
				/*$reponse = mysql_query($insertion) or exit($insertion);*/
				 $reponse = mysql_query($insertion) or exit($this->ErreurSQL());
				return $reponse;
			}
			else{
				//return $this->ErreurSQL().'<hr />'.$insertion;
			}
		}
		/*
			Méthode de vérification de selection d'enregistrement
		*/
		public function Select(){
			if($this->Connecter()){
				$selection = "SELECT ".$this->Protection($this->champs)." FROM ".$this->Protection($this->table)."  WHERE ".$this->valeurs."";
				$reponse = mysql_query($selection) or exit($this->ErreurSQL());
				// $reponse = mysql_query($selection) or exit($selection);
				$n = mysql_num_rows($reponse);
				if($n!=0){
					$data = array(); // initialisation du tableau à retourner
					$i=0;
					while($datum = mysql_fetch_array($reponse)){
						$data[$i] = $datum;
						$i++;
					}
					return $data;
				}
				// else return $selection;
				else return false;
			}else{
				return $this->ErreurSQL();
				// return $selection;
			}
		}
		/*
			Méthode de vérification de l'existence d'un enregistrement
		*/
		public function Existe(){
			if($this->Connecter()){
				/*$selection = "SELECT ".$this->Protection($this->champsExiste)." FROM ".$this->Protection($this->tableExiste)."  WHERE ".$this->Protection($this->champsExiste)."=".$this->valeursExiste;*/
				$selection = "SELECT ".$this->Protection($this->champsExiste)." FROM ".$this->Protection($this->tableExiste)."  WHERE ".$this->valeursExiste;
				$reponse = mysql_query($selection) or exit($this->ErreurSQL());
				$n = mysql_num_rows($reponse);
				if($n!=0) return true;
				else return false;
			}else{
				return $this->ErreurSQL();
			}
		}

		/*
			Méthode de comptage du nombre d'ocurrence
		*/
		public function compteExiste(){
			if($this->Connecter()){
			/*	$selection = "SELECT ".$this->Protection($this->champsExiste)." FROM ".$this->Protection($this->tableExiste)."  WHERE ".$this->Protection($this->champsExiste)." = ".$this->valeursExiste."";*/
				$selection = "SELECT ".$this->Protection($this->champsExiste)." FROM ".$this->Protection($this->tableExiste)."  WHERE ".$this->valeursExiste;
				$reponse = mysql_query($selection) or exit($this->ErreurSQL());
				$n = mysql_num_rows($reponse);
				if(mysql_num_rows($reponse)==1){
					return true;
				}else{
					return false;
				}
				
			}else{
				return $this->ErreurSQL();
			}
		}
		
		/* Méthode de selection des matières par niveau */
		public function listeMatiereNiveau($niveau){
			$this->champs = "*";
			$this->table = "details_matiere";
			$this->valeurs = "id_niveau='".$niveau."' LIMIT 1";
			
			return $this->Select();
		}
		
		public function Update(){
			if($this->Connecter()){
				$maj = 'UPDATE '.$this->Protection($this->tableMaj).' SET '.$this->donneesMAJ.' WHERE '.$this->critere.'';
				// $maj = "UPDATE ".$this->Protection($this->tableMaj)." SET ".$this->Protection($this->donneesMAJ)."  WHERE ".$this->critere;
				$reponse = mysql_query($maj) or exit($this->ErreurSQL());
				// $reponse = mysql_query($maj) or exit($maj);
				// $n = mysql_num_rows($reponse);
				if($reponse) return true;
				else return false;
			}else{
				return $this->ErreurSQL();
				// return $maj;
			}
		}



		/*Tester un adresse mail*/
		public function CheckMail($adresse) 
			{ 
			   $Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#'; 
			   if(preg_match($Syntaxe,$adresse)) 
			      return true; 
			   else 
			     return false; 
			}




		
		/*
			Destructeur
		*/
		public function __destruct(){
		
		}
		
	}
?>