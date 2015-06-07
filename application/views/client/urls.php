<html>
 <head>
        <title>Club natació Tortosa - Enllaços</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 		<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/client/js/bootstrap.min.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/client/css/bootstrap.css'); ?>">
		<script src="<?php echo base_url('assets/client/js/script.js'); ?>"></script>
		<link rel="stylesheet" href="<?php echo base_url('assets/client/css/estil.css'); ?>">		
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300,200' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
    <body>
	    <?php (include 'header.php');?>
	    <br/>
	    <div class="container">
				<div class="row">
					<div class="col-md12">
						<h1 class="text-center title-page">Enllaços </h1>
					</div>
				</div>
		</div>
    	
		    <div class="container">
		    <div class="row">
		    <div class="col-lg-12">
		    <div class="panel panel-danger">
			<div class="panel-heading"> <p style="color:grey;">Aquí teniu alguns enllaços d'utilitat: </p></div>
		   
		    <?php foreach($this->_ci_cached_vars as $index => $llistardocument){ ?>	
			   	<div class="panel-body">
					<p>
				    	<span class="glyphicon glyphicon-paperclip">&nbsp;</span><a class="btn  btn-read-more" target="_blank" href="<?php echo $llistardocument['URL']; ?>"> <?php $nom = basename($llistardocument['TITUL'], ".pdf"); echo $nom;?> </a>
				    </p>
				</div>					
		    <?php } ?>
		   </div>
				</div><!-- /.col-->
			</div><!-- /.row -->
		    </div>
    
    	<?php (include 'footer.php');?>
    	<script type="text/javascript">
				$(window).scroll(function() {
				if ($(this).scrollTop() > 1){  
				    $('header').addClass("sticky");
				  }
				  else{
				    $('header').removeClass("sticky");
				  }
				});
				/*$(window).scroll(function() {
				if ($(this).scrollTop() > 1){  
				    $('nav').addClass("sticky");
				  }
				  else{
				    $('nav').removeClass("sticky");
				  }
				});*/
		</script>
    </body>
</html>