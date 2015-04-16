	 <?php

	 require_once("required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

		  if(isset($_GET['id'])){

			  $action="modifier";}

		  else{

			  $action="inserer";}

						 $testChamp->table = "droits";

						 $testChamp->champs ="*";

		 $testChamp->valeurs="item = 'droits' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

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

	 require_once("required/class/mysql.class.php");

		 $loader = new GeneralsQueries;

		 if(isset($_GET['id'])){

			 $operation=$_GET['id'];

		 $loader->champs="*";

		 $loader->table="droits";

		 $loader->valeurs="id_droits= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $utilisateur_id_user=$res[0]['utilisateur_id_user'];

			 $item=$res[0]['item'];

			 $voir=$res[0]['voir'];

			 $inserer=$res[0]['inserer'];

			 $modifier=$res[0]['modifier'];

			 $supprimer=$res[0]['supprimer'];

			 $imprimer=$res[0]['imprimer'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $utilisateur_id_user= '';

			 $item= '';

			 $voir= '';

			 $inserer= '';

			 $modifier= '';

			 $supprimer= '';

			 $imprimer= '';

		 }

	 ?>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire droits!</h4>
						 	</div>	<form method="POST" action="include/recup/recup-droits.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="utilisateur_id_user">Utilisateur</label>

			<div class="controls">

				<select name='utilisateur_id_user' id='utilisateur_id_user' value='<?php echo $utilisateur_id_user;?>' required><option value="">Selectionnez une option</option>

							<?php include("include/loader/load-utilisateur.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo utf8_encode(ucfirst($res[$i][$resListCol[1][0]])); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="item">Item</label>

			<div class="controls">
	
				
				<select name='item' id='item' required class="special" >
				<option value="">sélectionnez une table</option>
						<?php 	
								
								$loader->db="cgs_app";
								$resListCol = $loader->SelectTable();
								$i=0;
								if($resListCol){
									while($i<sizeof($resListCol)){
									
										if(preg_match("#view_#i", $resListCol[$i][0])){
									?>
									
									<?php
													

											}else{
										?>
										<option value="<?php echo $resListCol[$i][0]; ?>"><?php echo utf8_encode(ucfirst($resListCol[$i][0])); ?></option>
										
										<?php
										}
										$i++;
									}
								}else{
								}
						
						?>
				</select>
				

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="voir">Voir</label>

			<div class="controls">

				<select name='voir' id='voir' value='<?php echo $voir;?>' required>
							<option value="">Selectionnez une option</option>
							<option value="1">Oui</option>
							<option value="0">Non</option>
							</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="inserer">Inserer</label>

			<div class="controls">

				<select name='inserer' id='inserer' value='<?php echo $inserer;?>' required>
							<option value="">Selectionnez une option</option>
							<option value="1">Oui</option>
							<option value="0">Non</option>
							</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="modifier">Modifier</label>

			<div class="controls">

				<select name='modifier' id='modifier' value='<?php echo $modifier;?>' required>
							<option value="">Selectionnez une option</option>
							<option value="1">Oui</option>
							<option value="0">Non</option>
							</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="supprimer">Supprimer</label>

			<div class="controls">

				<select name='supprimer' id='supprimer' value='<?php echo $supprimer;?>' required>
							<option value="">Selectionnez une option</option>
							<option value="1">Oui</option>
							<option value="0">Non</option>
							</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="imprimer">Imprimer</label>

			<div class="controls">

				<select name='imprimer' id='imprimer' value='<?php echo $imprimer;?>' required>
							<option value="">Selectionnez une option</option>
							<option value="1">Oui</option>
							<option value="0">Non</option>
							</select>

			</div>

		</div>

			 <div class="form-actions"><button type="submit" class="btn btn-success" id="button"><?php echo $lib;  ?>  <i class="icon-ok icon-white"></i></button></div>

			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	</form>

			 <script type="text/javascript">

			 $(document).ready(function() {

			 $('.datepicker').datepicker();

			 $("#button").on("click",function(){

				 var utilisateur_id_user = $('#utilisateur_id_user').val();

				 var item = $('#item').val();

				 var voir = $('#voir').val();

				 var inserer = $('#inserer').val();

				 var modifier = $('#modifier').val();

				 var supprimer = $('#supprimer').val();

				 var imprimer = $('#imprimer').val();

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "include/recup/recup-droits.php",

					 data : {' utilisateur_id_user': utilisateur_id_user,' item': item,' voir': voir,' inserer': inserer,' modifier': modifier,' supprimer': supprimer,' imprimer': imprimer,'operation':id},

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

