	 <?php

	 require_once("required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

		  if(isset($_GET['id'])){

			  $action="modifier";}

		  else{

			  $action="inserer";}

						 $testChamp->table = "droits";

						 $testChamp->champs ="*";

		 $testChamp->valeurs="item = 'agenda' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

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

		 $loader->table="agenda";

		 $loader->valeurs="idagenda= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $categorie_id=$res[0]['categorie_id'];

			 $titre=$res[0]['titre'];

			 $heure=$res[0]['heure'];

			 $date=$res[0]['date'];

			 $mois=$res[0]['mois'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $categorie_id= '';

			 $titre= '';

			 $heure= '';

			 $date= '';

			 $mois= '';

		 }

	 ?>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire agenda!</h4>
						 	</div>	<form method="POST" action="include/recup/recup-agenda.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="categorie_id">Catégorie</label>

			<div class="controls">

				<select name='categorie_id' id='categorie_id' value='<?php echo $categorie_id;?>' required><option value="">Selectionnez une option</option>

							<?php include("include/loader/load-categories.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo utf8_encode(ucfirst($res[$i][$resListCol[1][0]])); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="titre">Titre</label>

			<div class="controls">

				<input type='text' name='titre' id='titre' value='<?php echo $titre;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="heure">Heure</label>

			<div class="controls">

				<input type='text' name='heure' id='heure' value='<?php echo $heure;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="date">Date</label>

			<div class="controls">

				<input type='text' name='date' id='date' value='<?php echo $date;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="mois">Mois</label>

			<div class="controls">

				<input type='text' name='mois' id='mois' value='<?php echo $mois;?>' required class="special"/>

			</div>

		</div>

			 <div class="form-actions"><button type="submit" class="btn btn-success" id="button"><?php echo $lib;  ?>  <i class="icon-ok icon-white"></i></button></div>

			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	</form>

			 <script type="text/javascript">

			 $(document).ready(function() {

			 $('.datepicker').datepicker();

			 $("#button").on("click",function(){

				 var categorie_id = $('#categorie_id').val();

				 var titre = $('#titre').val();

				 var heure = $('#heure').val();

				 var date = $('#date').val();

				 var mois = $('#mois').val();

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "include/recup/recup-agenda.php",

					 data : {' categorie_id': categorie_id,' titre': titre,' heure': heure,' date': date,' mois': mois,'operation':id},

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

