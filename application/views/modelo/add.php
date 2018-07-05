<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <h1>
       <label>Modelo de Producto</label>
      </h1>
    </section>
			 <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-info">
        <div class="box-header with-border ">
          <h3 class="box-title"><strong>Agregar Modelo de producto</strong></h3>
        </div>
        <div class="box-body">
       <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>modelo/guardar_modelo" method="POST">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Tipo:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-11">
							<select class="form-control" name="id_tipo" id="id_tipo" data-show-subtext="true" data-live-search="true" required>
										<option value="">Seleccione</option>
										 <?php
										 if ($tipo) {
										 foreach ($tipo as $i) {
								               echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
								            }
										 }else{
										 }
								        ?>
							</select>
						</div>
				</div>
				<!-- ******************************************************************** -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Marca:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-11">
							<select name="id_marca" id="id_marca" class="form-control" required>
						<option value=""></option>
							</select>
						</div>
					</div>
					<!-- ******************************************************************* -->
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Modelo:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_modelo" id="txt_modelo" class="form-control">
						</div>
					</div>
					<!-- ****************************************************************** -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
					</div>
					    <div class="col-md-offset-1 col-md-12 col-sm-12 col-xs-12">
					      <button type="submit" class="btn btn-info">Guardar</button>
					      <a href="<?php echo $this->config->base_url();?>modelo"><button type="button" class="btn btn-danger">Cancelar</button></a>
					    </div>
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
	</div>
    <!-- Content Header (Page header) -->
  </div>