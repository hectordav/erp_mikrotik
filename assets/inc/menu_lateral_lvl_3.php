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
      <ul class="sidebar-menu">
        <li class="header">Navegacion Principal</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-desktop"></i>
            <span>Equipos</span>
            <span class="fa fa-angle-left pull-right"></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$this->config->base_url()?>equipo"><i class="fa fa-ellipsis-v"></i>Equipos</a></li>
          </ul>
        </li>
        <li class="header"></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i>
            <span>Configuraciones</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$this->config->base_url()?>establecimiento"><i class="fa fa-circle"></i>Establecimiento</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
