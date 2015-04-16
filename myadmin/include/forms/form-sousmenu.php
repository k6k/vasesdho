	 <?php

	 require_once("required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

		  if(isset($_GET['id'])){

			  $action="modifier";}

		  else{

			  $action="inserer";}

						 $testChamp->table = "droits";

						 $testChamp->champs ="*";

		 $testChamp->valeurs="item = 'sousmenu' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

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

		 $loader->table="sousmenu";

		 $loader->valeurs="idSousMenu= '".$_GET['id']."'";

		 $res =$loader->Select();

			 $menus_idMenu=$res[0]['menus_idMenu'];

			 $subMenu=$res[0]['subMenu'];

			 $menulink=$res[0]['menulink'];

			 $lib="Modifier";

		 }else{

			 $operation=0;

			 $lib="Ajouter";

			 $menus_idMenu= '';

			 $subMenu= '';

			 $menulink= '';

		 }

	 ?>

	 <div class="page-header">
						 		<h4 class="Heading4">Formulaire sousmenu!</h4>
						 	</div>	<form method="POST" action="include/recup/recup-sousmenu.php" class="form-horizontal">

		<div class="control-group">

			<label class="control-label" for="menus_idMenu">Menu parent</label>

			<div class="controls">

				<select name='menus_idMenu' id='menus_idMenu' value='<?php echo $menus_idMenu;?>' required><option value="">Selectionnez une option</option>

							<?php include("include/loader/load-menus.php");


							 	for($i=0;$i<sizeof($res);$i++){?>

							 		<option value="<?php echo $res[$i][$resListCol[0][0]]; ?>"><?php echo utf8_encode(ucfirst($res[$i][$resListCol[1][0]])); ?></option>

							 	<?php }?>

							 	</select>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="subMenu">Sous menu</label>

			<div class="controls">

				<input type='text' name='subMenu' id='subMenu' value='<?php echo $subMenu;?>' required class="special"/>

			</div>

		</div>

		<div class="control-group">

			<label class="control-label" for="menulink">Liens</label>

			<div class="controls">

				<input type='text' name='menulink' id='menulink' value='<?php echo $menulink;?>' required class="special"/>

			</div>

		</div>

			 <div class="form-actions"><button type="submit" class="btn btn-success" id="button"><?php echo $lib;  ?>  <i class="icon-ok icon-white"></i></button></div>

			 <input type="hidden" name="operation" id="operation" value="<?php echo $operation;  ?>">

	</form>

			 <script type="text/javascript">

			 $(document).ready(function() {

			 $('.datepicker').datepicker();

			 $("#button").on("click",function(){

				 var menus_idMenu = $('#menus_idMenu').val();

				 var subMenu = $('#subMenu').val();

				 var menulink = $('#menulink').val();

				 var id=$('#operation').val();

				 $.ajax({

					 type: "POST",

					 url: "include/recup/recup-sousmenu.php",

					 data : {' menus_idMenu': menus_idMenu,' subMenu': subMenu,' menulink': menulink,'operation':id},

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

