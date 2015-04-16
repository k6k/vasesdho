	 <?php

	 require_once("required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

		  if(isset($_GET['id'])){

			  $action="modifier";}

		  else{

			  $action="inserer";}

						 

	 ?>

	 <div id="resulta"></div>



	 <?php

		 $loader = new GeneralsQueries;

		 if(isset($_GET['id'])){

			 $operation=$_GET['id'];

		 $loader->champs="*";

		 $loader->table="contact";

		 $loader->valeurs="id= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $email=$res[0]['email'];

			 $objet=$res[0]['objet'];

			 $message=$res[0]['message'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Envoyer ";

			 $email= '';

			 $objet= '';

			 $message= '';

		 }

	 ?>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire contact!</h4>
						 	</div>	<form method="POST" action="include/assets/recup/recup-contact.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="email">Email</label>

			<div class="controls">

				<input type='text' name='email' id='email' value='<?php echo $email;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="objet">Objet</label>

			<div class="controls">

				<input type='text' name='objet' id='objet' value='<?php echo $objet;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="message">Message</label>

			<div class="controls">

				<textarea name='message' id='message' value='' required class="special"><?php echo $message;?></textarea>

			</div>

		</div>


			 <div class="control-group">
			 	<div class="controls">
			 	<button type="submit" class="btn btn-info" id="button"><?php echo $lib;  ?>  <i class="icon-ok icon-white"></i></button>
			 	</div>
			 </div>


			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	</form>

			 <script type="text/javascript">

			 

			

			 $("#button").on("click",function(e){

				 var email = $('#email').val();

				 var objet = $('#objet').val();

				 var message = $('#message').val();

				 var id = $('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "include/assets/recup/recup-contact.php",

					 data : {' email': email,' objet': objet,' message': message,'operation':id},

					 dataType: "html",

					 cache: false,

					 success: function(data){ 

					 $("#resulta").show().html(data); 

					 $(".loader").fadeOut(1000); 

					 $('html,body').animate({scrollTop: 0}, 'slow'); 

					 } 

					 }); 

				 return false; 

				 }); 

			$(document).ready(function() {	 });

			 </script> 

	

