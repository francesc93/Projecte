<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NPANEL - Actualitat</title>
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
				<li class="active">Actualitat</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Gestió de actualitat</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Introdueix nou contingut</div>
					<div class="panel-body">
						<div class="col-md-6">
					
						<?php echo validation_errors(); //validar dades ?> 
						<form action="insertar_actualitat" method="post" enctype="multipart/form-data">							
								<div class="form-group">
									<label>Titol</label>
									<input class="form-control" name="titol" value="<?php echo set_value('titol'); ?>" placeholder="Introdueix el text aquí">
								</div>
								
								<div class="form-group">
									<label>Introdueix una foto ho pdf</label>
									<input type="file" name="foto" id='fitxer'><br>
								</div>	
							</div>
							<div class="col-md-6 col-lg-12">
								<div class="form-group">
										<label>Comentari</label>
										<textarea id="textarea" name="comentari" placeholder="Introdueix el text aquí." class="form-control" rows="3"></textarea>
									</div>
							</div>
							<div class="col-md-10" align="center">
								<button type="submit" name="actulitat" class="btn btn-primary">Acceptar</button>
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
					<div class="panel-heading">Contingut</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="state"  >id actualitat</th>
						        <th data-field="id">Titol</th>
						        <th data-field="pene">Foto</th>
						        <th data-field="name" >Accions</th>
						    </tr>
						    </thead>
						    <tbody>
						    	 <?php foreach($actualitat as $index => $llistaractualitat){ ?>
            					<tr>
                					<td><?php echo $llistaractualitat['id_blog']; ?></td>
					                <td><?php echo $llistaractualitat['titol']; ?></td>
					                 <!--<td><img src="<?php //echo $llistaractualitat['foto']; ?>"></td>--> <!--Si volem mostra imatge utilitzarem aquest-->
					                 <td><?php echo $llistaractualitat['foto']; ?></td> <!--Mostrarem la URL  -->
					                <td>
					                    <a data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $llistaractualitat['id_blog']; ?>" data-idblog="<?php echo $llistaractualitat['id_blog']; ?>" data-titol="<?php echo $llistaractualitat['titol']; ?>" data-foto="<?php echo $llistaractualitat['foto']; ?>" data-comentari="<?php echo $llistaractualitat['comentari']; ?>" >
					                        <button type="button" class="btn btn-warning btn-sm" >
					                            <span class="glyphicon glyphicon-pencil"></span> 
					                        </button>
					                    </a>
					                    <a onclick="return confirm('Estas segur que vols eliminar el concert?');" href="<?=base_url()?>index.php/admin/eliminar_actualitat/<?=$llistaractualitat['id_blog']?> ">
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
			        <h4 class="modal-id" id="exampleModalLabel">Modificar Actualitat</h4>			   		
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
		$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var idblog = button.data('idblog')
  var titol = button.data('titol')
  var foto = button.data('foto')
  var comentari = button.data('comentari')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
 
  modal.find('.modal-id').val(idblog)
  modal.find('.modal-titol').text('Titol')
  modal.find('.modal-titol').val(titol)
  modal.find('.modal-foto').text('Foto')
  modal.find('.modal-foto').val(foto)
  modal.find('.modal-comentari').text('Comentari')
  modal.find('.modal-comentari').val(comentari)
$('#input').attr({
   'value': 'password',
}); 
})
  ////modal.find('.modal-titol input').val(titol)
	</script>	
	<script type="text/javascript">
	document.getElementById("textarea").value = "<?php echo set_value('comentari'); ?>";
	</script>
</body>

</html>
