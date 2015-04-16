	 <?php

	 require_once("required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

		  if(isset($_GET['id'])){

			  $action="modifier";}

		  else{

			  $action="inserer";}


	 ?>

	 <div id="result"></div>



	 <?php

		 $loader = new GeneralsQueries;

		 if(isset($_GET['id'])){

			 $operation=$_GET['id'];

		 $loader->champs="*";

		 $loader->table="newsletter";

		 $loader->valeurs="id= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $email=$res[0]['email'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $email= '';

		 }

	 ?>

	 <!--	<form method="POST" action="include/recup/recup-newsletter.php" class="form-inline">

			<div class="control-group">
					<div class="span3"><label class="control-label labelize" for="email">Email Newsletter</label> </div>
				
					<div class="input-append span4">
					  <input id="appendedInputButtons email" type="text" placeholder='Example@domaine.com' required class="special"  name='email'>
					  <button id="button" class="btn" type="button">s'inscrire <i class="icon-ok icon-white"></i></button>
					</div>
			</div>

			 
			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	    </form>-->

			 <script type="text/javascript">

					$("#email").on("click",function(u){
					
						alert('ok');
						
						var email = $('#email').val();
						 
						 var id = $('#operation').val();

						 $.ajax({

							 type: "POST",

							 url: "include/recup/recup-newsletter.php",

							 data : {'email': email,'operation':id},

							 dataType: "html",

							 cache: false,

							
							 success: function(data){ 

							 $("#result").show().html(data); 

							 
							 }); 

						 return false; 

						 }); 
				

			 </script> 

	

