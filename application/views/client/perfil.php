<html>
    <head>
        <title>Club natació Tortosa - Perfil</title>
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
    	<br />
    	
		<div class="container-fluid">
			<div class="row">
			 	<div class="col-xs-12 col-sm-8">
				   	<div class="panel panel-danger">
					  <div class="panel-heading"><h4>Dades de perfil</h4></div>
					   <div class="panel-body">
						   <div class="container">		
						        <div class="row ">					        
							     	<div class="col-xs-12 col-sm-3">
								       	 <img src="<?php echo $this->session->userdata('FOTO');?>"  class="img-thumbnail img-circle img-responsive">
								         <a href="#" target="_blank"> <!--200x200--></a>        
							        </div>
							        
							      	<div class="col-xs-12 col-sm-3">								       
								        <p>Nom : <?= $this->session->userdata('NOM');?></p>
								        <p>Cognoms : <?= $this->session->userdata('COGNOMS');?></p>
								        <p>Data naixement : <?= $this->session->userdata('DATA_NAIXEMENT') ;?> </p>
								         <p>Email : <?= $this->session->userdata('EMAIL');?></p> 
								        <p>Rol : <?=$this->session->userdata('ROL');?> </p>
								        <p>Estat : <?= $this->session->userdata('ESTAT');?></p>
								        <p>Categoria : <?= $this->session->userdata('CATEGORIA');?></p>
							      	</div>
						  		</div>
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