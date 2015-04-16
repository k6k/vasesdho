
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="florian cherel enoh,Développeur - UI designer">
	<title>My Content Manager</title>
	<script src="js/jquery.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/all.css" />
	<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css" />
	
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
	 <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	 <link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	 <link href="css/jquery.fancybox.css" rel="stylesheet"  type="text/css" media="screen">

	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>

	  <style type="text/css">
            body{
             
            }
            form{
              width: 700px;
              background: white;
              border:1px solid #DFDFDF;
              
            }
            div.forbutton{
              margin-bottom: -2px;
              border-bottom: 1px solid #E5E5E5;
            }
            div#form1{
              margin-top: 5px;
              
              
              padding:2em 2em;
              border-radius: 5px 5px 5px 5px ;
              -webkit-border-radius:5px 5px 5px 5px ;
              -moz-border-radius: 5px 5px 5px 5px ;
            }
            div#conteneur{
            	margin-top: 50px;
            }
            div#result{
               width: 700px;
            }
        </style>

</head>
<body>

			 <div class="row-fluid" id="conteneur">
                                           <div class="span3"></div>
                                        <div class="span8">
                                          <div id="result"></div>
                                          <form class="form-horizontal" method="POST" action="include/recup/recup-connexion.php">

                                              <div id="form1">
                                             <fieldset>

                                                <legend>Connectez-vous <span id="hide" style="color:red;font-size:12px;text-align:right;"></legend>
                                           
                                      

                                             <div class="control-group">
                                                <label class="control-label" for="login">Nom d'utilisateur</label>
                                                <div class="controls">
                                                  <input type="text" id="login" name="login" required >
                                                </div>
                                              </div>


                                              <div class="control-group">
                                                <label class="control-label" for="password">Mot de passe</label>
                                                <div class="controls">
                                                  <input type="password" id="password" placeholder="" name="password" required>
                                                </div>
                                              </div>

                                                                                           
                                            </fieldset>
                                          </div>
                                            <div class="form-actions forbutton">
                                                     <button type="submit" class="btn" id="connexion">Connexion !</button>
                                                    </div>
                                            </div>
                                           
                                         

                                      </form>
                         
                             </div>
		

          	<script type="text/javascript">
                         $(document).ready(function() {
                        

                            $("#connexion").on("click",function(i){
                                var login = $("#login").val();
                          var password = $("#password").val();
                               /* alert('ok');*/
                                  $.ajax({

                                     type: "POST",

                                     url: "include/recup/recup-connexion.php",

                                     data : {' login': login,' password': password},

                                     dataType: "html",

                                     cache: false,

                                     beforeSend: function () { 

                                        $(".loader").html('<img src="pictures/ajax-loader2.gif" /> La Génération est en Cours...');  

                                     }, 

                                     success: function(data){ 

                                           $("#result").empty().html(data); 

                                           $(".loader").fadeOut(1000); 

                                           $('html,body').animate({scrollTop: 0}, 'slow'); 

                                        } 

                                     }); 

                                   return false; 
                             });
                         });
            </script>
          	
	

</body>
</html>