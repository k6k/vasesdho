<div class="row-fluid" id="top">
				<div class="container">
					<div class="span3"> <img src="pictures/noobs.png"/> <!----></div> 
					<div class="span2 offset6"> <div class="btn-group">
											  <button class="btn btn-info"><i class="icon-user"></i>
											  <?php 
											  if(isset($_SESSION['appUserName'])){
													
													if($_SESSION['appUserTyp']=="docteur"){
															echo 'Bienvenu(e), Dr '.$_SESSION['appUserName'];
													}else{
														echo 'Bienvenu(e),'.$_SESSION['appUserName'];
													}
												} else{
													echo 'Anonymous';
												}
												?> </button>
											  <button class="btn dropdown-toggle btn-info" data-toggle="dropdown">
											    <span class="caret"></span>
											  </button>
											  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
											   <!-- <li><a href=""><i class="icon-eye-open"></i>  Voir mon Compte</a></li> -->
											   <li><a href="formulaire.php?form=utilisateur&id=<?php echo $_SESSION['appUserId'];?>"><i class="icon-edit"></i>  Modifier mes informations</a></li>
											   <li><a href="deconnexion.php"><i class="icon-off"></i> Déconnexion</a></li>
											   <!-- <li><a href="">a</a></li> -->
											  
											  </ul>
											</div>
				 <!----></div> 
					
				</div>
			</div>