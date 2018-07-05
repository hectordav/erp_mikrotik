 <div class="content-wrapper">
  <section class="content-header">
      <h1>
       <label>Premio</label>
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <!-- Left col -->
        <section class="col-md-12 col-sm-12 col-xs-12 connectedSortable">
          <div class="box box-info">
         <div class="animated fadeIn">
             <div class="">
            <div class="page-title">
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>&nbsp;&nbsp;&nbsp;Premio</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php if ($premio): ?>
                      <?php foreach ($premio->result() as $data): ?>
                    <?$id_premio=$data->id;?>

                        <div class="product-image" align="center">
                        <img src="<?=$this->config->base_url()?>/uploads/img/<?=$data->imagen?>" alt="..." WIDTH=330 HEIGHT=450 alt="">
                      </div>


                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                      <h2 class="prod_title"><strong><?=$data->nombre?></strong></h2>
<div class="">
                        <h2>Descripcion <small></small></h2>
                        <ul class="list-inline prod_size">
                          <li>

                          </li>
                          <li>
                          <h4><?=$data->descripcion?></h4>
                          </li>

                        </ul>
                      </div>
                      <br/>

                      <div class="">
                      <hr>
                        <div class="product_price" align="left">
                        <div>
                        <h2><strong>Cant.</strong>&nbsp;&nbsp;<?=$data->cantidad?>&nbsp;U.D</h2>
                        <?php $punto_premio=$data->puntaje;
                        $punto_usuario=$puntaje;?>
                          <h2><strong>Puntos</strong> &nbsp;&nbsp;&nbsp;<?=$punto_premio?>&nbsp;Pts</h2>
                        </div>
                          <h3 class="price"></h3>
                          <h2><strong>Tus Puntos</strong>&nbsp;<?=$punto_usuario?> &nbsp;Pts</h2>

                          <br>

                           <h3 class="price"></h3>
                        </div>
                      </div>
                        <?php endforeach ?>
                    <?php endif ?>
                    <br>
                  <div class="" align="right">
                  <?php if ($punto_usuario> $punto_premio): ?>
                     <a data-toggle="modal" href="#canje"title=""><button type="button" class="btn btn-success btn-lg">Canjear</button></a>
                  <?php else: ?>
                    <div>
                      <h4><label>No tienes suficientes puntos para cambiar</label></h4>

                    </div>

                  <?php endif ?>

                       <a href="<?=$this->config->base_url()?>premio/catalogo" title=""> <button type="button" class="btn btn-info btn-lg">Volver al Catalogo</button></a>
                  </div>
                    </div>
                    <div class="col-md-12">
                  <br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          </div>
        </section>
      </div>
    </section>
  </div>


<!-- page content -->
        <div class="right_col" role="main">


        </div>