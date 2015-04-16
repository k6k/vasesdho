				$(document).ready(function(){
            $('.datepicker').datepicker();
				});
 $('#prix_prestation').on("click"function(r){
          /*var pat = $('#patient_num_patient').val();*/
         
        });
        /*Autocomplétion patient*/
        

				/*Lorsqu'on change le details de la prestation on met à jour automatiquement son coût*/
 				/*$("#details_de_prestation").on("change",function() {
                      $.ajax({
                         type: "POST",
                         url: "include/function/loadPrestPrice.php",
                        
                         data:{                          
                          'details_de_prestation':$('#details_de_prestation option:selected').val()
                         } ,
                         dataType:"html",
                         cache:false,
                         success: function(data){
                         
                           $("#cout_prestation").val(data)
                         }
                       });
                    
                      	$("#duree").val('');
                        });
*/

 				/*Quand on change la durée de la prestation on met a jour le cout*/
                   
					/* $('#duree').on("blur",function(){
                    var obj = $(this).val();
                   var prix = $("#cout_prestation").val() * obj;
                    $("#cout_prestation").val(prix);
                    $("#net_a_payer").val(prix);
					});*/

       /*Lorsque='on change le taux on met à jour le net à payer*/
					$('#moyen').on("change",function(){
					
					var montant = $("#net_a_payer").val();
					var selectTyp = $('#type_client option:selected').attr('class');

					if(selectTyp=="assuranceFields")
					{
							var taux = $('#taux_assur').val();
							var totalp= (montant*taux)/100;
                   			var total = montant-totalp;
					}					
					else if(selectTyp=="partnerFields"){
						var taux = $('#taux_conv').val();
						var totalp= (montant*taux)/100;
                   		var total = montant-totalp;
					}
					else{
							
							var total= montant;
                   			
					}

                    
                     /*alert(taux);*/
                   	
                  $("#net_a_payer").val(total);
                 
					/*-----------------*/


					});

