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

				 $testChamp->valeurs="item = 'menus' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

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

		 $loader->table="menus";

		 $loader->valeurs="idMenu= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $textMenu=$res[0]['textMenu'];

			 $liensMenu=$res[0]['liensMenu'];

			 $lang_id=$res[0]['lang_id'];

			 $positions_idPosition=$res[0]['positions_idPosition'];

			 $icone=$res[0]['icone'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $textMenu= '';

			 $liensMenu= '';

			 $lang_id= '';

			 $positions_idPosition= '';

			 $icone= '';

		 }

	 ?>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire menus!</h4>
						 	</div>

	<form class="formulaire"  method="POST" action="../recup/recup-menus.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="textMenu">Menu</label>

			<div class="controls">

				<input type='text' name='textMenu' id='textMenu' value='<?php echo $textMenu;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="liensMenu">Liens Menu</label>

			<div class="controls">

				<input type='text' name='liensMenu' id='liensMenu' value='<?php echo $liensMenu;?>' required class="special"/>

			</div>

		</div>


		<div class="control-group">

			<label class="control-label" for="icone">Icône Menu</label>

			<div class="controls">

				<input type='text' name='icone' id='icone' value='<?php echo $icone;?>' class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="lang_id">Langue</label>

			<div class="controls">

				<select name='lang_id' id='lang_id' value='<?php echo $lang_id;?>' required><option value="">Selectionnez une option</option>

							<?php include("../loader/load-langues.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo utf8_encode($res[$i][$resListCol[1][0]]); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="positions_idPosition">Position</label>

			<div class="controls">

				<select name='positions_idPosition' id='positions_idPosition' value='<?php echo $positions_idPosition;?>'><option value="">Selectionnez une option</option>

							<?php include("../loader/load-positions.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo utf8_encode(ucfirst($res[$i][$resListCol[1][0]])); ?></option>

							 	<?php }?>

							 	</select>

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

				 var textMenu = $('#textMenu').val();

				 var liensMenu = $('#liensMenu').val();

				 var lang_id = $('#lang_id').val();

				 var icone = $('#icone').val(); 

				 var positions_idPosition = $('#positions_idPosition').val();/*alert(positions_idPosition);*/

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "../recup/recup-menus.php",

					 data : {' textMenu': textMenu,' liensMenu': liensMenu,' lang_id': lang_id,'positions_idPosition': positions_idPosition,'operation':id,'icone':icone},

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

