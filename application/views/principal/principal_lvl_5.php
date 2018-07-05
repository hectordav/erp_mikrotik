<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tablero
        <small>Panel de Control </small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
<!-- ************************************************************************ -->
        <section class="col-lg-12 col-md-12 col-xs-12 connectedSortable">
          <div class="box box-info">
            <div class="box-header">
                  <i class="fa fa-gift"></i>
                  <h3 class="box-title">Premios</h3>
                <div style="width:100%; height:300px;">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
  <?php if ($ultimo_premio): ?>
    <?php foreach ($ultimo_premio->result() as $data): ?>
      <div class="item active">
      <img src="<?=$this->config->base_url()?>./uploads/img/<?=$data->imagen?>" ALT="Bluecarrot"style="max-width:250px;">
    </div>
    <?php endforeach ?>
  <?php endif ?>

<?php if ($premio_diferente): ?>
  <?php foreach ($premio_diferente->result() as $data): ?>
      <div class="item">
        <img src="<?=$this->config->base_url()?>./uploads/img/<?=$data->imagen?>" ALT="Bluecarrot"style="max-width:250px;">
    </div>
  <?php endforeach ?>

<?php endif ?>

  </div>
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel"  data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
              </div>
              <br>
              <br>
              <br>
              <div align="right">
              <a href="<?=$this->config->base_url()?>premio/catalogo" title=""><button type=""class="btn btn-success">Ver Catalogo</button></a>
              </div>
            </div>
          </div>
         </div>
<!-- *********************************************************************** -->
 <!--  <div class="box box-warning">
            <div class="box-header">
              <i class="fa fa-signal"></i>

              <h3 class="box-title">Conexiones por equipos</h3>
            </div>
            <div class="box-body chat" id="chat-box">
            <div id="graf_colum" style="width:100%; height:400px;">
              <br>
            </div>
            <br>
            <div align="right">
               <a href="<?=$this->config->base_url()?>conexion" title=""><button type=""class="btn btn-success">Ir a Conexiones</button></a>
               <p>
            </div>
          </div>
  </div> -->
<!-- <div class="box box-warning">
            <div class="box-header">
              <i class="fa fa-calendar"></i>
              <h3 class="box-title">Conexiones por meses del ano</h3>
            </div>
            <div class="box-body chat" id="chat-box">
            <div id="graf_col_2" style="width:100%; height:400px;">
              <br>
            </div>
             <div align="right">
               <a href="<?=$this->config->base_url()?>conexion" title=""><button type=""class="btn btn-success">Ir a Conexiones</button></a>
               <p>
            </div>
          </div>
  </div> -->
 <!--  <div class="box box-warning">
            <div class="box-header">
              <i class="fa fa-calendar"></i>
              <h3 class="box-title">Conexiones por horario</h3>
            </div>
            <div class="box-body chat" id="chat-box">
            <div id="graf_col_3" style="width:100%; height:400px;">
              <br>
            </div>
             <div align="right">
               <a href="<?=$this->config->base_url()?>conexion" title=""><button type=""class="btn btn-success">Ir a Conexiones</button></a>
               <p>
            </div>
          </div>
  </div> -->
 <!--   <div class="box box-warning">
            <div class="box-header">
              <i class="fa fa-map-marker"></i>
              <h3 class="box-title">Ubicaciones</h3>
            </div>
            <div class="box-body chat" id="chat-box">
              <?= $map['html'];?>
              <br>
               <div align="right">
                  <a href="<?=$this->config->base_url()?>equipo" title=""><button type=""class="btn btn-success">Ir a Equipos</button></a>

                  </div>
                   <br>
            </div>

          </div> -->
    <!-- ***************************************************************** -->
          </section>


  </div>
  <!-- /.content-wrapper -->
