<html>
    <head>
        <title>Club natació Tortosa - Contacta</title>
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
					<h1 class="text-center title-page">Contacta</h1>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Si teniu alguna cosa a comentar, proposar o consultar, podeu omplir el següent formulari i intentarem ajudar-vos </div>
						<div class="panel-body">
							<?php echo validation_errors(); 
							
								if($this->session->flashdata('envio')){
								    echo $this->session->flashdata('envio');
								}
							?>
							<form action="enviar" method="post" enctype="multipart/form-data">		
								<div class="col-md-6">								
									<div class="form-group">
										<label>Nom</label>
										<input class="form-control" name='nom'>
									</div>									
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" name='email'>
									</div>
									
									</div>
									<div class="col-md-6">	
									<div class="form-group">
										<label>Asumpte</label>
										<input class="form-control" name='asumpte'>
									</div>	
									<div class="form-group pull">
										<label>Missatge</label>
										<textarea class="form-control" name='missatge'> </textarea>
									</div>
								</div>
								<div class="col-md-12" align="center">
									<button type="submit" class="btn  btn-read-more" >
			                              		Aceptar
			                              	</button>
									<button type="reset" class="btn  btn-read-more">Reset</button>
								</div>
							</form>
							
						</div>
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
				$(window).scroll(function() {
				if ($(this).scrollTop() > 1){  
				    $('nav').addClass("sticky");
				  }
				  else{
				    $('nav').removeClass("sticky");
				  }
				});
		</script>
    </body>
</html>