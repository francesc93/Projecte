	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>N</span>PANEL</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;<?= $this->session->userdata('NOM');?>&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<?php 						            	
						        if($this->session->userdata('logueado')){?>						        
						        <li><a href="<?php echo base_url('/client/perfil') ?>">Perfil</a></li>	
						        <li><a href="<?php echo base_url('/client/index') ?>">Pàgina Web</a></li>
								<li><a href="<?php echo base_url('/client/cerrar_sesion') ?>">Tanca sessió</a></li>
						        <?php };?>
						</ul>
					</li>
				</ul>
			</div>		
		</div><!-- /.container-fluid -->
	</nav>
