<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= $this->config->base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Navegacion Principal</li>
        <li class="">
          <a href="#">
            <i class="fa fa-map"></i> <span>Ciudades</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?=$this->config->base_url()?>ciudad"><i class="fa fa-map-marker"></i> Ciudades</a></li>

          </ul>
        </li>
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
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Anunciante</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$this->config->base_url()?>anunciante"><i class="fa fa-circle-o"></i>Anunciante</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bell"></i>
            <span>Parrilla</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$this->config->base_url()?>parrilla"><i class="fa fa-circle-o"></i>Parrilla</a></li>
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
            <li><a href="<?=$this->config->base_url()?>tipo"><i class="fa fa-circle"></i>Tipo</a></li>
            <li><a href="<?=$this->config->base_url()?>marca"><i class="fa fa-circle"></i>Marca</a></li>
            <li><a href="<?=$this->config->base_url()?>modelo"><i class="fa fa-circle"></i>Modelo</a></li>
            <li><a href="<?=$this->config->base_url()?>horario"><i class="fa fa-circle"></i>Horario</a></li>
            <li><a href="<?=$this->config->base_url()?>establecimiento"><i class="fa fa-circle"></i>Establecimiento</a></li>
            <li><a href="<?=$this->config->base_url()?>usuario"><i class="fa fa-circle"></i>Usuarios del sistema</a></li>


          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
