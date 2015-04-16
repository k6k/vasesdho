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

			 $typeMedia_idTypeMedia= decode_utf8(html_entity_decode($res[0]['typeMedia_idTypeMedia']));

			 $thematique= decode_utf8(html_entity_decode($res[0]['thematique']));

			 $titreMedia= decode_utf8(html_entity_decode($res[0]['titreMedia']));

			 $description= decode_utf8(html_entity_decode($res[0]['description']));

			 $autheur= decode_utf8(html_entity_decode($res[0]['autheur']));

			 $duree= decode_utf8(html_entity_decode($res[0]['duree']));

			 $chemin= decode_utf8(html_entity_decode($res[0]['chemin']));

			 $imageCategorie=decode_utf8(html_entity_decode($res[0]['vignette']));

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $typeMedia_idTypeMedia= '';

			 $thematique= '';

			 $titreMedia= '';

			 $description= '';

			 $autheur= '';

			 $duree= '1';

			 $chemin= '';

			 $imageCategorie= '';

		 }

	 ?>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire medias!</h4>
						 	</div>	<form method="POST" action="include/recup/recup-medias.php" class="form-horizontal" enctype="multipart/form-data">

		<div class="control-group">

			<label class="control-label" for="typeMedia_idTypeMedia">Type de média</label>

			<div class="controls">

				<select name='typeMedia_idTypeMedia' id='typeMedia_idTypeMedia' value='<?php echo $typeMedia_idTypeMedia;?>' required><option value="">Selectionnez une option</option>

							<?php include("include/loader/load-typemedia.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo utf8_encode(ucfirst($res[$i][$resListCol[1][0]])); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>


		<div class="control-group">

			<label class="control-label" for="categories_idCategorie">Categorie</label>

			<div class="controls">

				<select name='categories_idCategorie' id='categories_idCategorie' value='<?php echo $categories_idCategorie;?>' required><option value="">Selectionnez une option</option>

							<?php include("include/loader/load-categories.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo decode_utf8(ucfirst($res[$i][$resListCol[1][0]])); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>


		<div class="control-group">

			<label class="control-label" for="thematique">Thematique</label>

			<div class="controls">

				<input type='text' name='thematique' id='thematique' value='<?php echo $thematique;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="titreMedia">Titre du Media</label>

			<div class="controls">

				<input type='text' name='titreMedia' id='titreMedia' value='<?php echo $titreMedia;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="descriptions">Description</label>

			<div class="controls">

				<textarea name='descriptions' id='descriptions' value='' required class="special"><?php echo $description;?></textarea>
				<script type="text/javascript">
							CKEDITOR.replace('descriptions');
						</script>
			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="autheur">Autheur</label>

			<div class="controls">

				<input type='text' name='autheur' id='autheur' value='<?php echo $autheur;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="duree">Duree</label>

			<div class="controls">

				<input type='text' name='duree' id='duree' value='<?php echo $duree;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="chemin">Nom du Repertoire</label>

			<div class="controls">

				<input type='text' name='chemin' id='chemin' value='<?php echo $chemin;?>' required class="special" cols='10'/>
				

			</div>

		</div>

		<div class="control-group" id="filegroup">

			<label class="control-label" for="imageCategorie">Image</label>

			<div class="controls">

				<input type="hidden" name="catId" id="catId">
				<div class="fileupload fileupload-new" data-provides="fileupload">
				  <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
				  	<img src="<?php echo $imageCategorie;?>">
				  </div>
				  <div>
				    <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
				    <input type="file" class="imageCategorie" name='imageCategorie' id='imageCategorie' value='<?php echo $imageCategorie;?>' /></span>
				    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
				  </div>
				</div>
				<input type="hidden" value='<?php echo $imageCategorie;?>' class="testimage">
			</div>

		</div>

			 <div class="form-actions"><button type="submit" class="btn btn-success" id="button"><?php echo $lib;  ?>  <i class="icon-ok icon-white"></i></button></div>

			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	</form>

			 <script type="text/javascript">

			 $(document).ready(function() {

			 $('.datepicker').datepicker();

			 $("#button").on("click",function(){

				 var typeMedia_idTypeMedia = $('#typeMedia_idTypeMedia').val();

				  var categories_idCategorie = $('#categories_idCategorie').val();

				 var thematique = $('#thematique').val();

				 var titreMedia = $('#titreMedia').val();

				 var description =CKEDITOR.instances.descriptions.getData();

				 var autheur = $('#autheur').val();

				 var duree = $('#duree').val();

				 var chemin = $('#chemin').val();

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "include/recup/recup-medias.php",

					 data : {' typeMedia_idTypeMedia': typeMedia_idTypeMedia,' categories_idCategorie': categories_idCategorie,' thematique': thematique,' titreMedia': titreMedia,' description': description,' autheur': autheur,' duree': duree,' chemin': chemin,'operation':id},

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
					 		$("#catId").val("MediaImage-"+id);
					 		var identifiant = $("#catId").val();

					 		var img=$('.imageCategorie').val();
					 		var testimg = $('.testimage').val();
					 		if(img==testimg)
					 		{
					 			
					 		}
					 		else{
							 		$(".imageCategorie").upload('upload2.php?catId='+identifiant, function(retour) {
													var string = "succès";
													
													if(retour.indexOf(string)>=0){
														
														$('#resultat').append(retour);
													}
													else{
														
														$('#resultat').append("<br/>Aucun fichier Joint ...");
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

