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
          <h3 class="box-title"><strong>Catalogo de premios</strong></h3>
        </div>
        <div class="box-body">
        <?php if ($premio): ?>
        <?php foreach ($premio->result() as $data): ?>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-2 col-sm-2 col-xs-2 " align="center">
           <a href="<?=$this->config->base_url()?>premio/ver_premio/<?=$data->id?>" title=""><img src="<?=$this->config->base_url()?>/uploads/img/<?= $data->imagen?>" class="img-responsive" WIDTH=105 HEIGHT=48 alt=""></a>
          </div>
            <div class="col-md-8 col-sm-8 col-xs-8">
            <p><strong><h2><a href="<?=$this->config->base_url()?>premio/ver_premio/<?=$data->id?>" title=""><?=$data->nombre?></a></h2></strong></p>
            <p><h4><?=substr($data->descripcion, 0, 200)?>...</h4></p>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2" align="left">
               <div>
               <i class="fa fa-check-circle" aria-hidden="true" title=""></i>
                  <label>&nbsp;Puntos:</label>
                  &nbsp;<?=$data->puntaje?>
               </div>
               <div>
                  <label><i class="fa fa-shopping-basket" aria-hidden="true" title=""></i>&nbsp;U. Disponibles:</label>
                <?=$data->cantidad?>
               </div>
            </div>
            <hr>

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