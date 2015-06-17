<header class="row"> 

    			<nav class="navbar navbar-default navbar-fixed-top col-xs-12 col-sm-12 col-md-12">
					<div class="container-fluid">
						  <div class="col-xs-1 col-sm-1 col-md-1" id="cercle">
			   		 			<img class="img-responsive" src="<?php echo base_url('assets/client/img/escut2.png'); ?>" >
			   		</div>
	    			<div class="col-xs-2 col-sm-1 col-md-2">

			   		</div>
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <i class="fa fa-bars"></i>
						      </button>
						      
						    </div>

						    <!-- Collect the nav links, forms, and other content for toggling -->
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">		      
						      <ul class="nav navbar-nav ">
						      <li><a href="<?php echo base_url('/client/index') ?>">Inici</a></li>	
						        <li><a href="<?php echo base_url('/client/quisom') ?>">Qui som</a></li>					      
						         <li><a href="<?php echo base_url('/client/contacta') ?>">Contacta</a></li>			

						        <?php 						            	
							        if($this->session->userdata('logueado')){?>
							        <li><a href="<?php echo base_url('/client/calendari') ?>">Calendari</a></li>						        
						        <?php } ?>
						         <li><a href="<?php echo base_url('/client/galeria') ?>">Galeria</a></li>
						        <li><a href="urls" >Enllaços</a></li>
						         <li><a href="http://www.baixadadelrenaixement.tk/" >Baixada R.</a></li>
						        
						       	<?php 						            	
							        if($this->session->userdata('logueado')){?>
							        <li><a href="<?php echo base_url('/client/documents') ?>">Documents</a></li>						        
						        <?php } ?>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                          <span class="glyphicon glyphicon-user"></span>&nbsp;<?= $this->session->userdata('NOM');?>&nbsp;
                                          <span class="caret"></span></a>
                                      <ul class="dropdown-menu" role="menu" id="dropdown-menu">

                                          <?php
                                          if($this->session->userdata('logueado')){?>
                                              <li><a href="<?php echo base_url('/client/cerrar_sesion') ?>">Tanca sessió</a></li>
                                              <li><a href="<?php echo base_url('/client/perfil') ?>">Perfil</a></li>
                                              <?php if($this->session->userdata('ROL')=='ENTRENADOR' || $this->session->userdata('ROL')=='ADMINISTRADOR'){?>
                                                  <li><a href="<?php echo base_url('/admin/index') ?>">Administracio</a></li>
                                              <?php };?>
                                          <?php }else{
                                              ?>
                                              <li><a href="<?php echo base_url('/client/login') ?>">Login</a></li>
                                              <li><a href="<?php echo base_url('/client/registrat') ?>">Registrat</a></li>
                                          <?php };?>
                                      </ul>
                                  </li>
                              </ul>

						    </div><!-- /.navbar-collapse -->
						  </div><!-- /.container-fluid -->
						</nav>			
    		</header>