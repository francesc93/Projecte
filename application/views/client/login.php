<head>
        <title>Club natació Tortosa - login</title>
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
		<br/><br/>
		<?php echo validation_errors(); ?>
		<div class="container">
			<div class="row"> 
				<div class="form-wrapper">				   
				<div class="linker"> 				     
					      <span class="ring"></span>
					      <span class="ring"></span>
					      <span class="ring"></span>
					      <span class="ring"></span>
					      <span class="ring"></span>
				</div>

				<form class="login-form" method="post" action="<?php echo base_url('index.php/client/iniciar_sessio'); ?>">				   
					     <input class="form-control" type="text" name="email" placeholder="Email" /><br/>
					      <input class="form-control" type="password" name="contrasenya" placeholder="password" />				      
					      <button type="submit">Log in</button>
				</form>
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