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
						 		<h4 class="Heading4">Formulaire utilisateur!</h4>
						 	</div>

	 <?php

	 require_once("../../required/class/queries.class.php");

		 $loader = new GeneralsQueries;

		 if(isset($_GET['id'])){

			 $operation=$_GET['id'];

		 $loader->champs="*";

		 $loader->table="utilisateur";

		 $loader->valeurs="id_user= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $nom=$res[0]['nom'];

			 $prenom=$res[0]['prenom'];

			 $contact=$res[0]['contact'];

			 $login=$res[0]['login'];

			 $password=$res[0]['password'];

			 $role=$res[0]['role'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $nom= '';

			 $prenom= '';

			 $contact= '';

			 $login= '';

			 $password= '';

			 $role= '';

		 }

	 ?>

	<form class="formulaire"  method="POST" action="../recup/recup-utilisateur.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="nom">nom</label>

			<div class="controls">

				<input type='text' name='nom' id='nom' value='<?php echo $nom;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="prenom">prenom</label>

			<div class="controls">

				<input type='text' name='prenom' id='prenom' value='<?php echo $prenom;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="contact">contact</label>

			<div class="controls">

				<input type='text' name='contact' id='contact' value='<?php echo $contact;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="login">login</label>

			<div class="controls">

				<input type='text' name='login' id='login' value='<?php echo $login;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="password">password</label>

			<div class="controls">

				<input type='password' name='password' id='password' value='<?php echo $password;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="role">role</label>

			<div class="controls">

				<input type='text' name='role' id='role' value='<?php echo $role;?>' required class="special"/>

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

				 var nom = $('#nom').val();

				 var prenom = $('#prenom').val();

				 var contact = $('#contact').val();

				 var login = $('#login').val();

				 var password = $('#password').val();

				 var role = $('#role').val();

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "../recup/recup-utilisateur.php",

					 data : {' nom': nom,' prenom': prenom,' contact': contact,' login': login,' password': password,' role': role,'operation':id},

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

