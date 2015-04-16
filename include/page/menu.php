<div class="row-fluid" id="menu-horizontal">

				 <div class="container"> 
					 <div class="span12 navb">
					 			<div class="navbar " id="horiz">
									  <div class="navbar-inner2" id="menuu">
									    <div class="container ">
									 
									     
									      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
									        <span class="icon-bar"></span>
									        <span class="icon-bar"></span>
									        <span class="icon-bar"></span>
									      </a>
									 
									     
									      <div class="nav-collapse collapse">
									       <ul class="nav" id="navMenu"> 

											       	   <?php 
		                                                $ListArticle = new MyCms;
		                                                $resArt=$ListArticle->ListMenubyLang('Fr');

		                                                /*var_dump($resArt);*/
		                                                $a = 0; // Compteur de Menu parcouru
		                                                for($i=0;$i<sizeof($resArt);$i++){
		                                                	$a++;
			                                                	if($resArt[$i]['nombre']==0)
			                                                	{
		                                        		?>
		                                        			<li class="simple">
                                                                <a href="<?php 
                                                                if($i==0 || $i<=sizeof($resArt)){
                                                                	echo $resArt[$i]['link'];
                                                                }else{
                                                                echo $resArt[$i]['link'].'&id='.$resArt[$i]['idMenu'];
                                                           		 }
                                                                 ?>"> <?php 
                                                                 			echo '<i class="'.$resArt[$i]['icone'].'"></i>&nbsp;&nbsp;';
                                                                 			echo ucfirst($resArt[$i]['Menu']); ?></a>
                                                              </li>
                                                             <?php 
                                                             	if($a==sizeof($resArt))  {
                                                              	
                                                             		}else{
                                                             				/*icon-home echo '<li class="divider-vertical"></li>';<i class="icon-home icon-white"></i> */
                                                             		}
                                                               ?>
														 <?php
														 		}else{
														 ?>
														 			 <li class="dropdown"><a href="<?php echo $resArt[$i]['link']; ?>" class="dropdown-toggle" role="button" data-toggle="dropdown" > <?php echo '<i class="'.$resArt[$i]['icone'].'"></i> &nbsp;&nbsp;'; echo $resArt[$i]['Menu']; ?>  <span class="bottom-chevron"></span></a>
														 			 	<ul class="dropdown-menu" id="sub-menu">
														 			 		<?php 
														 			 		 $resSubMenu=$ListArticle->ListSubMenu($resArt[$i]['idMenu']);
														 			 				for($j=0;$j<sizeof($resSubMenu);$j++){
														 			 					/*echo $resSubMenu[$j]['subMenu'];*/
														 			 		?>
														 			 				<li><a href="<?php echo $resSubMenu[$j]['menulink']; ?>"><?php 

														 			 																			echo ucfirst($resSubMenu[$j]['subMenu']); ?></a></li>
														 			 			
														 			 		<?php
														 			 		
														 			 				}
														 			 		 ?>

														 			 	</ul>
														 			 </li>
														 			 
                                                             	
                                                               
														 <?php
														 					if($a==sizeof($resArt))  {
                                                              	
                                                             		}else{
                                                             				/*echo '<li class="divider-vertical" ></li>';*/
                                                             		}
														 		}
														 	}
														 ?>
											</ul>
									      </div>
									 
									    </div>
									  </div>
								</div>
					</div>	 	
				</div>	 			
		</div>
								<script type="text/javascript">
										$(document).ready(function () {
										$('.dropdown-toggle').dropdown();
											$('.simple').mouseover(function(){
													$(this).siblings().removeClass('open');
											});
											$('.dropdown').mouseover(function(){
													
													$(this).addClass('open');
													var id = $(this).attr('id');
													$(this).siblings().removeClass('open');
													// alert(id);
													// $('li:#not(.'+id+'.)')removeClass('open');
													
											});

											$('.dropdown ul li a').mouseleave(function(){
												$(this).delay(1000).removeClass('open');
												
											});

											$('.navb').mouseleave(function(){
												$('ul.nav li.open').delay(1000).removeClass('open');
											});
										});

										
										
									</script>