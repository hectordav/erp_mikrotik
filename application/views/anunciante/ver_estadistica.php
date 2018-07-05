<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tablero
        <small>Ver Estaditsticas</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->


      <div class="row">


<!-- ************************************************************************ -->
        <section class="col-lg-12 col-md-12 col-xs-12 connectedSortable">
          <div class="box box-info">
            <div class="box-header">
                  <i class="fa fa-plug"></i>

                  <h3 class="box-title">Pregunta</h3>
                    <h3 align="center"><label><?=$pregunta?></label></h3>


                <div id="grafico" style="width:100%; height:400px;">
              </div>
                  <div align="right">
                 <!--  <div>
                    <label>Total a la fecha: <?=$mes?></label>
                  </div> -->

                  <a href="<?=$this->config->base_url()?>anunciante/ver_parrilla_asignada" title=""><button type=""class="btn btn-success">Ir a estadisticas</button></a>

                  </div>
            </div>
          </div>
         </div>
<!-- *********************************************************************** -->
  <div class="box box-warning">
            <div class="box-header">
              <i class="fa fa-signal"></i>

              <h3 class="box-title">Pregunta</h3>
            </div>
            <div class="box-body chat" id="chat-box">
       <h3 align="center"><label><?=$pregunta?></label></h3>
          <table class="table table-bordered table-hover">
    <thead>
      <tr>
          <?php foreach ($respuestas as $key): ?>
              <th><?=($key)?></th>
              <?php endforeach ?>
      </tr>
    </thead>
    <tbody>
      <tr>
       <?php foreach ($resultado as $key_2): ?>
              <th><?=($key_2)?></th>
              <?php endforeach ?>
      </tr>

    </tbody>
  </table>
            <br>
            <div align="right">
               <a href="<?=$this->config->base_url()?>anunciante/ver_parrilla_asignada" title=""><button type=""class="btn btn-success">Ir a estadisticas</button></a>
               <p>
            </div>
          </div>
  </div>
    <!-- ***************************************************************** -->
          </section>


  </div>
  <!-- /.content-wrapper -->
