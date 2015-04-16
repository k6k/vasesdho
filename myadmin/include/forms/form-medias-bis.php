	 <?php

	 require_once("required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

		  if(isset($_GET['id'])){

			  $action="modifier";}

		  else{

			  $action="inserer";}

						 $testChamp->table = "droits";

						 $testChamp->champs ="*";

		 $testChamp->valeurs="item = 'medias' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

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

		 $loader->table="medias";

		 $loader->valeurs="idMedia= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $typeMedia_idTypeMedia=$res[0]['typeMedia_idTypeMedia'];

			 $thematique=$res[0]['thematique'];

			 $titreMedia=$res[0]['titreMedia'];

			 $description=$res[0]['description'];

			 $dateCreation=$res[0]['dateCreation'];

			 $autheur=$res[0]['autheur'];

			 $liensMedia=$res[0]['liensMedia'];

			 $location=$res[0]['location'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $typeMedia_idTypeMedia= '';

			 $thematique= '';

			 $titreMedia= '';

			 $description= '';

			 $location= '';

			 $dateCreation= '';

			 $autheur= '';

			 $liensMedia= '';

		 }

	 ?>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire medias!</h4>
						 	</div>	<form method="POST" action="include/recup/recup-medias.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="typeMedia_idTypeMedia">Type de Média</label>

			<div class="controls">

				<select name='typeMedia_idTypeMedia' id='typeMedia_idTypeMedia'  required><option value="">Selectionnez une option</option>

							<?php include("include/loader/load-typemedia.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo utf8_encode(ucfirst($res[$i][$resListCol[1][0]])); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="thematique">Thématique</label>

			<div class="controls">

				<input type='text' name='thematique' id='thematique' value='<?php echo $thematique;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="titreMedia">Titre du Média</label>

			<div class="controls">

				<input type='text' name='titreMedia' id='titreMedia' value='<?php echo $titreMedia;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="description">Description</label>

			<div class="controls">

				<textarea name='description' id='description' value='' required class="special"><?php echo $description;?></textarea>

			</div>

		</div>

		<div class="control-group hide">

			<label class="control-label" for="dateCreation">Date de Création</label>

			<div class="controls">

				<input type='hidden' name='dateCreation' id='dateCreation' value='<?php echo $dateCreation;?>' class="special" />

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="autheur">Autheur</label>

			<div class="controls">

				<input type='hidden' name='autheur' id='autheur' value='<?php echo $autheur;?>' class="special" />

			</div>

		</div>

		<div class="control-group ">

			<label class="control-label" for="liensMedia">Liens du Media</label>

			<div class="controls">

				<input type='text' name='liensMedia' id='liensMedia' value='<?php echo $liensMedia;?>' class="special" />

			</div>

		</div><!-- location -->

		<div class="control-group">

			<label class="control-label" for="location">Fichier</label>

			<div class="controls">
  				<input type="hidden" name="locationId" id="locationId">
				 <div class="fileupload fileupload-new" data-provides="fileupload">
				  <div class="input-append">
				    <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div>
				    <span class="btn btn-file"><span class="fileupload-new">Selectionnez le Fichier</span><span class="fileupload-exists">Change</span>
				    <input type="file" class='location' name='location' id='location' value='<?php echo $location;?>'/></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
				  </div>
				</div> 
				<input type="hidden" value='<?php echo $location;?>' class="testimage">
			</div>

			 <div class="form-actions"><button type="submit" class="btn btn-success" id="button"><?php echo $lib;  ?>  <i class="icon-ok icon-white"></i></button></div>

			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	</form>

			 <script type="text/javascript">

			 $(document).ready(function() {

			 $('.datepicker').datepicker();

			 $("#button").on("click",function(){


				 var typeMedia_idTypeMedia = $('#typeMedia_idTypeMedia').val();

				 var thematique = $('#thematique').val();

				 var titreMedia = $('#titreMedia').val();

				 var description = $('#description').val();

				 var dateCreation = $('#dateCreation').val();

				 var location = $('#location').val();

				 var autheur = $('#autheur').val();

				 var liensMedia = $('#liensMedia').val();

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "include/recup/recup-medias.php",

					 data : {' typeMedia_idTypeMedia': typeMedia_idTypeMedia,' thematique': thematique,' titreMedia': titreMedia,' description': description,' dateCreation': dateCreation,' autheur': autheur,' liensMedia': liensMedia,'operation':id,'location':location},

					 dataType: "html",

					 cache: false,

					 beforeSend: function () { 

					 $(".loader").html('<img src="pictures/ajax-loader2.gif" /> La Génération est en Cours...');  

					 }, 

					 success: function(data){ 

					 if(data.indexOf("resultat")>=0){

					 		var res = data.split('#');

					 		var texte = res[0];

					 		$("#result").show().html(texte);
					 		
					 		var id = res[1];
					 		
					 		
					 		
					 		var img = location;

					 		var testimg = $('.testimage').val();

					 		if(img==testimg)
					 		{
					 			
					 		}
					 		else{
							 		$(".location").upload('uploadFile.php?id='+id, function(retour) {
													var string = "succès";
													
													if(retour.indexOf(string)>=0){
														
														$('#resultat').append(retour);/**/
													}
													else{
														$('#resultat').append(retour);
													}
											}, 'html');
								}
					 	}else{
					 		$("#result").show().html(data); 
					 	} 

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

