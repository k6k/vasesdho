	 <?php

	 require_once("required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

		  if(isset($_GET['id'])){

			  $action="modifier";}

		  else{

			  $action="inserer";}

						 $testChamp->table = "droits";

						 $testChamp->champs ="*";

		 $testChamp->valeurs="item = 'typemedia' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

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

	 <div id="result"></div>



	 <?php

		 $loader = new GeneralsQueries;

		 if(isset($_GET['id'])){

			 $operation=$_GET['id'];

		 $loader->champs="*";

		 $loader->table="typemedia";

		 $loader->valeurs="idTypeMedia= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $nomMedia=$res[0]['nomMedia'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $nomMedia= '';

		 }

	 ?>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire typemedia!</h4>
						 	</div>	<form method="POST" action="include/recup/recup-typemedia.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="nomMedia">Catégorie du Media</label>

			<div class="controls">

				<input type='text' name='nomMedia' id='nomMedia' value='<?php echo $nomMedia;?>' required class="special"/>

			</div>

		</div>

			 <div class="form-actions"><button type="submit" class="btn btn-success" id="button"><?php echo $lib;  ?>  <i class="icon-ok icon-white"></i></button></div>

			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	</form>

			 <script type="text/javascript">

			 $(document).ready(function() {

			 $('.datepicker').datepicker();

			 $("#button").on("click",function(){

				 var nomMedia = $('#nomMedia').val();

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "include/recup/recup-typemedia.php",

					 data : {' nomMedia': nomMedia,'operation':id},

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

	 <?php

						 }

	 ?>

