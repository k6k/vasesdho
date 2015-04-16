 <?php include("head.php"); ?>
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
	 <link href="css/bootstrap-dropdown.css" rel="stylesheet"  type="text/css" media="screen">
	 <link href="css/scrollbar.css" rel="stylesheet"  type="text/css" media="screen">
	 <link href="css/bootstrap-tooltip.css" rel="stylesheet"  type="text/css" media="screen">
	 <link href="css/tipTip.css" rel="stylesheet"  type="text/css" media="screen">

	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
	 <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
	 <script type="text/javascript" src="js/bootstrap-tooltip.js"></script>
	 <script type="text/javascript" src="js/jquery.tipTip.js"></script>
	 <script type="text/javascript" src="fckeditor/fckeditor.js"></script>

</head>
<body>

			<?php include("include/page/top.php"); ?>
			<?php include("include/page/menu-horizontal.php"); ?>
			
			<div class="row-fluid" >
				<div class="container" id="general">

					
				
					<div class="span2">&nbsp;</div>
				
					 <div class="span9">
					 		<div class="row-fluid  bordure white marge">
						 	<div class="page-header">
						 		<h4 class="Heading4">Bienvenu(e) sur Votre Dashboard !</h4>
						 	</div>

						 	<section>
						 		
						 		
						 	</section>

						 	<section></section>
						 	</div>
						 		<div><br/></div>
						 	
						</div> 

			</div>

				<div class="row-fluid">
					<?php include("include/page/footer.php"); ?>
				</div>
		</div>
		

	
	<script type="text/javascript">
	$(document).ready(function() {
		$('.tool').tooltip();
		
			
	});

				
			$(function(){
			$(".someClass").tipTip();
			});
			$(".fancybox").fancybox({ 

					 afterClose : function() { 

					 location.reload(); 

					 return; 

					 } 

				 });	
		 
	</script>
	

</body>
</html>