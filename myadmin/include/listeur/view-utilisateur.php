
	 <div class="page-header">
						 		<h4 class="Heading4" style="display:inline-block;">Visualisation de la table : utilisateur  </h4>
						 		<div style="margin-left:200px;display:inline-block;"><a href="formulaire.php?form=utilisateur" class="btn btn-danger">Ajouter un nouvel enregistrement</a></div>
						 	</div>	 <?php



	 require_once("required/class/queries.class.php");

			 $LoadData = new GeneralsQueries;

				 $champ ='';

				 $LoadData->table="utilisateur";

				 $rslt =$LoadData->SelectColumn();

	 if(isset($_GET['id'])){

				 $ident =$rslt[0][0];

						 $LoadData->critere = "".$ident." =".$_GET['id']." LIMIT 1";

						 $LoadData->DELETE();

	 }

	 else{}

	 $donnees=array('nom-nom','prenom-prenom','contact-contact','login-login','role-role','edit-edition','delete-suppression');

	 $table='utilisateur';

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

				 <td style="text-align:center;"><a href="<?php echo "include/forms/form-page-utilisateur.php?id=".$res[$i][0].""; ?>" class="fancybox fancybox.iframe btn" title="Modifier"><i class="icon-pencil"></i></a></td>

	 <?php

				 }

				 elseif($nom=="delete"){

	 ?>

				 <td style="text-align:center;"><a href="<?php echo "?form=utilisateur&id=".$res[$i][0].""; ?>" class="dialog btn" title="Supprimer" ><i class="icon-trash"></i></a></td>

	 <?php

				 }

				 elseif ($nom=="action") {

	 ?>

				 <td style="text-align:center;"><a href="<?php echo "include/forms/form-page-utilisateur.php?id=".$res[$i][0].""; ?>" class="action"  class="fancybox fancybox.iframe btn" ><i class="icon-share-alt"></i></a></td>

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



		 <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

			 <div class="modal-header">

				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

				 <h3 id="myModalLabel">Confirm</h3>

			 </div>

			 <div class="modal-body">

				 <p>Voulez-vous vraiment effectuer cette suppression ? </p>

				  </div>

			  <div class="modal-footer">

				 <button class="btn reset" data-dismiss="modal" aria-hidden="true">Annuler</button>

				 <button class="btn btn-primary confirm">Confirmer</button>

			 </div>

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

