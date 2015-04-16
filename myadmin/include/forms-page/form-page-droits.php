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

	 <div class="container">

	 <div class="row-fluid">

	 <div class="span7">

	 <div id="result"></div>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire droits!</h4>
						 	</div>

	 <?php

	 require_once("../../required/class/queries.class.php");

		 $loader = new GeneralsQueries;

		 if(isset($_GET['id'])){

			 $operation=$_GET['id'];

		 $loader->champs="*";

		 $loader->table="droits";

		 $loader->valeurs="id_droits= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $item=$res[0]['item'];

			 $voir=$res[0]['voir'];

			 $editer=$res[0]['editer'];

			 $supprimer=$res[0]['supprimer'];

			 $imprimer=$res[0]['imprimer'];

			 $utilisateur_id_user=$res[0]['utilisateur_id_user'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $item= '';

			 $voir= '';

			 $editer= '';

			 $supprimer= '';

			 $imprimer= '';

			 $utilisateur_id_user= '';

		 }

	 ?>

	<form class="formulaire"  method="POST" action="../recup/recup-droits.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="item">item</label>

			<div class="controls">

				<input type='text' name='item' id='item' value='<?php echo $item;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="voir">voir</label>

			<div class="controls">

				<input type='checkbox' name='voir' id='voir' />

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="editer">editer</label>

			<div class="controls">

				<input type='checkbox' name='editer' id='editer' />

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="supprimer">supprimer</label>

			<div class="controls">

				<input type='checkbox' name='supprimer' id='supprimer' />

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="imprimer">imprimer</label>

			<div class="controls">

				<input type='checkbox' name='imprimer' id='imprimer' />

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="utilisateur_id_user">utilisateur</label>

			<div class="controls">

				<input type='text' name='utilisateur_id_user' id='utilisateur_id_user' value='<?php echo $utilisateur_id_user;?>' class="special" />

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

				 var item = $('#item').val();

				 var voir = $('#voir').val();

				 var editer = $('#editer').val();

				 var supprimer = $('#supprimer').val();

				 var imprimer = $('#imprimer').val();

				 var utilisateur_id_user = $('#utilisateur_id_user').val();

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "../recup/recup-droits.php",

					 data : {' item': item,' voir': voir,' editer': editer,' supprimer': supprimer,' imprimer': imprimer,' utilisateur_id_user': utilisateur_id_user,'operation':id},

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

