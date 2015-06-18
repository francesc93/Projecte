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
		
	<?php 
		if($this->session->userdata('logueado') && ($this->session->userdata('ROL')=='ADMINISTRADOR')){ 
			include ('menu.php'); 
		}elseif ($this->session->userdata('logueado') && ($this->session->userdata('ROL')=='ENTRENADOR')) {
			include ('menu2.php');
		}
	?>	
		
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
					<div class="panel-heading">Gestió d'usuaris</div>
					<div class="panel-body">
						<?php echo validation_errors(); ?>
						<form action="insertar_usuari" method="post" enctype="multipart/form-data">		
							<div class="col-md-6">								
								<div class="form-group">
									<label>Nom</label>
									<input class="form-control" name='nom' value="<?php echo set_value('nom'); ?>" placeholder="Nom">
								</div>
								<div class="form-group">
									<label>Cognoms</label>
									<input class="form-control" name='cognoms' value="<?php echo set_value('cognoms'); ?>" placeholder="Cognoms">
								</div>
								<div class="form-group">
									<label>Foto</label>
									<input type="file" name="foto" id='fitxer' placeholder="Foto"><br>
								</div>								
								<div class="hero-unit form-group">
								<label>Data de naixement</label>
					                <input class="form-control" name='data_naixement' value="<?php echo set_value('data_naixement'); ?>" type="text" placeholder="Data de naixement"  id="example1" >
					            </div>
					            <div class="form-group">
									<label>Email</label>
									<input class="form-control" name='email' value="<?php echo set_value('email'); ?>" placeholder="Email">
								</div>
							</div>
							<div class="col-md-6">																								
								<div class="form-group">
									<label>Contrasenya</label>
									<input type="password" class="form-control" name='contrasenya' placeholder="Contrasenya">
								</div>	
								<div class="form-group">
									<label>Confirmar contrasenya</label>
									<input type="password" class="form-control" name='contrasenya' placeholder="Contrasenya">
								</div>									
								<div class="form-group">
										<label>Sexe</label>
										<select class="form-control" name="sexe" placeholder="Sexe" id="sexe">
											<option>Masculí</option>
											<option>Femení</option>
										</select>
									</div>
								<!--<div class="form-group">
									<label>Email</label>
									<input type="checkbox" name="vehicle" value="Bike">I have a bike<br>
									<input type="checkbox" name="vehicle" value="Car">I have a car 
								</div>-->
								<div class="form-group">	
									<label>Rol</label>
									<select class="form-control" name="rol" id="rol">
										<option>NEDADOR</option>
										<option>ENTRENADOR</option>
										<option>ADMINISTRADOR</option>
									</select>
								</div>
								<div class="form-group">
									<label>Estat</label>
									<select class="form-control" name="estat" id="estat">
										<option>Escolar</option>
										<option>Federat</option>
										<option>Master</option>
									</select>
								</div>
								
							</div>
							<div class="col-md-12" align="center">
								<button type="submit" class="btn btn-primary">Acceptar</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Usuaris</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="state">id_usuari</th>
						        <th >Nom</th>
						        <th >Cognoms</th>
						        <th >EMAIL</th>
						        <th >Data</th>
						        <th >Rol</th>
						        <th>Estat</th>
						        <th>Categoria</th>
						        <th>SEXE</th>
						        <th>Accions</th>
						    </tr>
						    </thead>
						    <tbody>
						    	 <?php foreach($usuaris as $index => $llistaractualitat){ ?>
            					<tr>
                					<td><?php echo $llistaractualitat['ID_USUARI']; ?></td>
					                <td><?php echo $llistaractualitat['NOM']; ?></td>
					                <td><?php echo $llistaractualitat['COGNOMS']; ?></td>
					                <td><?php echo $llistaractualitat['EMAIL']; ?></td>
					                <td><?php echo $llistaractualitat['DATA_NAIXEMENT']; ?></td> 
					                <td><?php echo $llistaractualitat['ROL']; ?></td> 
					                <td><?php echo $llistaractualitat['ESTAT']; ?></td> 
					                <td><?php echo $llistaractualitat['CATEGORIA']; ?></td> 
					                <td><?php echo $llistaractualitat['SEXE']; ?></td> 
					                <td>
					                   <a  href="<?=base_url()?>index.php/admin/get_usuari/<?=$llistaractualitat['ID_USUARI']?>">
					                        <button type="button" class="btn btn-warning btn-sm">
					                            <span class="glyphicon glyphicon-pencil"></span> 
					                        </button>
					                    </a>
					                   <a onclick="return confirm('Estas segur que vols eliminar el usuari?');" href="<?=base_url()?>index.php/admin/eliminar_usuari/<?=$llistaractualitat['ID_USUARI']?> ">
					                        <button type="button" class="btn btn-danger btn-sm eliminar">
					                            <span class="glyphicon glyphicon-remove"></span> 
					                        </button>
					                    </a> 
					                </td>
            					</tr>
           						 <?php } ?>
						    </tbody>
						    </table>
			</div>
		</div><!--/.row-->	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Usuauris per validar</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="state">id_usuari</th>
						        <th >Nom</th>
						        <th >Cognoms</th>
						        <th >Email</th>
						        <th >Data de naixement</th>
						        <th >Rol</th>
						        <th>Estat</th>
						        <th>Categoria</th>
						        <th>Sexe</th>
						        <th>Accions</th>
						    </tr>
						    </thead>
						    <tbody>
						    	 <?php foreach($validar_usuari as $index => $llistaractualitat){ ?>
            					<tr>
                					<td><?php echo $llistaractualitat['ID_USUARI']; ?></td>
					                <td><?php echo $llistaractualitat['NOM']; ?></td>
					                <td><?php echo $llistaractualitat['COGNOMS']; ?></td>
					                <td><?php echo $llistaractualitat['EMAIL']; ?></td>
					                <td><?php echo $llistaractualitat['DATA_NAIXEMENT']; ?></td> 
					                <td><?php echo $llistaractualitat['ROL']; ?></td> 
					                <td><?php echo $llistaractualitat['ESTAT']; ?></td> 
					                <td><?php echo $llistaractualitat['CATEGORIA']; ?></td> 
					                 <td><?php echo $llistaractualitat['SEXE']; ?></td> 
					                <td>
					                   <a  href="<?=base_url()?>index.php/admin/validar_usuari/<?=$llistaractualitat['ID_USUARI']?>">
					                        <button type="button" class="btn btn-success btn-sm">
					                            <span class="glyphicon glyphicon-ok"></span> 
					                        </button>
					                    </a>
					                   <a onclick="return confirm('Estas segur que vols eliminar el usuari?');" href="<?=base_url()?>index.php/admin/eliminar_validar_usuari/<?=$llistaractualitat['ID_USUARI']?> ">
					                        <button type="button" class="btn btn-danger btn-sm eliminar">
					                            <span class="glyphicon glyphicon-remove"></span> 
					                        </button>
					                    </a> 
					                </td>
            					</tr>
           						 <?php } ?>
						    </tbody>
					    </table>
			</div>
		</div><!--/.row-->	
		
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
