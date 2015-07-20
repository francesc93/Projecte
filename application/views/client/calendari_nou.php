<html>
    <head>
        <title>Club natació Tortosa - Calendari</title>
  		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>

		<script src="<?php echo base_url('assets/client/js/bootstrap.min.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/client/css/bootstrap.css'); ?>">
		
		<script src="<?php echo base_url('assets/client/js/script.js'); ?>"></script>
		<link rel="stylesheet" href="<?php echo base_url('assets/client/css/estil.css'); ?>">
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300,200' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url('assets/client/plantilla/assets/css/font-awesome.css'); ?>" />

		<!-- page specific plugin styles -->
	
		<link rel="stylesheet" href="<?php echo base_url('assets/client/plantilla/assets/css/fullcalendar.css'); ?>" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url('assets/client/plantilla/assets/css/ace-fonts.css'); ?>" />

		<!-- ace styles -->
    </head>
    <body>
    	<?php (include 'header.php');?>
    	<br />
    	<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center title-page" style="text:center;">Calendari</h1>
				</div>
			</div>
		</div>			 
		<div class="main-container" id="main-container" style="margin-bottom:20px">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
					<div class="row container">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<div class="row">
								<div class="col-sm-9">
									<div class="space"></div>
									<!-- #section:plugins/data-time.calendar -->
									<div id="calendar"></div>
									<!-- /section:plugins/data-time.calendar -->
								</div>
							</div>
						</div>
					</div>
			</div><!-- /.main-container -->
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

		
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url('assets/client/plantilla/assets/js/jquery.js'); ?>'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<!-- no funciona 
		<script src="../assets/js/bootstrap.js"></script>-->
		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url('assets/client/plantilla/assets/js/jquery-ui.custom.js'); ?>"></script>

		<script src="<?php echo base_url('assets/client/plantilla/assets/js/jquery.ui.touch-punch.js'); ?>"></script>
		<script src="<?php echo base_url('assets/client/plantilla/assets/js/date-time/moment.js'); ?>"></script>
		<script src="<?php echo base_url('assets/client/plantilla/assets/js/fullcalendar.js'); ?>"></script>
		<script src="<?php echo base_url('assets/client/plantilla/assets/js/bootbox.js'); ?>"></script>



		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {


	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	
	var calendar = $('#calendar').fullCalendar({
		//isRTL: true,
		 buttonHtml: {
			prev: '<i class="ace-icon fa fa-chevron-left"></i>',
			next: '<i class="ace-icon fa fa-chevron-right"></i>'
		},
	
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		events: [	<?php if($calendari){foreach($calendari as $index => $llistaractualitat){ ?>
		  {
		  	id : '<?php echo $llistaractualitat['ID_COMPETICIO']; ?>',
			title: '<?php echo $llistaractualitat['COMPETICIO']; ?>',
			estat : '<?php echo $llistaractualitat['ESTAT']; ?>',
			categoria : '<?php echo $llistaractualitat['CATEGORIA']; ?>',			
			lloc: '<?php echo $llistaractualitat['LLOC']; ?>',
			resultat: '<?php echo $llistaractualitat['RESULTATS']; ?>',
			start: '<?php echo $llistaractualitat['DATA_HORA_1']; ?>',
			start2: '<?php echo $llistaractualitat['DATA_HORA_1']; ?>',
			end: '<?php echo $llistaractualitat['DATA_HORA_2']; ?>',
			end2: '<?php echo $llistaractualitat['DATA_HORA_2']; ?>',
			className: 'label-important'
		  },
		  <?php }} ?>
		  		 
		]
		/*events: [
		  {
			title: 'All Day Event',
			start: new Date(y, m, 1),
			className: 'label-important'
		  },
		  {
			title: 'Long Event',
			start: moment().subtract(5, 'days').format('YYYY-MM-DD'),
			end: moment().subtract(1, 'days').format('YYYY-MM-DD'),
			className: 'label-success'
		  },
		  {
			title: 'asdasd Event',
			start: moment().subtract(5, 'days').format('YYYY-MM-DD'),
			end: moment().subtract(1, 'days').format('YYYY-MM-DD'),
			className: 'label-success'
		  },
		  {
			title: 'Some Event',
			start: new Date(y, m, d-3, 16, 0),
			allDay: false,
			className: 'label-info'
		  }
		]*/
		,
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date, allDay) { // this function is called when something is dropped
		
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			var $extraEventClass = $(this).attr('data-class');
			
			
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
			
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
			
		}
		,
		selectable: true,
		selectHelper: true,
		//↓↓↓	↓↓↓	↓↓↓	↓↓↓	↓↓↓	↓↓↓	↓↓↓	↓↓↓	↓↓↓	↓↓↓	↓↓↓	↓↓↓
		//Modifiquem el fitxer bootbox.js per pasar el parametres del formulari modal a la BD
		
		
		eventClick: function(calEvent, jsEvent, view) {

			//display a modal
			var modal = 
			'<div class="modal fade">\
			  <div class="modal-dialog">\
			   <div class="modal-content">\
				 <div class="modal-body">\
				   <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
				   <form class="no-margin">\
					  <label>Competicio : &nbsp; ' + calEvent.title + '</label><br/>\
					  <label>Categoria : &nbsp; ' + calEvent.estat + '</label><br/>\
					  <label>Categoria : &nbsp; ' + calEvent.categoria + '</label><br/>\
					  <label>Data : &nbsp; <?php ?> <?php ?>' + calEvent.start2 + '</label><br/>\
					  <label>Data fi : &nbsp; <?php ?> <?php ?>' + calEvent.end2 + '</label><br/>\
					  <label>Lloc : &nbsp; <?php ?> <?php ?>' + calEvent.lloc + '</label><br/>\
					  <?php if(' + calEvent.resultat + '){?><label>Resultat : </label>&nbsp;&nbsp;<a class="btn btn-read-more" target="_blank" href="' + calEvent.resultat + '"><?php ?> <?php ?>' + calEvent.resultat + '</a><br/><?php } ?>\
				   </form>\
				 </div>\
				 <div class="modal-footer">\
					<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
				 </div>\
			  </div>\
			 </div>\
			</div>';
		
		
			var modal = $(modal).appendTo('body');
			modal.find('form').on('submit', function(ev){
				ev.preventDefault();

				calEvent.title = $(this).find("input[type=text]").val();
				calendar.fullCalendar('updateEvent', calEvent);
				modal.modal("hide");
			});
			modal.find('button[data-action=delete]').on('click', function() {
				calendar.fullCalendar('removeEvents' , function(ev){
					return (ev._id == calEvent._id);
				})
				modal.modal("hide");
			});
			
			modal.modal('show').on('hidden', function(){
				modal.remove();
			});


			//console.log(calEvent.id);
			//console.log(jsEvent);
			//console.log(view);

			// change the border color just for fun
			//$(this).css('border-color', 'red');
		}

	});

})
		</script>    	
    </body>
</html>