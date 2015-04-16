
	 <div class="page-header">
						 		<h4 class="Heading4" style="display:inline-block;">Visualisation de la table : menus  </h4>
						 		<div style="margin-left:200px;display:inline-block;"><a href="formulaire.php?form=menus" class="btn btn-danger">Ajouter un nouvel enregistrement</a></div>
						 	</div>	 <?php



	 require_once("required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

			  $action="voir";

						 $testChamp->table = "droits";

						 $testChamp->champs ="*";

				 $testChamp->valeurs="item = 'menus' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

						 $sel = $testChamp->Select();

						 if($sel){

						 $droits = $sel[0][$action]; }

						 else{

						 $droits = 0; }

						  if($droits==0){

						 $erreur='<div id="error" class="alert alert-error">';

						 echo $erreur."Désolé ,Vous n'avez pas accès à cette ressource !</div>"; 

						 }else{

			 $LoadData = new GeneralsQueries;

				 $champ ='';

				 $LoadData->table="menus";

				 $rslt =$LoadData->SelectColumn();

	 if(isset($_GET['id'])){

				 $ident =$rslt[0][0];

						 $LoadData->critere = "".$ident." =".$_GET['id']." LIMIT 1";

						 $LoadData->DELETE();

	 }

	 else{}

	 $donnees=array('idMenu-idMenu','textMenu-Menu','liensMenu-Liens','lang_id-Langue','positions_idPosition-Position','icone-Icone','edit-edition','delete-suppression');

	 $table='menus';

	 ?>

	 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

		<thead>

			<tr>

				 	 <?php

				 $champ ='';

				 $LoadData->table=$table;

				 $rslt =$LoadData->SelectColumn();

				 $champs =$rslt[0][0].',';

				 $id =$rslt[0][0].',';

				 for($i=0; $i<sizeof($donnees); $i++)

				 {

					 $elt = explode('-',$donnees[$i]);

					 

					 $nom = $elt[0]; 

					 $label = $elt[1];

					 $champ .=$nom;

					 if($nom=="edit"||$nom=="delete"||$nom=="action"){

				 ?>

				 <th style="text-align:center;"><?php echo ucfirst($label); ?></th>

				 <?php 

				 }else{

				 ?>

				 <th><?php echo utf8_encode(ucfirst($label)); ?></th>

				 <?php

				 }

				 ?>

				 <?php

				 }

				 ?>

			</tr> 

		</thead> 

		<tbody> 

	 <?php

		 for($i=0; $i<sizeof($donnees); $i++){

			 $elt = explode('-',$donnees[$i]); 

			 $nom = $elt[0];

			 if($nom=="edit"||$nom=="delete"||$nom=="action"){

			 }else{

			 $champs .=$nom.',';

			 }

		 }

				 $champs = substr($champs, 0, -1); 

				 $LoadData->champs=$champs; 

				 $LoadData->table=$table;

				 $LoadData->valeurs="1";

				 $res =$LoadData->Select();

				 for($i=0;$i<sizeof($res);$i++){

				 ?>

				 <tr>

	 <?php

				 for($a=0;$a<sizeof($donnees);$a++)

				 {

				 $elt = explode('-',$donnees[$a]);

				 $nom = $elt[0];

				 if($nom=="edit")

				 {

	 ?>

				 <td style="text-align:center;"><a href="<?php echo "include/forms-page/form-page-menus.php?id=".$res[$i][0].""; ?>" class="fancybox fancybox.iframe btn" title="Modifier"><i class="icon-pencil"></i></a></td>

	 <?php

				 }

				 elseif($nom=="delete"){

	 ?>

				 <td style="text-align:center;"><a href="<?php echo "?form=menus&id=".$res[$i][0].""; ?>" class="dialog btn" title="Supprimer" ><i class="icon-trash"></i></a></td>

	 <?php

				 }

				 elseif ($nom=="action") {

	 ?>

				 <td style="text-align:center;"><a href="<?php echo "include/forms-page/form-page-menus.php?id=".$res[$i][0].""; ?>" class="action"  class="fancybox fancybox.iframe btn" ><i class="icon-share-alt"></i></a></td>

	 <?php

				 }

				 elseif(in_array($id, $donnees)) {

	 ?>

				 <td style="text-align:center;"><a href="$res[$i][0]" id="suppr"><i class="icon-trash"></i></a></td>

	 <?php

				 }else{

			 if(in_array($id, $donnees)){

	 ?>

			 <td><?php echo $res[$i][$a]; ?></td>

				 <?php

				  }

				  else{

				  ?>

		 <td><?php echo utf8_encode($res[$i][$a+1]); ?></td>

	 <?php

				 }

				 }

			 }

	 ?>

				 </tr>

	 <?php

				 }

				 

	 ?>

			</tbody>

	 </table>

	 <?php } ?>



		 <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	 <?php

	 require_once("required/class/queries.class.php");

		 $testChamp = new GeneralsQueries;

			  $action="supprimer";

						 $testChamp->table = "droits";

						 $testChamp->champs ="*";

				 $testChamp->valeurs="item = 'menus' AND utilisateur_id_user = '".$_SESSION['appUserId']."' ";

						 $sel = $testChamp->Select();

						 if($sel){

						 $droits = $sel[0][$action]; }

						 else{

						 $droits = 0; }

	 ?>

			 <div class="modal-header">

				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

						  <?php

						  if($droits==0){

						 $erreur='<div id="error" class="alert alert-error">';

						 ?>

				 <h3 id="myModalLabel">Erreur</h3>

			 </div>

			 <div class="modal-body">

						<?php echo $erreur."Désolé ,Vous n'avez pas accès à cette ressource !</div>"; ?>

				  </div>

						  <?php

						 }else{

						  ?>

				 <h3 id="myModalLabel">Confirm</h3>

			 </div>

			 <div class="modal-body">

				 <p>Voulez-vous vraiment effectuer cette suppression ? </p>

				  </div>

			  <div class="modal-footer">

				 <button class="btn reset" data-dismiss="modal" aria-hidden="true">Annuler</button>

				 <button class="btn btn-primary confirm">Confirmer</button>

			 </div>

						 <?php }?>

		 </div>

			 <script type="text/javascript">

			 $(document).ready(function() {

				 $(".fancybox").fancybox({ 

					 afterClose : function() { 

					 location.reload(); 

					 return; 

					 } 

				 });

			 }); 

				 $('a.dialog').on("click",function(s){

					 var link = $(this).attr('href'); 

					 var second =""+link;

					 $('#myModal').modal(function(e){

					 });  

					 $('.confirm').on("click",function(i){ 

					 $('#myModal').modal('hide');  

					 document.location.href = second; 

				 }); 

			 return false; 

			 }); 

			 </script> 

