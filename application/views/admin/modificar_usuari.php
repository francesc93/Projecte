<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NPANEL - Usuaris</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datepicker3.css'); ?>" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css'); ?>" >
<link href="<?php echo base_url('assets/css/bootstrap-table.css'); ?> " rel="stylesheet">




<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php include 'header.php';?>
		
	<?php include ('menu.php'); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url('/admin/index') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Usuaris</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Gestió d'usuaris</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Modificar usuari</div>
					<div class="panel-body">
					<?php echo validation_errors(); ?>
					
						<form method="post" action="<?php echo base_url() ?>index.php/admin/modificar_usuari/<?php echo $ID_USUARI ?>" enctype="multipart/form-data">
					
						<div class="col-md-6">						
								<div class="form-group">
									<label>Nom</label>
									<input class="form-control" name='nom' value="<?php echo  $NOM;?>">
								</div>	
								<div class="form-group">
									<label>Cognoms</label>
									<input class="form-control" name='cognoms' value="<?php echo  $COGNOMS;?>">
								</div>	
								<div class="form-group">
									<label>Foto de perfil</label><br/>
									<img src="<?php echo  $FOTO;?>" style="width:100px; border-radius:50%;">
									<input type="file" name="foto" id='fitxer'><br>
								</div>								
								<div class="hero-unit form-group">
									<label>Data de naixement</label>
					                <input class="form-control" name='data_naixement'  value="<?php echo  $DATA_NAIXEMENT;?>" type="text" placeholder="Data de naixement"  id="example1">
					            </div>
							</div>
						<div class="col-md-6">						
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" name='email' value="<?php echo  $EMAIL;?>">
								</div>
								<div class="form-group">
									<label>Rol</label>
									<select class="form-control" name="rol"  >
										<option <?php if($ROL=='NEDADOR'){?> selected="true"<?php };?>  >NEDADOR</option>
										<option <?php if($ROL=='ENTRENADOR'){?> selected="true"<?php };?> >ENTRENADOR</option>
										<option <?php if($ROL=='ADMINISTRADOR'){?> selected="true"<?php };?> >ADMINISTRADOR</option>
									</select>
								</div>
								<div class="form-group">	
									<label>Estats</label>
									<select class="form-control" name="estat" id="estat">
									 <?php foreach($estats as $index => $llistaractualitat){ ?>
										<option  value="<?php echo $llistaractualitat['ID_ESTAT']; ?> "> <?php echo $llistaractualitat['ESTAT']; ?></option>
										<?php }?>
									</select>
								</div>
								<div class="form-group">
										<label>Sexe</label>
										<select class="form-control" name="sexe" placeholder="Sexe">
											<option>Masculí</option>
											<option>Femení</option>
										</select>
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

		
	</div><!--/.main-->

	<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/chart.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/chart-data.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/easypiechart.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/easypiechart-data.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-table.js'); ?>"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
	<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
        </script>
         <script type="text/javascript">
	document.getElementById("sexe").value = "<?php echo set_value('sexe'); ?>";
	document.getElementById("rol").value = "<?php echo set_value('rol'); ?>";
	document.getElementById("estat").value = "<?php echo set_value('estat'); ?>";
	</script>
</body>

</html>	