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
				<script language="Javascript" type="text/javascript" src="js/jquery.lwtCountdown-1.0.js"></script>

           
       

        </head>
        <body>
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
              </script>

            <?php require_once('required/class/queries.class.php'); ?>
            <?php require_once('required/class/cms.class.php'); ?>
            <?php include('include/page/controller.php'); ?>
            <?php include('include/page/string_encoder.php'); ?>

            <div class="top-wrap">
                <div class="row-fluid">
                   <div class="container all">
                     <!-- Entete --> 
                    
                      <header>
                        
                           
                            <?php require_once('include/page/header.php'); /**/?>


                      </header>

                      <!-- Menu --> 
                      <section class="wrapper">
                        
                            <?php require_once('include/page/menu.php'); /**/?>
                          
                      </section>

                       


                       

                     <!-- Section Sub Entry -->
                     <section class="wrapper">
                          <div class="content_wrap">
                             <div class="row-fluid">
                                <div class="span9">
                                     <!-- <div class="row-fluid">
                                        <div class="heading span12">
                                              <h2><span>Bienvenu(e),</span></h2>
                                        </div>
                                     </div> -->

                                     
                                           <?php require_once('include/page/more-article.php'); /**/?>
                                              <!-- contenu -->

                                              <?php 
                                                  if($ifSec==1){

                                                       if(isset($_GET['id'])){
                                                              $fonction='Lire'; 
                                                              $element = $_GET['id'];
                                                              
                                                              $index = 'titreArticle';
                                                              $resArt_content_article  = $ListArticle->lire($element,$limite,$ordre);

                                                              echo'<div class="row-fluid">
                                                                    <div class="heading2 span12">
                                                                          <h2><span>'.ucfirst(html_entity_decode($resArt_content_article['titreArticle'])).'</span></h2>
                                                                    </div>
                                                                 </div>';
                                                              
                                                              echo'<div class="row-fluid">
                                                                      <div class="span12">';
                                                               echo '<p>'.html_entity_decode( $resArt_content_article['contenuArticle']).'</p>';
                                                              
                                                              $link ='cat='.$resArt_content_article['categorieterms'].'&id='.$resArt_content_article['idArticle'].'';
                                                              echo $ListArticle ->lireplus('page.php?'.$link.'','btn btn-info span2 plus2');

                                                                echo'</div>
                                                                      </div>';
                                                             }
                                                             else{
                                                              echo '<img src="myadmin/'.html_entity_decode( $resArt_content[$i]['imageCategorie']).'" class="contour">';
                                                              echo '<h5 class="services_title"><span>'.utf8_encode(ucfirst(html_entity_decode( $resArt_content[$i]['nomCategorie']))).'&nbsp;&nbsp;</span></h5>';
                                                              echo '<p>'.html_entity_decode( $resArt_content[$i]['description']).'</p>';

                                                              $link ='cat='.$resArt_content[$i]['categorieterms'].'&id='.$resArt_content[$i]['idArticle'].'';
                                                              echo $ListArticle ->lireplus('page.php?'.$link.'','btn btn-info span2 plus2');
                                                               
                                                            }
                                                  }else{

                                                    for($i=0;$i<sizeof($resArt_content);$i++){
                                                              if($ifId==2){

                                                                 echo'<div class="row-fluid">
                                                                    <div class="heading2 span12">
                                                                          <h2><span>'.utf8_encode( ucfirst(html_entity_decode( $resArt_content[$i]['titreArticle']))).'</span></h2>
                                                                    </div>
                                                                 </div>';

                                                               echo'<div class="row-fluid">
                                                                      <div class="span12">';
                                                              echo '<p>'.html_entity_decode( $resArt_content[$i]['contenuArticle']).'</p>';

                                                               echo'</div>
                                                                      </div>';
                                                            }
                                                             else{ 
                                                            echo '<br><h5 class="services_title"><span>'.utf8_encode(ucfirst(html_entity_decode( $resArt_content[$i]['titreArticle']))).'&nbsp;&nbsp;</span></h5>';
                                                             echo '<p>'.html_entity_decode( $resArt_content[$i]['extrait']).'</p>';
                                                             /*Btn Read More*/
                                                               $link ='cat='.$resArt_content[$i]['categorieterms'].'&id='.$resArt_content[$i]['idArticle'].'';
                                                            echo '<p>'.$ListArticle ->lireplus('page.php?'.$link.'','btn span2').'</p><br>'; 
                                                            }
                                                     }
                                                  }

                                               ?>
                                               
                                              
                                      

                                </div>

                                <!-- Right -->
                                    <div class="span3">
                                         <div class="row-fluid line1">
                                                <div class="span12 social">
                                                <h2 class="titre bleu">Réseaux Sociaux</h2>
                                                <div class="bg_menus"></div>
                                                       <!--  -->
                                                        <?php include('include/page/social.php'); ?>

                                                </div>
                                          </div>
                                    </div>
                             </div>
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