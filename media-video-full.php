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
            <?php/* include('include/page/controller.php'); */?>
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
                                      <div class="row-fluid">
                                      <?php 
                                       $ListCatEvent = new MyCms;
                                          if(isset($_GET['id'])){

                                                         $list=$ListCatEvent->SelectMedia($_GET['id'],1,"DESC");
                                            }
                                       ?>
                                        <div class="heading2 span12">
                                              <h2><span>Médiathèque : <?php echo $list[0]['titreMedia']; ?> </span></h2>
                                        </div>
                                     </div> <!---->

                                     <div class="row-fluid">
                                       
                                     
                                           <?php require_once('include/page/more-article.php'); /**/?>
                                              <!-- contenu -->
                                               <?php
                                                 
                                                 

                                                    if(isset($_GET['id'])){

                                                         $list=$ListCatEvent->SelectMedia($_GET['id'],1,"DESC");
                                                         /*var_dump($list);*/


                                                         $rep= $list[0]['chemin'];
                                                        
                                                       
                                                         

                                                            echo "<ul class='gallery'>";
                                                            
                                                              
                                                                        echo '<li class="span6">
                                                                                  
                                                                                  '.html_entity_decode($rep).'
                                                                        </li>';
                                                                        
                                                              
                                                            
                                                            
                                                            echo "<ul>";
                                                    }
                                                  
                                                       

                                                ?>

                                              <!-- <audio controls="control" src="medias/audio/test1.mp3" type="audio/mp3"></audio> -->

                                      </div>      

                                               
                                              
                                      

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
              $("a.fancybox").fancybox();
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