	  <?php session_start();?>

	  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

	   <html>

		<head>

		<meta charset="utf-8">

		 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		 <meta name="viewport" content="width=device-width, initial-scale=1.0">

		  <title> Titre de la page </title>

		  <script src="../../js/jquery.js" type="text/javascript"></script>

		 <link rel="stylesheet" type="text/css" media="screen" href="../../css/all.css" />

		   <link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen">

		   <link href="../../css/scrollbar.css" rel="stylesheet" media="screen">

		   <link href="../../css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">

		   <link href="../../css/datepicker.css" rel="stylesheet" media="screen">

		    <script src="../../js/bootstrap.min.js"></script>

		    <script src="../../js/holder.js"></script>

		    <script src="../../js/bootstrap-datepicker.js"></script>

		    <script src="../../js/bootstrap-typeahead.js"></script>

		</head>

	</html>

	<body>

	 <?php

	 require_once("../../required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

		  if(isset($_GET['id'])){

			  $action="modifier";}

		  else{

			  $action="inserer";
			}

						 $testChamp->table = "droits";

						 $testChamp->champs ="*";

				 $testChamp->valeurs="item = 'articles' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

						 $sel = $testChamp->Select();

						 if($sel){

						 $droits = $sel[0][$action]; }

						 else{

						 $droits = 0; }

						  if($droits==0){

						 $erreur='<div id="error" class="alert alert-error">';

						 echo $erreur."Désolé ,Vous n'avez pas accès à cette ressource !</div>";}

						 else{

	 ?>

	 <div class="container">

	 <div class="row-fluid">

	 <div class="span7">

	 <div id="result"></div>

	 <?php

		 $loader = new GeneralsQueries;

		 if(isset($_GET['id'])){

			 $operation=$_GET['id'];

		 $loader->champs="*";

		 $loader->table="articles";

		 $loader->valeurs="idArticle= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $categories_idCategorie=$res[0]['categories_idCategorie'];

			 $titreArticle=$res[0]['titreArticle'];

			 $contenuArticle=$res[0]['contenuArticle'];

			 $mediaArticle=$res[0]['mediaArticle'];

			 $idLangues=$res[0]['idLangues'];

			 $statuts_idStatut=$res[0]['statuts_idStatut'];

			 $postName=$res[0]['postName'];

			 $autheur=$res[0]['autheur'];

			 $dateArticle=$res[0]['dateArticle'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $categories_idCategorie= '';

			 $titreArticle= '';

			 $contenuArticle= '';

			 $mediaArticle= '';

			 $idLangues= '';

			 $statuts_idStatut= '';

			 $postName= '';

			 $autheur= '';

			 $dateArticle= '';

		 }

	 ?>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire articles!</h4>
						 	</div>

	<form class="formulaire"  method="POST" action="../recup/recup-articles.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="categories_idCategorie">Categorie</label>

			<div class="controls">

				<select name='categories_idCategorie' id='categories_idCategorie' value='<?php echo $categories_idCategorie;?>' required><option value="">Selectionnez une option</option>

							<?php include("../loader/load-categories.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo utf8_encode($res[$i][$resListCol[1][0]]); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="titreArticle">Titre</label>

			<div class="controls">

				<input type='text' name='titreArticle' id='titreArticle' value='<?php echo $titreArticle;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="contenuArticle">Contenu</label>

			<div class="controls">

				<input type='text' name='contenuArticle' id='contenuArticle' value='<?php echo $contenuArticle;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="mediaArticle">Image</label>

			<div class="controls">

				<input type='text' name='mediaArticle' id='mediaArticle' value='<?php echo $mediaArticle;?>' class="special" />

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="idLangues">Langue</label>

			<div class="controls">

				<select name='idLangues' id='idLangues' value='<?php echo $idLangues;?>' required><option value="">Selectionnez une option</option>

							<?php include("../loader/load-langues.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo utf8_encode($res[$i][$resListCol[1][0]]); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="statuts_idStatut">Statut</label>

			<div class="controls">

				<select name='statuts_idStatut' id='statuts_idStatut' value='<?php echo $statuts_idStatut;?>' required><option value="">Selectionnez une option</option>

							<?php include("../loader/load-statuts.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo utf8_encode($res[$i][$resListCol[1][0]]); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="postName">PostName</label>

			<div class="controls">

				<input type='text' name='postName' id='postName' value='<?php echo $postName;?>' class="special" />

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="autheur">Autheur</label>

			<div class="controls">

				<input type='hidden' name='autheur' id='autheur' value='<?php echo $autheur;?>' class="special" />

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="dateArticle">Date</label>

			<div class="controls">

				<input type='hidden' name='dateArticle' id='dateArticle' value='<?php echo $dateArticle;?>' class="special" />

			</div>

		</div>

			 <div class="form-actions"><button type="submit" class="btn btn-success" id="button"><?php echo $lib;  ?>  <i class="icon-ok icon-white"></i></button></div>

			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	</form>

	</div>

	</div>

	</div>

			 <script type="text/javascript">

			 $(document).ready(function() {

			  $('.datepicker').datepicker();

			 $("#button").on("click",function(){

				 var categories_idCategorie = $('#categories_idCategorie').val();

				 var titreArticle = $('#titreArticle').val();

				 var contenuArticle = $('#contenuArticle').val();

				 var mediaArticle = $('#mediaArticle').val();

				 var idLangues = $('#idLangues').val();

				 var statuts_idStatut = $('#statuts_idStatut').val();

				 var postName = $('#postName').val();

				 var autheur = $('#autheur').val();

				 var dateArticle = $('#dateArticle').val();

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "../recup/recup-articles.php",

					 data : {' categories_idCategorie': categories_idCategorie,' titreArticle': titreArticle,' contenuArticle': contenuArticle,' mediaArticle': mediaArticle,' idLangues': idLangues,' statuts_idStatut': statuts_idStatut,' postName': postName,' autheur': autheur,' dateArticle': dateArticle,'operation':id},

					 dataType: "html",

					 cache: false,

					 beforeSend: function () { 

					 $(".loader").html('<img src="pictures/ajax-loader2.gif" /> La Génération est en Cours...');  

					 }, 

					 success: function(data){ 

					 $("#result").show().html(data); 

					 $(".loader").fadeOut(1000); 

					 $('html,body').animate({scrollTop: 0}, 'slow'); 

					 } 

					 }); 

				 return false; 

				 }); 

				 });

			 </script> 

		</body> 

	</html> 

	 <?php

						 }

	 ?>

