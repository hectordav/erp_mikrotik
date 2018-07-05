<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <h1>
       <label>Premio</label>
      </h1>
    </section>
       <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-info animated fadeIn">
        <div class="box-header with-border ">
          <h3 class="box-title"><strong>Canje de pemio</strong></h3>
        </div>
        <div class="box-body">
        <?php if ($premio): ?>
        <?php foreach ($premio->result() as $data): ?>
        <div class="col-md-12 col-sm-12 col-xs-12" align="center">
          <div class="col-md-2 col-sm-2 col-xs-2 " align="center">
           <a href="<?=$this->config->base_url()?>premio/ver_premio/<?=$data->id?>" title=""><img src="<?=$this->config->base_url()?>/uploads/img/<?= $data->imagen?>" class="img-responsive" WIDTH=105 HEIGHT=48 alt=""></a>
          </div>
            <div class="col-md-7 col-sm-7 col-xs-7">
            <p><strong><h2><a href="<?=$this->config->base_url()?>premio/ver_premio/<?=$data->id?>" title=""><?=$data->nombre?></a></h2></strong></p>
           <!--  <p><h4><?=substr($data->descripcion, 0, 200)?>...</h4></p> -->
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3" align="left">
          <?php if ($puntaje>0): ?>
          <input type="hidden" name="txt_id_usuario" value="<?=$id_usuario?>">
         <h5>&nbsp;Puntos Acumulados &nbsp; &nbsp;
         <strong><?=$puntaje?></strong></h5>
         <h5>&nbsp;Valor &nbsp; &nbsp;
         <strong><?=$data->puntaje?></strong></h5>
         Cantidad&nbsp;<input type="number" name="txt_cantidad" id="txt_cantidad" value="1" placeholder="Ingrese Cantidad">
         <div>
           <button type="button" class="btn btn-success">Canjear</button>
         </div>

          <?php else: ?>
            <label>Lo Sentimos no tienes suficientes puntos para Canjear</label>
        <?php endif ?>
            </div>

        </div>
        <div>
          <hr>
        </div>
            <?php endforeach ?>
          <?php else: ?>
           No existe catalogo de premios
        <?php endif ?>

          <hr>

          <!-- ****************************************************************** -->
        <div class="col-sm-12 col-xs-12 col-md-12">
          <div class="col-md-4 col-sm-4 col-xs-4">

          </div>
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="col-md-2 col-sm-2 col-xs-2">
          </div>

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
    <!-- Content Header (Page header) -->
  </div>