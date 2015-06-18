<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NPANEL - Enllaços</title>
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
				<li class="active">Enllaços</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Gestió de documents</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Gestió de documents</div>
					<div class="panel-body">
						<div class="col-md-6">
						<?php echo validation_errors(); ?>
							<form action="insertar_url" method="post" enctype="multipart/form-data">
						
								<div class="form-group">
									<label>Introudiex el nom de l'enllaç</label>
									<input type="text" name="titol" value="<?php echo set_value('titol'); ?>" class="form-control" placeholder="Nom">
								</div>
								<div class="form-group">
									<label>Introudiex l'enllaç</label>
									<input type="text" name="url" value="<?php echo set_value('url'); ?>" class="form-control"  placeholder="Enllaç">
								</div>
								<button type="submit" class="btn btn-primary">Acceptar</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Contingut</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="state"  >id document</th>
						        <th data-field="id">Titol</th>
						        <th data-field="pene">URL</th>
						        <th data-field="name" >Accions</th>
						    </tr>
						    </thead>
						    <tbody>
						    	 <?php foreach($this->_ci_cached_vars as $index => $llistardocument){ ?>
            					<tr>
                					<td><?php echo $llistardocument['ID_ENLLAS']; ?></td>
					                <td><?php echo $llistardocument['TITUL']; ?></td>
					                 <!--<td><img src="<?php //echo $llistardocument['foto']; ?>"></td>--> <!--Si volem mostra imatge utilitzarem aquest-->
					                 <td><?php echo $llistardocument['URL']; ?></td> <!--Mostrarem la URL  -->
					                <td>
					                    
					                     <a onclick="return confirm('Estas segur que vols eliminar el usuari?');" href="<?=base_url()?>index.php/admin/eliminar_url/<?=$llistardocument['ID_ENLLAS']?>">
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
		
	</div><!--/.main ara si que no suritra-->
	</div>
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
</body>

</html>
