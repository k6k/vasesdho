	 <?php

	 require_once("required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

		  if(isset($_GET['id'])){


			  $action="modifier";
			  $autheur=$_SESSION['appUserAccount'];
			}

		  else{

			  $action="inserer";

			  $autheur=$_SESSION['appUserAccount'];
			}

						 $testChamp->table = "droits";

						 $testChamp->champs ="*";

		 $testChamp->valeurs="item = 'articles' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

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

		 $loader->table="articles";

		 $loader->valeurs="idArticle= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $categories_idCategorie=$res[0]['categories_idCategorie'];

			 $titreArticle=decode_utf8(html_entity_decode($res[0]['titreArticle']));

			 $contenuArticle=$res[0]['contenuArticle'];

			 $mediaArticle=$res[0]['mediaArticle'];

			 $idLangues=$res[0]['idLangues'];

			 $statuts_idStatut=$res[0]['statuts_idStatut'];

			 $postName=$res[0]['postName'];

			 $autheur=$_SESSION['appUserAccount'];

			 $dateArticle=$res[0]['dateArticle'];

			 $extrait=decode_utf8(html_entity_decode($res[0]['extrait']));

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $categories_idCategorie= '';

			 $titreArticle= '';

			 $contenuArticle= '';

			 $mediaArticle= '';

			 $idLangues= '';

			 $statuts_idStatut= '';

			 $postName= '';

			 $autheur=$_SESSION['appUserAccount'];

			 $dateArticle= '';

			 $extrait= '';

		 }

	 ?>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire articles!</h4>
						 	</div>	<form method="POST" action="include/recup/recup-articles.php" class="form-horizontal"  enctype="multipart/form-data">

		<div class="control-group retrait2">

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

		<div class="control-group retrait">

			<label class="control-label" for="titreArticle">Titre</label>

			<div class="controls">

				<input type='text' name='titreArticle' id='titreArticle' value='<?php echo $titreArticle;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group retrait3">

			<label class="control-label" for="idLangues">Langue</label>

			<div class="controls">

				<select name='idLangues' id='idLangues' value='<?php echo $idLangues;?>' required><option value="">Selectionnez une option</option>

							<?php include("include/loader/load-langues.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo decode_utf8(ucfirst($res[$i][$resListCol[1][0]])); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>

		<div class="control-group retrait">

			<label class="control-label" for="statuts_idStatut">Statut</label>

			<div class="controls">

				<select name='statuts_idStatut' id='statuts_idStatut' value='<?php echo $statuts_idStatut;?>' required><option value="">Selectionnez une option</option>

					<?php include("include/loader/load-statuts.php");


				 	for($i=0;$i<sizeof($res);$i++){?>

				 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo decode_utf8(ucfirst($res[$i][$resListCol[1][0]])); ?></option>

				 	<?php }?>

				</select>

			</div>

		</div>


		<div class="control-group retrait1">

			<label class="control-label" for="extrait">Extrait / Résumé </label>

			 <div class="controls"> 

				<textarea name='extrait' id='extrait' required class="special" rows="5" style="width:500px;"><?php echo decode_utf8($extrait);?></textarea>
				
			 </div> 

		</div>


		<div class="control-group">

					

					<!-- <div class="controls"> -->

						<textarea name='contenuArticle' id='contenuArticle' required class="special"><?php echo $contenuArticle;?></textarea>
						<script type="text/javascript">
							CKEDITOR.replace('contenuArticle');
						</script>
					<!-- </div> -->

		</div>

		
		<div class="control-group">

			<label class="control-label" for="mediaArticle">Vignette</label>

			<div class="controls">
<!--
				<input type='text' name='mediaArticle' id='mediaArticle' value='<?php  $mediaArticle;?>' class="special" />
-->
					<input type="hidden" name="vignId" id="vignId">
				 <div class="fileupload fileupload-new" data-provides="fileupload">
				  <div class="input-append">
				    <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div>
				    <span class="btn btn-file"><span class="fileupload-new">Selectionnez</span><span class="fileupload-exists">Change</span>
				    <input type="file" class="mediaArticle" name="mediaArticle" id="mediaArticle" value='<?php echo $mediaArticle;?>'/></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
				  </div>
				</div> 
				<input type="hidden" value='<?php echo $mediaArticle;?>' class="testimage">
			</div>
		

		<div class="control-group hide">

			<label class="control-label" for="postName">PostName</label>

			<div class="controls">

				<input type='text' name='postName' id='postName' value='<?php echo $postName;?>' class="special" />

			</div>

		</div>

		

		</div>

		<div class="control-group hide">

			<!-- <label class="control-label" for="autheur">Autheur</label> -->

			<div class="controls">

				<input type='text' name='autheur' id='autheur' value='<?php echo $autheur;?>' class="special" />

			</div>

		</div>

		<div class="control-group hide">

			<label class="control-label" for="dateArticle">Date</label>

			<div class="controls">

				<input type='hidden' name='dateArticle' id='dateArticle' value='<?php echo $dateArticle;?>' class="special" />

			</div>

		</div>

			 <div class="form-actions"><button type="submit" class="btn btn-success" id="button"><?php echo $lib;  ?>  <i class="icon-ok icon-white"></i></button></div>

			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	</form>

			 <script type="text/javascript">

			 $(document).ready(function() {

			 $('.datepicker').datepicker();


			 $("#button").on("click",function(){

				 var categories_idCategorie = $('#categories_idCategorie').val();

				 var titreArticle = $('#titreArticle').val();

				 var contenuArticle = CKEDITOR.instances.contenuArticle.getData();
				
				 var mediaArticle = $('#mediaArticle').val();

				 var idLangues = $('#idLangues').val();

				 var statuts_idStatut = $('#statuts_idStatut').val();

				 var postName = $('#postName').val();

				 var autheur = $('#autheur').val();

				 var dateArticle = $('#dateArticle').val();

				 var id=$('#operation').val();

				 var extrait=$('#extrait').val();

				 $.ajax({

					 type: "POST",

					 url: "include/recup/recup-articles.php",

					 data : {' categories_idCategorie': categories_idCategorie,' titreArticle': titreArticle,' contenuArticle': contenuArticle,' mediaArticle': mediaArticle,' idLangues': idLangues,' statuts_idStatut': statuts_idStatut,' postName': postName,' autheur': autheur,' dateArticle': dateArticle,'operation':id,'extrait':extrait},

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
					 		$("#vignId").val("vignette-"+id);
					 		var identifiant =  $("#vignId").val();
					 		

					 		var img=$('.mediaArticle').val();
					 		var testimg = $('.testimage').val();
					 		if(img==testimg)
					 		{
					 			
					 		}
					 		else{
							 		$(".mediaArticle").upload('uploadVign.php?id='+identifiant, function(retour) {
													var string = "succès";

													
													if(retour.indexOf(string)>=0){
														
														$('#result').append(retour);/**/
													}
													else{
														$('#result').append(retour);
													}
											}, 'html');
								}
					 	}else{
					 		$("#result").show().html(data); 
					 	} 

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

