<html>
    <head>
        <title>Club natació Tortosa - Qui som</title>
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
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center title-page">Qui som</h1>
			</div>
		</div>	
    	</div>	
    	<div class="jumbotron">
		    <div class="container">
		    	
			    <br/>
			    <p>El nostre club va ésser fundat el 18 de novembre de 1974, presidit pel Sr. Felipe Tallada i Ravanals. El seu origen neix de la voluntat d’uns quants pares de nadadors i aficionats a aquest esport, poc conegut al territori, de formar un grup amb ganes de competir i veure un profit a l'esforç dels nadadors. Una vegada confeccionats els estatuts i dissenyat l’escut, el seu primer i gran repte va ser aconseguir que Tortosa tingués una piscina climatitzada. Moltes van ser les idees, molts els projectes i moltes les converses, fins que l’any 1986 l’Ajuntament va cobrir la piscina de 25 metres. Curiosament el nostre repte actual, es cobrir la piscina de 50 metres.</p>
			    <br/>
			    <p>Encara que amb moltes dificultats, el club va anar creixent i l’any 1990 es van crear les seccions de triatló, atletisme, i salvament i socorrisme. Encara que el Club no disposa d'instal·lacions esportives pròpies ha aconseguit en aquests anys fites molt importants, desde les primeres travessies nedant de les Terres de l'Ebre, passant per competicions escolars, comarcals i provincials fins arribar a campionats estatals en totes les seccions.</p>
			    <br />

			    <br /><br />
			    <p>Volem agraïr l'esforç, a les juntes que han fet possible, amb més o menys entrebancs els èxits esportius i el reconeixement social de l'entitat, recordant els presidents :</p>
			    <p>El C.N. Tortosa va néixer el 1974 amb la intenció de fomentar la natació a la ciutat, treballant des de edats d'iniciació fins a edats adultes o màster. 
				Actualment existeixen les seccions de natació escolar, natació federada i màster, superant a l'any 2015 el centenar de nedadors. 
				El C.N. Tortosa és un equip referent a la provincia de Tarragona ja que és l'únic club que porta 4 anys competint a la segona divisió catalana, fet que el converteix en un dels 20 millors equips de Catalunya. 
				La natació escolar realitza els entrenaments de Dilluns a Divendres de 19:30 a 20:30h., la natació federada de 20:30h. a 22:30h. i la secció màster de 9:15h. a 22:30h. 
				Qualsevol persona interessada en preparar-se aquesta Baixada del Renaixement o entrenar la natació en general només cal posar-se en contacte amb nosaltres i estarem encantats de poder ajudar-vos!
				</p>
				<div class="row">
			    <div class="col-xs-1 col-sm-1 col-md-2" >
			   		 			<img class="img-responsive" src="<?php echo base_url('assets/client/img/escut2.png'); ?>" >
			   		</div>
			    <iframe class="col-xs-1 col-sm-1 col-md-6"  align="center" width="640" height="360" src="https://www.youtube.com/embed/cL6yHz0Al34?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
			    
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