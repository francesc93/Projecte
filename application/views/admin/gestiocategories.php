<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NPANEL - Categories</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datepicker3.css'); ?>" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css'); ?>" >
<link href="<?php echo base_url('assets/css/bootstrap-table.css'); ?> " rel="stylesheet">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.datetimepicker.css');?>"/>    
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.datetimepicker.js');?>"></script>

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
				<li class="active">Categories</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Gestió de Categories</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Introdueix nou contingut</div>
					<div class="panel-body">
						<div class="col-md-6">					
						<?php echo validation_errors(); //validar dades ?> 
						<form action="insertar_categoria" method="post" enctype="multipart/form-data">							
								<div class="form-group">
									<label>Prefix</label>
									<input class="form-control" name="prefix" value="<?php echo set_value('prefix'); ?>" placeholder="Introdueix el text aquí">
								</div>
								<div class="form-group">
									<label>Nom</label>
									<input class="form-control" name="nom" value="<?php echo set_value('nom'); ?>" placeholder="Introdueix el text aquí">
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
									<select class="form-control" name="sexe" placeholder="Sexe" id="sexe">									 
										<option >Masculí</option>
										<option >Femení</option>
										<option >NULL</option>										
									</select>
								</div>
								<div class="form-group">
									<label>Data Inici</label>
									<input class="form-control" name="datai" value="<?php echo set_value('datai'); ?>" placeholder="Introdueix el text aquí">
								</div>
								<div class="form-group">
									<label>Data Fi</label>
									<input class="form-control" name="dataf" value="<?php echo set_value('dataf'); ?>" placeholder="Introdueix el text aquí">
								</div>								
							<div class="col-md-10" align="center">
								<button type="submit" name="actulitat" class="btn btn-primary">Acceptar</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Contingut</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="state"  >ID</th>
						        <th >Categoria</th>
						        <th >Estats</th>
						        <th >Sexe</th>						        
						        <th >Data d'inici</th>
						        <th >Data fi</th>
						        <th>Prefix</th>
						        <th>Accions</th>
						    </tr>
						    </thead>
						    <tbody>
						    	 <?php foreach($categories as $index => $llistarestats){ ?>
            					<tr>
                					<td><?php echo $llistarestats['ID_CATEGORIA']; ?></td>
					                <td><?php echo $llistarestats['CATEGORIA']; ?></td>
					                <td><?php echo $llistarestats['ESTAT']; ?></td>
					                <td><?php echo $llistarestats['SEXE']; ?></td>					                
					                <td><?php echo $llistarestats['DATA_INICI']; ?></td>
					                <td><?php echo $llistarestats['DATA_FI']; ?></td>
					                <td><?php echo $llistarestats['PREFIX']; ?></td>
					                 <!--<td><img src="<?php //echo $llistaractualitat['foto']; ?>"></td>--> <!--Si volem mostra imatge utilitzarem aquest-->
					                <td>
					                    <a data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $llistarestats['ID_CATEGORIA']; ?>" data-idblog="<?php echo $llistarestats['ID_CATEGORIA']; ?>" data-titol="<?php echo $llistarestats['CATEGORIA']; ?>" >
					                        <button type="button" class="btn btn-warning btn-sm" >
					                            <span class="glyphicon glyphicon-pencil"></span> 
					                        </button>
					                    </a>
					                    <a onclick="return confirm('Estas segur que vols eliminar el estat?');" href="<?=base_url()?>index.php/admin/eliminar_actualitat/<?=$llistarestats['ID_ESTAT']?> ">
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
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-id" id="exampleModalLabel">Modificar Categories</h4>			   		
			      </div>
			      <div class="modal-body">
			        <form action="<?php echo base_url() ?>index.php/admin/update_actualitat" method="post" enctype="multipart/form-data">	
			        <input type="text" class="form-control modal-id hidden" id="recipient-name" name="id">				
			          <div class="form-group">
			            <label for="recipient-name" class="modal-titol control-label">Titol</label>
			            <input type="text" class="form-control modal-titol" id="recipient-name" name="titol">
			          </div>
			          <div class="form-group">
			            <label for="recipient-name" class="modal-foto control-label">Foto</label>			           
			            <input type="file" name="foto" id='fitxer' name="foto">
			            <input type="text" class="form-control modal-foto hidden" id="recipient-name" name="foto2">			
			          </div>
			          <div class="form-group">
			            <label for="recipient-name" class="modal-comentari control-label">Comentari</label>
			            <textarea style="height:200px" type="text" class="form-control modal-comentari" id="recipient-name" name="comentari"></textarea>
			          </div>
			          <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Tancar</button>
			        <button type="submit" class="btn btn-primary">Accepta</button>
			      </div>
			        </form>
			      </div>
			      
			    </div>
			  </div>
			</div>
			</div><!--/.row-->	
			</div><!--/.main ara si que no suritra-->
		</div>
	</div>

		<!--<script src="<?php //echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>-->
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
// Script per a les dates i hores

    $('#datetimepicker').datetimepicker().datetimepicker({
    	format: 'Y-m-d H:i'
    });
	$('#datetimepicker2').datetimepicker().datetimepicker({
    	format: 'Y-m-d H:i'
    });
   $('#datetimepicker').on('focus', function() { $(this).blur(); });
      $('#datetimepicker2').on('focus', function() { $(this).blur(); });
     $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idblog = button.data('idblog')
   var foto = button.data('foto')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
 modal.find('.modal-id').text('RESULTATS')
  modal.find('.modal-id').val(idblog)
   modal.find('.modal-foto').text('Resultats')
  modal.find('.modal-foto').val(foto)
})
    </script> 
    <script type="text/javascript">
   document.getElementById("estat").value = "<?php echo set_value('estat'); ?>";
      document.getElementById("categoria").value = "<?php echo set_value('categoria'); ?>";

	</script>


</body>

</html>
