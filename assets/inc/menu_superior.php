<body class="hold-transition skin-blue sidebar-mini ">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?=$this->config->base_url()?>principal/index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BC-</b>W</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BlueCarrot-</b>Wifi</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">

           <?php if ($datos_usuario_2): ?>
          <?php foreach ($datos_usuario_2->result() as $data): ?>


            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=$this->config->base_url()?>./uploads/img/<?=$data->imagen?>"class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$data->nombre_usuario?></span>

            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <img src="<?=$this->config->base_url()?>./uploads/img/<?=$data->imagen?>" class="img-circle" alt="User Image">

                <p>
                <?=$data->nombre_usuario?>
                   <?php endforeach ?>
                    <?php endif ?>
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=$this->config->base_url()?>usuario/perfil" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?=$this->config->base_url()?>acceso_usuario/cerrar_sesion" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle=""><i></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>