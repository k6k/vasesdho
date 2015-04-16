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
            <title></title> 

            <link rel="stylesheet" type="text/css" media="screen" href="css/all.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="css/scrollbar.css" />

            <link href="css/framework2.css" rel="stylesheet" media="screen">
            <link href="css/framework-responsive2.css" rel="stylesheet" media="screen">
            <link href="css/jquery.bxslider.css" rel="stylesheet" />
            


             <script src="js/jquery.js" type="text/javascript"></script>
             <script src="js/framework.js" type="text/javascript"></script>
             <script src="js/holder.js" type="text/javascript"></script>
              <script src="js/jquery.bxslider.js" type="text/javascript"></script>
			  <script language="Javascript" type="text/javascript" src="js/jquery.lwtCountdown-1.0.js"></script>
            <script type="text/javascript">
                  $(document).ready(function(){
                      
                      $('.slider4').bxSlider({
                          /**/auto: true,
                          autoControls: false,
                          slideWidth: 10,
                          minSlides: 2,
                          maxSlides: 4,
                          moveSlides: 1,
                          slideMargin: 10
                        });
						 $('.datepicker').datepicker();
						 $('#countdown_dashboard').countDown({
					targetDate: {
						'day': 		29,
						'month': 	9,
						'year': 	2013,
						'hour': 	1,
						'min': 		0,
						'sec': 		0
					}
				});
                  });
                  </script>
       

        </head>
        <body>
            <?php require_once('required/class/queries.class.php'); ?>
            <?php require_once('required/class/cms.class.php'); ?>

            <div class="row-fluid">
                <div class="container all">
                       <header>
                        <!-- Entete -->
                           
                            <?php require_once('include/page/header.php'); ?>


                      </header>

                        <!-- MENU -->

                            <section class="wrapper">
                               <div class="lemenu"><?php include("include/page/menu.php"); ?>
                               </div>
                                                                                                    
                            </section>
                     

                      <!-- Services -->

                      <section class="services wrapper">
                       <div class="span6">
                          <?php include('include/assets/forms/form-contact.php'); ?>
                       </div>
                       <div class="span5 offset1">
                        <br>
                        <h5>Pour mieux vous servir</h5>
                         <ul class="servir">
                            <li>ATHENA CONSEILS Abidjan,Côte d'Ivoire </li>
                            <li>&rarr; Tel:         +225 22 43 98 52 </li>
                            <li>ATHENA CONSEILS Bamako,MALI</li>
                            <li>&rarr; Tel:         +223 70 92 14 61 </li>
                         </ul>
                       </div>
                      </section>

                    <!-- About us -->
                      

                      
                      
                </div>
            </div>

            <!-- Other -->
                      <?php require_once('include/page/footer.php'); ?>

              


           
          
          


        </body>
    </html>