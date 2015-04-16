    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    
        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
           
            
            <meta name="author" content="Florian Cherel Dev web - UI Designer ">
            <title>Vases d'Honneur Abidjan-sud,Le Lieu où les gens ordinaires deviennent des champions!</title> 

            <link rel="stylesheet" type="text/css" media="screen" href="css/all.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="css/scrollbar.css" />
            <link rel="stylesheet" type="text/css" href="css/sliderkit-site.css" media="screen, projection" />
            <link rel="stylesheet" type="text/css" href="css/sliderkit-demos.css" media="screen, projection" />
            <link rel="stylesheet" type="text/css" href="css/sliderkit-core.css" media="screen, projection" />
            <link rel="stylesheet" type="text/css" href="css/livecount.css" media="screen, projection" />
        <!--<link href='http://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet' type='text/css'>      -->
            
            <link href="css/framework2.css" rel="stylesheet" media="screen">
            <link href="css/framework-responsive2.css" rel="stylesheet" media="screen">
            <link href="css/jquery.bxslider.css" rel="stylesheet" />
            
            <link rel="stylesheet" type="text/css" media="screen" href="css/default.css" />
            <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />


             <script src="js/jquery.js" type="text/javascript"></script>
             <script src="js/framework.js" type="text/javascript"></script>
             <script src="js/holder.js" type="text/javascript"></script>
             <script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
             <script type="text/javascript" src="js/jquery.sliderkit.js"></script>
			 <!--<script language="Javascript" type="text/javascript" src="js/jquery.lwtCountdown-1.0.js"></script>-->
	


           
       

        </head>
        <body>
            <?php require_once('required/class/queries.class.php'); ?>
            <?php require_once('required/class/cms.class.php'); ?>

            <div class="top-wrap">
                <div class="row-fluid">
                   <div class="container all">
                     <!-- Entete --> 
                    
                      <header>
                        
                           
                            <?php require_once('include/page/header.php'); /**/?>


                      </header>

                      <!-- Menu --> 
                      <header>
                        
                            <?php require_once('include/page/menu.php'); /**/?>
                           


                      </header>

                       

                      <!-- Slide -->
                      <section class="wrapper">
                            <!--<img src="pictures/slides/slide1.png">-->
                                 <?php require_once('include/page/slide_principal.php');/**/ ?>
                      </section>

                       <!-- AD BAR -->
                      <section class="wrapper">
                          <div class="row-fluid">
                              <div class="span12">  
                                <div id="ad_bar">
                                  <ul>
                                    <li><a class="ad1" href="#"><!-- Horaires des Cultes --></a></li>
                                    <li><a class="ad2" href="gallerie.php">Médiathèque</a></li>
                                    <li><a class="ad3" href="page.php?cat=l_ecole_du_potier&id=18">Formations</a></li>
                                  </ul>
                                </div>
                              </div>
                          </div>
                      </section>

                     <!-- Section Sub Entry -->
                     <section class="wrapper blocs">
                            <div class="span9">
                                  <div class="row-fluid">
                                      <div class="heading span12">
                                            <h2><span>Bienvenu(e),</span></h2>
                                      </div>
                                  </div>
                                  <div class="row-fluid">

                                      <div class="span12">
                                       <?php require_once('include/page/more-article.php'); /**/?>
                                          <!-- Discover -->
                                           <?php
                                                  $ListArticle = new MyCms;
                                                  $discover=$ListArticle->CatArticle('bloc_decouverte',1,"DESC");
                                                  $faith=$ListArticle->CatArticle('bloc_foi',1,"DESC");
                                                  $Department= $ListArticle->CatArticle('bloc_departements',1,"DESC");
                                                  $playlist= $ListArticle->CatMedia('audio',5,"DESC");
                                                  /*var_dump($discover);*/
                                                  /*$title =  html_entity_decode($motpca[0]['titreArticle']);
                                                  echo $title;*/
                                              ?>
                                          <div class="span4">
                                              <div class="vignette">
                                               <img src="pictures/decouverte.png">
                                                  <div class="titre_vignette">
                                                      <?php echo html_entity_decode($discover[0]['titreArticle']); ?>
                                                  </div>
                                              </div>
                                              <div class="vignette_text">
                                                  <?php 
                                                        echo html_entity_decode($discover[0]['extrait']); 
                                                        echo Readmore('page.php?cat=presentation&id=9');
                                                  ?>

                                              </div>
                                          </div>

                                          <!-- Faith entry -->
                                          <div class="span4">
                                                 <div class="vignette">
                                                      <img src="pictures/tribune_foi.png">
                                                      <div class="titre_vignette">
                                                          <?php echo html_entity_decode($faith[0]['titreArticle']); ?>
                                                      </div>
                                              </div>
                                              <div class="vignette_text">
                                                  <?php 
                                                        echo html_entity_decode($faith[0]['extrait']); 
                                                        echo Readmore('#');
                                                  ?>

                                              </div>
                                          </div>

                                          <!-- Department space -->
                                          <div class="span4">
                                                <div class="vignette">
                                                      <img src="pictures/departements.png">
                                                      <div class="titre_vignette">
                                                          <?php echo html_entity_decode($Department[0]['titreArticle']); ?>
                                                      </div>
                                                    </div>
                                                    <div class="vignette_text">
                                                        <?php 
                                                              echo html_entity_decode($Department[0]['extrait']); 
                                                              echo Readmore('page.php?cat=departement_de_l_eglise&id=8');
                                                        ?>

                                                    </div>
                                          </div>

                                      </div>


                                  </div>
                          </div>

                              <div class="span3 bordure playlist">
                                <ul class="playlist_title">
                                  <li>Dernière </li>
                                  <li>PlayList </li>
                                  <li>MP3</li>
                                </ul>

                                <ul class="playlist_list">
                                  
                                  <?php 
                                  
                                      for($i=0;$i<sizeof($playlist);$i++){
                                        echo'<li> <a href="media-audio-full.php?id='.$playlist[$i]['idMedia'].'">'.html_entity_decode($playlist[$i]['titreMedia']).' </a> </li>' ;
                                      }
                                   ?> 
                                  <li> <a href="medias.php?type=audio"><button class="btn btn-danger"> <i class="icon-headphones  icon-white"></i> Ecouter</button> </a></li>
                                 
                                </ul>
                              </div>

                     </section>
                      

                      
                  </div>
                </div>
            </div>

            <!-- Other -->
                      <?php require_once('include/page/footer.php');/**/ ?>

              


           
          <script type="text/javascript">
          $(window).load(function() {
              $('#slider').nivoSlider();

               $(".newslider-minimal").sliderkit({
                        auto:true,
                        circular:true,
                        shownavitems:1,
                        panelfx:"sliding",
                        panelfxspeed:400,
                        panelfxeasing:"easeOutCirc",
                        mousewheel:false,
                        verticalnav:true,
                        verticalslide:true
                      });
		
          });
            
          </script>
          

			<script language="Javascript" type="text/javascript" src="js/compteur.js"></script>
        </body>
    </html>  
            
		
		
         
          

