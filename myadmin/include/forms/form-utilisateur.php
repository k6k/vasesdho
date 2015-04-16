	 <div id="result"></div>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire utilisateur!</h4>
						 	</div>

	 <?php

	 require_once("required/class/queries.class.php");

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

	<form method="POST" action="include/recup/recup-utilisateur.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="nom">Nom</label>

			<div class="controls">

				<input type='text' name='nom' id='nom' value='<?php echo $nom;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="prenom">Prenom</label>

			<div class="controls">

				<input type='text' name='prenom' id='prenom' value='<?php echo $prenom;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="contact">Contact</label>

			<div class="controls">

				<input type='text' name='contact' id='contact' value='<?php echo $contact;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="login">Login</label>

			<div class="controls">

				<input type='text' name='login' id='login' value='<?php echo $login;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="password">Password</label>

			<div class="controls">

				<input type='password' name='password' id='password' value='<?php echo $password;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="role">Role</label>

			<div class="controls">

				<input type='text' name='role' id='role' value='<?php echo $role;?>' required class="special"/>

			</div>

		</div>

			 <div class="form-actions"><button type="submit" class="btn btn-success" id="button"><?php echo $lib;  ?>  <i class="icon-ok icon-white"></i></button></div>

			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	</form>

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

					 url: "include/recup/recup-utilisateur.php",

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

