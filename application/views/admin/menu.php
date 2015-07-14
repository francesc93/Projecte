<!--BEGIN SIDEBAR MENU-->
      

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/index") { ?>  class="active" <?php } ?> ><a href="<?php echo base_url('/admin/index') ?>"><span class="glyphicon glyphicon-home"></span>Inici</a></li>
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/actualitat") { ?> class="active" <?php } ?>><a href="<?php echo base_url('/admin/actualitat') ?>"><span class="glyphicon glyphicon-th"></span>Actualitat</a></li>
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/calendari") { ?> class="active" <?php } ?>><a href="<?php echo base_url('/admin/calendari') ?>"><span class="glyphicon glyphicon-stats"></span>Calendari</a></li>
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/documents") { ?> class="active" <?php } ?>><a href="<?php  echo base_url('/admin/documents') ?>"><span class="glyphicon glyphicon-list-alt"></span>Documents</a></li>
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/galeria") { ?> class="active"<?php } ?>><a href="<?php echo base_url('/admin/galeria') ?>"><span class="glyphicon glyphicon-pencil"></span>Galeria</a></li>
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/usuaris") { ?> class="active " <?php } ?>><a href="<?php echo base_url('/admin/usuaris') ?>"><span class="glyphicon glyphicon-user"></span>Usuaris</a></li>
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/urls") { ?> class="active " <?php } ?>><a href="<?php echo base_url('/admin/urls') ?>"><span class="glyphicon glyphicon-link"></span>Enllaços</a></li>
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/estats") { ?> class="active " <?php } ?>><a href="<?php echo base_url('/admin/estats') ?>"><span class="glyphicon glyphicon-tag"></span>Estats</a></li>
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/categories") { ?> class="active " <?php } ?>><a href="<?php echo base_url('/admin/categories') ?>"><span class="glyphicon glyphicon-tags"></span>Categories</a></li>
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/historial") { ?> class="active " <?php } ?>><a href="<?php echo base_url('/admin/historial') ?>"><span class="glyphicon glyphicon-info-sign"></span>Historic</a></li>
            <li role="presentation" class="divider"></li>
        </ul>
        <div class="attribution">Francesc Fores & Albert Cañelles</div>
    </div><!--/.sidebar-->
