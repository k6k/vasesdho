	$('#Type_prestation').on("change",function(e){

					/*var cur = $(this);
					var ident  = cur.attr('value');*/

					var val = $(this);
					var valeur = val.find('option:selected').attr('value');

					
					/*On récupère l'année courrante*/

					var d = new Date();
					var curr_year = d.getFullYear();

					var complement =$("#patient_num_patient").val();

					/*-------------*/

					if(valeur=="")
					{
						
					}
					else if(valeur=="4"){

						
						
							$("#code_prestation").val('ACT/'+curr_year+'-'+complement);
							/*alert(valeur);*/
							$.ajax({

								 type: "POST",

								 url: "include/loader/load-prestByTyp.php",

								 data : {'valeur': valeur},

								 dataType: "html",

								 cache: false,

								 success: function(data){ 

										
										 $('#details_prestation_id_element').empty().append(data); 
								
								 } 

							 });
							
					}
					else{
							
							$('#code_prestation').val('DOS/'+curr_year+'-'+complement);
							$.ajax({

								 type: "POST",

								 url: "include/loader/load-prestByTyp.php",

								 data : {'valeur': valeur},

								 dataType: "html",

								 cache: false,

								 success: function(data){ 

										
										 $('#details_prestation_id_element').empty().append(data); 
								
								 } 

							 });
					}
				
					

			});

			/*On va charger le prix de la prestation*/
				$('#details_prestation_id_element').on("change",function(e){

					var val = $(this);
					var valeur = val.find('option:selected').attr('value');
										
					/*On récupère l'année courrante*/
					
					/*-------------*/

					if(valeur=="")
					{
						
					}
					else{

							
							$.ajax({

								 type: "POST",

								 url: "include/loader/load-PrestPrice.php",

								 data : {'valeur': valeur},

								 dataType: "html",

								 cache: false,

								 success: function(data){ 

									$('#prix_prestation').empty().val(data); 
									
									 } 

							 });
							
					}
										

			});

		/*---le prix change lorsque la durée change,il sera considéré comme un coefficient multiplicateur--*/
				$('#duree_prestation').on("blur",function(h){
					var toi = $(this);
					if(toi.length=="" || toi.length==0){

					}else{
						toi = toi.val();
						/*alert(toi);*/
						var value = $('#prix_prestation').val();
						var resultat = toi * value ;
						 $('#prix_prestation').val(resultat);


					}
				});

			/*-------------------------*/

			$('#acompte').on("blur",function(h){
					var toi = $(this);
					
						toi = toi.val();
						/*alert(toi);*/
						var value = $('#prix_prestation').val();
						var resultat =  value - toi;
						 $('#reste').val(resultat);
						 if(resultat==0){
						 	$('#etat').val("soldée");
						 }else{
						 	$('#etat').val("En cours");
						 }
						 var code = $('#code_prestation').val();
									$(".fancybox_2").attr("href","include/forms/form-page-constante.php?code="+code);
					
				});

			/*-------------------------*/

			$('#reste').on("blur",function(h){
					var toi = $(this);
					
						toi = toi.val();
						if(toi==""){

						}else if(toi==0){
								$('#etat').val("soldée");
						}else{
								$('#etat').val("En cours");
						}
						
						 
					
				});

			/*-------------------------*/
			

			

				


			$('#categorie_patient_id_categorie').on("change",function(e){

					var val = $(this);
					var valeur = val.find('option:selected').attr('value');
					/*alert(valeur);*/
					/*$('.forInput_constante div.'+valeur+'').show().siblings().hide();*/
					if(valeur=="adulte")
					{
						$('.taille').css("display","block");

						$('.tension_arterielle').css("display","block");
						$('.pouls').css("display","block");
						$('.perimetre_cranien').css("display","none");
						$('.imc').css("display","block");

					}
					else if(valeur=="enfant>1")
					{
							$('.taille').css("display","block");
							$('.tension_arterielle').css("display","none");
							$('.pouls').css("display","none");
							$('.perimetre_cranien').css("display","none");
							$('.imc').css("display","none");
					}
					else if(valeur=="enfant<1")
					{
						$('.perimetre_cranien').css("display","block");
						$('.taille').css("display","none");
						$('.tension_arterielle').css("display","none");
						$('.pouls').css("display","none");
						
						$('.imc').css("display","none");
					}
					
					else{
						$('.taille').css("display","none");
						$('.tension_arterielle').css("display","none");
						$('.pouls').css("display","none");
						$('.perimetre_cranien').css("display","none");
						$('.imc').css("display","none");
					}
					
					
			});
	$('#mode_paiement').on("change",function(e){

					var val = $(this);
					var valeur = val.find('option:selected').attr('value');
					/*alert(valeur);*/
					/*$('.forInput_constante div.'+valeur+'').show().siblings().hide();
					<option value="espece">Espèce</option>
				<option value="cheque">chèque</option>
				<option value="Convention">Convention</option>
				<option value="assurance">assurance</option>
					*/
					if(valeur=="espece")
					{
						$('.assurance').css("display","none");
						$('.Convention').css("display","none");
						$('.numero').css("display","none");

					}
					else if(valeur=="cheque")
					{
						$('.assurance').css("display","none");
						$('.Convention').css("display","none");
						$('.numero').css("display","block");
					}
					else if(valeur=="Convention")
					{
						$('.assurance').css("display","none");
						$('.Convention').css("display","block");
						$('.numero').css("display","none");
					}
					
					else{
						$('.assurance').css("display","block");
						$('.Convention').css("display","none");
						$('.numero').css("display","block");
						
					}
					
					
			});

	