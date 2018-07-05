<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <h1>
       <label>Usuario</label>
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <!-- Left col -->
        <section class="col-md-12 col-sm-12 col-xs-12 connectedSortable">

         <div class="animated fadeIn">
            <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- perfil de imagen -->
          <?php if ($dato_usuario): ?>
            <?php foreach ($dato_usuario->result() as $data): ?>
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?=$this->config->base_url()?>uploads/img/<?=$data->imagen?>" alt="User profile picture">
              <h3 class="profile-username text-center"><?=$nombre_usuario?></h3>
              <p class="text-muted text-center"><?=$data->descripcion?></p>
               <p class="text-muted text-center"><?=$data->sobre_mi?></p>
               <p class="text-muted text-center">Puntos: &nbsp;<?=$data->puntaje?></p>
            <!--   <a href="#" class="btn btn-primary btn-block"><b>Cambiar Datos</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>

            <?php endforeach ?>
          <?php else: ?>
            <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?=$this->config->base_url()?>uploads/user.png" alt="User profile picture">

              <h3 class="profile-username text-center">Defina su Nombre de Usuario</h3>
              <p class="text-muted text-center">Descripcion por Definir</p>
             <!--  <a href="#" class="btn btn-primary btn-block"><b>Cambiar</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <?php endif ?>

          <!-- cierra perfil de imagen -->

        </div>


