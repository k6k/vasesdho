	 <?php

	 require_once("required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

		  if(isset($_GET['id'])){

			  $action="modifier";}

		  else{

			  $action="inserer";}

						 $testChamp->table = "droits";

						 $testChamp->champs ="*";

		 $testChamp->valeurs="item = 'categories' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

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

		 $loader->table="categories";

		 $loader->valeurs="idCategorie= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $section_idSection=$res[0]['section_idSection'];

			 $nomCategorie=$res[0]['nomCategorie'];

			 $imageCategorie=$res[0]['imageCategorie'];

			 $description=$res[0]['description'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $section_idSection= '';

			 $nomCategorie= '';

			 $imageCategorie= '';

			 $description= '';

		 }

	 ?>

	 <div class="page-header">
 		<h4 class="Heading4">Formulaire categories!</h4>
 	</div>	<form method="POST" action="include/recup/recup-categories.php" class="form-horizontal" enctype="multipart/form-data">

		<div class="control-group">

			<label class="control-label" for="section_idSection">Section parente</label>

			<div class="controls">

				<select name='section_idSection' id='section_idSection' value='<?php echo $section_idSection;?>' required><option value="">Selectionnez une option</option>

							<?php include("include/loader/load-sections.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo decode_utf8(ucfirst($res[$i][$resListCol[1][0]])); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="nomCategorie">Nom de la Categorie</label>

			<div class="controls">

				<input type='text' name='nomCategorie' id='nomCategorie' value='<?php echo $nomCategorie;?>' required class="special"/>

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

		<div class="control-group">

			<label class="control-label" for="description">Description</label>

			<div class="controls">

				<textarea name='description' id='description' value='' class="special"><?php echo decode_utf8($description);?></textarea>

			</div>

		</div>
		

			 <div class="form-actions"><button type="submit" class="btn btn-success" id="button"><?php echo $lib;  ?>  <i class="icon-ok icon-white"></i></button></div>

			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	</form>

			 <script type="text/javascript">

			 $(document).ready(function() {

			 $('.datepicker').datepicker();

			 $("#button").on("click",function(){

				 var section_idSection = $('#section_idSection').val();

				 var nomCategorie = $('#nomCategorie').val();

				 var imageCategorie = $('#imageCategorie').val();

				 var description = $('#description').val();

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "include/recup/recup-categories.php",

					 data : {' section_idSection': section_idSection,' nomCategorie': nomCategorie,' imageCategorie': imageCategorie,' description': description,'operation':id},

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
					 		$("#catId").val("dataImage-"+id);
					 		var identifiant = $("#catId").val();

					 		var img=$('.imageCategorie').val();
					 		var testimg = $('.testimage').val();
					 		if(img==testimg)
					 		{
					 			
					 		}
					 		else{
							 		$(".imageCategorie").upload('upload1.php?catId='+identifiant, function(retour) {
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

