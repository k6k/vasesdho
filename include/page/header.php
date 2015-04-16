 							
                                <div class="row-fluid">
                                	
	                                	<div class="navbar-fixed-top">
                                            <div id="top-bar">
        	                                		<div class="container">
        	                                		   <div class="span7 news">
        			                                		   <!-- <ul>
        			                                		   	<li> <a href="">Rasemblement des champions : Pourquoi Tant de blocages ?</a></li>
        			                                		   </ul> -->
                                                                <div class="sliderkit newslider-minimal">           
                                                                   <div class="span3"> <div class="sliderkit-legend"> Annonces : </div></div>
                                                                   <div class="span9 "> 
                                                                   <?php 
                                                                            $ListArticle = new MyCms;
                                                                            $news = $ListArticle->CatArticle('annonces',10,"DESC");
                                                                   
                                                                        echo '<div class="sliderkit-panels">';
                                                                        for ($i=0; $i < sizeof($news); $i++) { 
                                                                             echo' 
                                                                          <div class="sliderkit-panel regular">
                                                                            <a href="#" title="[link title]">'.utf8_encode( ucfirst(html_entity_decode($news[$i]['contenuArticle']))).'</a>
                                                                          </div>';
                                                                        }
                                                                      echo '</div>';
                                                                      /*var_dump($news);*/
                                                                     ?>    
                                                                    </div>
                                                                   
                                                                </div>
        	                      					   </div>

        	                      					   <div class="span5">
        	                      					   			<div class="live_countdown  visible-desktop" id="jsHeaderCountdown">
                                                                  <!---  <ul class="live_countdown_timer">
                                                                        <li class="day" id="jsCountdownDays">4 <span>dys</span></li>
                                                                        <li class="hour" id="jsCountdownHours">18 <span>hrs</span></li>
                                                                        <li class="minute" id="jsCountdownMins">16 <span>mns</span></li>
                                                                        <li class="second" id="jsCountdownSecs">4 <span>secs</span></li>
                                                                    </ul>
																	
																	<div class="live_info_title">
                                                                        <h4>Pro</h4>
                                                                    </div>
																	 --->
																	 <div class="countdown_dash">
                                                                        <span>Prochain culte dans :</span>
                                                                    </div>
																	 <div id="countdown_dashboard">
																				<!--<div class="dash weeks_dash">
																					<span class="dash_title">Prochain</span>
																					<div class="digit">0</div>
																					<div class="digit">0</div>
																				</div>-->

																				<div class="dash days_dash">
																					<span class="dash_title">Jrs</span>
																					
																					<div class="digit_j digit">0</div>
																				</div>

																				<div class="dash hours_dash">
																					<span class="dash_title">Hrs</span>
																					
																					<div class="digit_h digit">0</div>
																				</div>

																				<div class="dash minutes_dash">
																					<span class="dash_title">Min</span>
																					
																					<div class="digit_m digit">0</div>
																				</div>

																				<div class="dash seconds_dash">
																					<span class="dash_title">Sec</span>
																					
																					<div class="digit_s digit">0</div>
																				</div>

																			</div>
                                                                    
                                                                </div>
        	                      					   </div>
        	                                		</div>
                                            </div>
	                                	</div>
                                	
                                </div>
                                <div class="row-fluid sub_top ">
                                    <div class="span2">
                                        <img src="pictures/logo.png" alt="logo" title="logo" class="logo" style="width:120px;"><!-- <figure></figure> -->
                                        
                                    </div>
                                    <div class="span4 name">
                                    	 <p>Vases d'Honneur </p>
                                    	 <div class="sub-name">Abidjan-Sud</div>
                                    	 <!-- <sub></sub> -->
                                    </div>
                                    <div class="span4 offset2">
                                    	<div class="row-fluid">
                                    			<ul class="socials">
                                    				<li> <a href="https://www.facebook.com/pages/Eglise-Vases-dHonneur-Abidjan-sud/173185566035855?fref=ts"target="_blank"><img src="pictures/facebook.png" alt="" style="width:50px;"> </a></li>
                                    				<li> <a href=""><img src="pictures/youtube.png" alt="" style="width:50px;"> </a></li>
                                    				
                                    			</ul>
                                    	</div>
                                    	<div class="row-fluid">
                                    		<div class="span6" id="search">
                                    			<form>
                                    				<div class="input-append">
													  <input class="span12" id="appendedInputButton" type="text" placeholder="Recherche">
													  <button class="btn btn-danger" type="button"><i class="icon-search icon-white"></i></button>
													</div>
                                    			</form>
                                    		</div>
                                    	</div>
                                    </div>
                                   
                                </div>
                          