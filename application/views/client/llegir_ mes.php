<html>
    <head>
        <title>Club natació Tortosa - Actualitat</title>
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
		<ul class="slider">			    
			<li><img src="<?php echo base_url('assets/client/img/Swim_SportHeader_1280x300.jpg'); ?>" ></li>
			<li><img src="<?php echo base_url('assets/client/img/03vuelos-1280x300.jpg'); ?>" ></li>	     
		</ul>

		<div class="container">
			<div class="row">	
				<div class="col-xs-12 col-sm-12 col-md-12">
					<h1 class="text-center title-page">Actualitat					
				</div>	
					
			</div>
		</div>
		<div class="container-fluid">
			
			<div class="row">
				    			        	
			        	<div class="col-xs-12 col-sm-4 col-md-4">
				            <div class="thumbnail card">
				                <img  src="<?php echo $llistaractualitat['foto'];?>" class="img-responsive" />
				                <div class="caption">
				                <h4><?php echo $llistaractualitat['titol']; ?></h4>
				                    <p>
				                    	<?php echo substr($llistaractualitat['comentari'],0,150); ?>
				                    </p>
		                            <div class="btn-read-more-container">
		                            <form method="post" action="<?php echo base_url() ?>index.php/client/llegir_mes/<?php echo $llistaractualitat['id_blog']; ?>">
		                                <a href="llegir_mes">
			                                <button type="submit" class="btn  btn-read-more">
			                              		Llegir més <i class="fa fa-angle-right"></i>
			                              	</button>
		                              	</a>		                              		
		                              	</form>
		                            </div>
				                </div>
				            </div>
			            </div>
			          
				           	</div>
				
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