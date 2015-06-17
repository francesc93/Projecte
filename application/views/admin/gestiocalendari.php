<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestió Calendari</title>

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
				<li><a href="index"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Calendari</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Gestió de Calendari</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Inserció de competicions</div>
					<div class="panel-body">						
						<?php echo validation_errors(); ?>								
						<form action="inserta_calendari" method="post" >	
							<div class="col-lg-6">					
								<div class="form-group">
									<label>Competició</label>
									<input class="form-control" placeholder="Introdueix el text" name='competicio' value="<?php echo set_value('competicio'); ?>">
								</div>
								
								<div class="form-group">
									<label>Dia i Hora </label>
									 <input  type="text" class="form-control" id="datetimepicker" name="data_hora_1" value="<?php echo set_value('data_hora_1'); ?>" placeholder="Dia i Hora">
								</div>
								<div class="form-group">
									<label>Dia i Hora fi</label>
									 <input type="text" class="form-control" id="datetimepicker2" name="data_hora_2" value="<?php echo set_value('data_hora_2'); ?>" placeholder="Dia i Hora">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Estat</label>
									<select class="form-control" name="estat" id="estat">
										<option>Escolar</option>
										<option>Federat</option>
										<option>Master</option>
									</select>
								</div>
								<div class="form-group">
									<label>CATEGORIA</label>
									<select class="form-control" name="categoria" id="categoria">
										<option>PB</option>
										<option>B</option>
										<option>ALE</option>
										<option>INF</option>
										<option>CAD</option>
										<option>JUV</option>
										<option>ABJ</option>
										<option>ABS</option>
										<option>MASTER</option>
									</select>
								</div>								
								<div class="form-group">
									<label>Lloc</label>
									<input class="form-control" placeholder="Introdueix el text" name='lloc' value="<?php echo set_value('lloc'); ?>">
								</div>	
															
							</div>							
								<div align="center">
									<button type="submit" class="btn btn-primary">Accepta</button>
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
					<div class="panel-heading">Calendari</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="state">ID_COMPETICIO</th>						        
						        <th >COMPETICIO</th>
						        <th >DATA_HORA_1</th>
						        <th >DATA_HORA_2</th>
						        <th >ESTAT</th>
						        <th >CATEGORIA</th>
						        <th >LLOC</th>
						        <th>RESULTATS</th>
						        <th>Accions</th>
						    </tr>
						    </thead>
						    <tbody>
						    	 <?php foreach($calendari as $index => $llistaractualitat){ ?>
            					<tr>
                					<td><?php echo $llistaractualitat['ID_COMPETICIO']; ?></td>
					                <td><?php echo $llistaractualitat['COMPETICIO']; ?></td>
					                <td><?php echo $llistaractualitat['DATA_HORA_1']; ?></td>
					                <td><?php echo $llistaractualitat['DATA_HORA_2']; ?></td>
					                <td><?php echo $llistaractualitat['ESTAT']; ?></td> 
					                <td><?php echo $llistaractualitat['CATEGORIA']; ?></td>
					                <td><?php echo $llistaractualitat['LLOC']; ?></td> 
					                <td><?php if($llistaractualitat['RESULTATS']){ ?><span style="color:#6BE836;"   class="glyphicon glyphicon-ok"></span> <?php }else{ ?> <span style="color:#E83038;"  class="glyphicon glyphicon-remove"></span> <?php } ?></td> 
					                <td>
					                   <a onclick="return confirm('Estas segur que vols eliminar el usuari?');" href="<?=base_url()?>index.php/admin/eliminar_calendari/<?=$llistaractualitat['ID_COMPETICIO']?> ">
					                        <button type="button" class="btn btn-danger btn-sm eliminar">
					                            <span class="glyphicon glyphicon-remove"></span> 
					                        </button>
					                    </a> 
					                    <a href='' data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $llistaractualitat['ID_COMPETICIO']; ?>" data-idblog="<?php echo $llistaractualitat['ID_COMPETICIO']; ?>"  data-foto="<?php echo $llistaractualitat['RESULTATS']; ?>"  >
					                        <button type="button" class="btn btn-info btn-sm" >
					                            <span class="glyphicon glyphicon-stats"></span> 
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
			        <h4 class="modal-id" id="exampleModalLabel">New message</h4>
			   		
			      </div>
			      <div class="modal-body">
			        <form action="<?php echo base_url() ?>index.php/admin/inserta_resultats" method="post" enctype="multipart/form-data">	
			       <input type="text" class="form-control modal-id hidden" id="recipient-name" name="id">				
			          
			          <div class="form-group">
			            <label for="recipient-name" class="modal-foto control-label">Foto</label>			           
			            <input type="file"  id='fitxer' name="resultats">
			          </div>
			         
			          <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Tanca</button>
			        <button type="submit" class="btn btn-primary">Accepta</button>
			      </div>
			        </form>
			      </div>
			      
			    </div>
			  </div>
			</div>
		</div><!--/.row-->	
		
	</div><!--/.main-->

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
