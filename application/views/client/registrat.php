<html>
   <head>
        <title>Club natació Tortosa - Registrat</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 		<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/client/js/bootstrap.min.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/client/css/bootstrap.css'); ?>">
		<script src="<?php echo base_url('assets/client/js/script.js'); ?>"></script>
		<link rel="stylesheet" href="<?php echo base_url('assets/client/css/estil.css'); ?>">	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datepicker3.css'); ?>" >
	    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
    </head>
 <body>
    <?php (include 'header.php');?>
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-md12">
					<h1 class="text-center title-page">Registrat</h1>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Crear usuari</div>
						<div class="panel-body">
							<?php echo validation_errors(); 
							$correcto = $this->session->flashdata('correcto');
						    if ($correcto)
						    {
						    ?>
						       <span id="registroCorrecto"><?= $correcto ?></span>
						    <?php
						    }
						    ?>
							<form action="registra_usuari" method="post" enctype="multipart/form-data">		
								<div class="col-md-6">	
									
									<div class="form-group">
										<label>Nom</label>
										<input class="form-control" name='nom' value="<?php echo set_value('nom'); ?>">
									</div>
									<div class="form-group">
										<label>Cognoms</label>
										<input class="form-control" name='cognoms' value="<?php echo set_value('cognoms'); ?>">
									</div>
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" name='email' value="<?php echo set_value('email'); ?>">
									</div>
									
									<div class="form-group">
										<label>Data de naixement</label>
					                <input class="form-control" name='data_naixement'  type="text" placeholder="Data de naixement"  id="example1" value="<?php echo set_value('data_naixement'); ?>">
					            </div>
								</div>
								<div class="col-md-6">								
																	
									<div class="form-group">
										<label>Contrasenya</label>
										<input type="password" class="form-control" name='contrasenya' value="<?php echo set_value('contrasenya'); ?>">
									</div>	
										
									
									<div class="form-group">
										<label>Estat</label>
										<select class="form-control" name="estat" value="<?php echo set_value('estat'); ?>">
											<option>Escolar</option>
											<option>Federat</option>
											<option>Master</option>
										</select>
									</div>
									<div class="form-group">
										<label>Sexe</label>
										<select class="form-control" name="sexe" value="<?php echo set_value('sexe'); ?>">
											<option>Masculí</option
											<option>Femení</option>
										</select>
									</div>
									<div class="form-group">
										<label>Foto de perfil</label>
										<input type="file" name="foto" id='fitxer'><br>
									</div>
								</div>
								<div class="col-md-10" align="center">
									<button type="submit" class="btn btn-primary">Acceptar</button>
									<button type="reset" class="btn btn-default">Reset</button>
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
		<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {                
                $('#example1').datepicker({
                    format: "yyyy-mm-dd"
                });              
            });
        </script>
    </body>
</html>