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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$contar_cliente?></h3>
              <p>Clientes</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=$this->config->base_url()?>cliente" class="small-box-footer">Mas Info &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$contar_conexion?></h3>
              <p>Conexiones</p>
            </div>
            <div class="icon">
              <i class="fa fa-plug"></i>
            </div>
            <a href="<?=$this->config->base_url()?>conexion" class="small-box-footer">Mas Info &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$contar_equipo?></h3>

              <p>Equipos Registrados</p>
            </div>
            <div class="icon">
              <i class="fa fa-wifi"></i>
            </div>
            <a href="<?=$this->config->base_url()?>equipo" class="small-box-footer">Mas Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$contar_anunciante?></h3>
              <p>Anunciante</p>
            </div>
            <div class="icon">
              <i class="fa fa-toggle-on"></i>
            </div>
            <a href="<?=$this->config->base_url()?>anunciante" class="small-box-footer">Mas Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>

      <div class="row">


<!-- ************************************************************************ -->
        <section class="col-lg-12 col-md-12 col-xs-12 connectedSortable">
          <div class="box box-info">
            <div class="box-header">
                  <i class="fa fa-plug"></i>

                  <h3 class="box-title">Conexiones</h3>

                <div id="grafico" style="width:100%; height:400px;">
              </div>
                  <div align="right">
                  <a href="<?=$this->config->base_url()?>conexion" title=""><button type=""class="btn btn-success">Ir a Conexiones</button></a>

                  </div>
            </div>
          </div>
         </div>
<!-- *********************************************************************** -->
  <div class="box box-warning">
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
  </div>
<div class="box box-warning">
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
  </div>
  <div class="box box-warning">
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
  </div>
   <div class="box box-warning">
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

          </div>
    <!-- ***************************************************************** -->
          </section>


  </div>
  <!-- /.content-wrapper -->
