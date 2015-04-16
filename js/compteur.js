function dateDiff() {
				//On récupère la date du jour
					var today = new Date();
					//Le numéro du jour
					var numDay = today.getDay();
					//console.log(numDay);
					if(numDay <3 && numDay >1){
						var toadd = 3 - numDay;
						var nextD = new Date();
						nextD.setDate(nextD.getDate() + toadd);
						nextD.setHours(18,30,10);
					}else if(numDay ==3){
						if(today.getHours()<= 18 && today.getMinutes()<30){
							var toadd = 3 - numDay;
						var nextD = new Date();
						nextD.setDate(nextD.getDate() + toadd);
						nextD.setHours(18,30,10);
						}else{
							var toadd = 7 - numDay;
						var nextD = new Date();
						nextD.setDate(nextD.getDate() + toadd);
						nextD.setHours(8,00,10);
						}
					}
					else if(numDay == 0){
						
						if(today.getHours() < 8){
						var toadd =  numDay;
						var nextD = new Date();
						nextD.setDate(nextD.getDate() + toadd);
							nextD.setHours(8,00,10);
						}else if(today.getHours() <= 10 && today.getHours()>=8){
						var toadd =  numDay;
						var nextD = new Date();
						nextD.setDate(nextD.getDate() + toadd);
							nextD.setHours(10,30,10);
						}else {  
							var toadd = 3-numDay;
							var nextD = new Date();
							nextD.setDate(nextD.getDate() + toadd);
							nextD.setHours(18,30,10);
						}
						//nextD.getMinutes(30);
						//var nextculte = new Date(nextD+' 07:30');
					}else{
						var toadd = 7 - numDay;
						var nextD = new Date();
						nextD.setDate(nextD.getDate() + toadd);
							nextD.setHours(8,00,10);
					}
					
				var diff = {};
				
				var tmp = nextD - today;
 
				tmp = Math.floor(tmp/1000);             // Nombre de secondes entre les 2 dates
				diff.sec = tmp % 60;                    // Extraction du nombre de secondes
			 
				tmp = Math.floor((tmp-diff.sec)/60);    // Nombre de minutes (partie entière)
				diff.min = tmp % 60;                    // Extraction du nombre de minutes
			 
				tmp = Math.floor((tmp-diff.min)/60);    // Nombre d'heures (entières)
				diff.hour = tmp % 24;                   // Extraction du nombre d'heures
				 
				tmp = Math.floor((tmp-diff.hour)/24);   // Nombre de jours restants
				diff.day = tmp;
				$('.digit_j').html(diff.day);
				$('.digit_m').html(diff.min);
				$('.digit_h').html(diff.hour);
				$('.digit_s').html(diff.sec);
				console.log(diff);
			}
			setInterval(dateDiff,1000);
			dateDiff();