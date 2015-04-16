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

			  $action="inserer";}

						 $testChamp->table = "droits";

						 $testChamp->champs ="*";

				 $testChamp->valeurs="item = 'positions' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

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

		 $loader->table="positions";

		 $loader->valeurs="idPosition= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $position=$res[0]['position'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $position= '';

		 }

	 ?>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire positions!</h4>
						 	</div>

	<form class="formulaire"  method="POST" action="../recup/recup-positions.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="position">Position</label>

			<div class="controls">

				<input type='text' name='position' id='position' value='<?php echo $position;?>' required class="special"/>

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

				 var position = $('#position').val();

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "../recup/recup-positions.php",

					 data : {' position': position,'operation':id},

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

