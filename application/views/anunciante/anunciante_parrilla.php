<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <h1>
       <label>Parrilla Anunciante</label>
      </h1>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <?$correcto = $this->session->flashdata('alerta');
    if (($correcto))
    {?>
    <div class="animated bounceInDown">
     <div class="alert alert-danger" role="alert" >
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong></strong><strong><?=$correcto?></strong>
      <br>
    </div>
    </div>
<!--**********************************-->
    <?}else{?>
      <?}?>
      </div>
        <!-- Left col -->
        <section class="col-md-12 col-sm-12 col-xs-12 connectedSortable">
          <div class="box box-info">
         <div class="animated fadeIn">
                <?php echo $output; ?>
          </div>
          </div>
        </section>
      </div>
    </section>
  </div>

