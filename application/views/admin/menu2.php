<!--BEGIN SIDEBAR MENU-->
      

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/index") { ?>  class="active" <?php } ?> ><a href="<?php echo base_url('/admin/index') ?>"><span class="glyphicon glyphicon-dashboard"></span>Inici</a></li>
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/actualitat") { ?> class="active" <?php } ?>><a href="<?php echo base_url('/admin/actualitat') ?>"><span class="glyphicon glyphicon-th"></span>Actualitat</a></li>
            <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/calendari") { ?> class="active" <?php } ?>><a href="<?php echo base_url('/admin/calendari') ?>"><span class="glyphicon glyphicon-stats"></span>Calendari</a></li>
                        <li <?php if ($_SERVER["REQUEST_URI"] == "/projecte/admin/galeria") { ?> class="active"<?php } ?>><a href="<?php echo base_url('/admin/galeria') ?>"><span class="glyphicon glyphicon-pencil"></span>Galeria</a></li>
            <li role="presentation" class="divider"></li>
        </ul>
        <div class="attribution">Template by <a href="http://www.medialoot.com/item/lumino-admin-bootstrap-template/">Medialoot</a></div>
    </div><!--/.sidebar-->
