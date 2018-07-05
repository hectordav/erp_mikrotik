<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if ($datos_usuario_2): ?>
        <?php foreach ($datos_usuario_2->result() as $data): ?>
          <img src="<?=$this->config->base_url()?>./uploads/img/<?=$data->imagen?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$data->nombre_usuario?></p>
          <?php endforeach ?>
        <?php endif ?>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Navegacion Principal</li>
        <li class="">
          <a href="#">
            <i class="fa fa-map"></i> <span>Premios</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?=$this->config->base_url()?>premio/catalogo"><i class="fa fa-map-marker"></i>Catalogo de premios</a></li>
          </ul>
        </li>





      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
