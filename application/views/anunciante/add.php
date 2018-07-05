<div class="content-wrapper">
<section class="content-header">
    <h1>
     <label>Anunciante</label>
    </h1>
  </section>
		 <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border ">
        <h3 class="box-title"><strong>Agregar Anunciante</strong></h3>
      </div>
      <div class="box-body">
     <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>anunciante/guardar_anunciante" method="POST" enctype="multipart/form-data">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-1 col-sm-1 col-xs-1">
					<h5 ><P ALIGN="RIGHT"><label>Nombre:</label></h5 ></P>
					</div>
				  <div class="col-md-11 col-sm-11 col-xs-11">
					<input type="text" class="form-control" required="required" name="txt_nombre" id="txt_nombre" value="" placeholder="Ingrese Nombre del Anunciante">
				  </div>
			</div>
			<!-- ******************************************************************** -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-1 col-sm-1 col-xs-1">
					<h5 ><P ALIGN="RIGHT"><label>Direccion:</label></h5 ></P>
					</div>
				  <div class="col-md-11 col-sm-11 col-xs-11">
						<input type="text" class="form-control" required="required" name="txt_direccion" id="txt_direccion" value="" placeholder="Ingrese Direccion">
					</div>
				</div>
				<!-- ******************************************************************* -->
				<div class="col-md-12 col-sm-12 col-xs-12">
				<p>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Logo:</label></h5 ></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
						<input type="file" name="archivo_logo" required="required">
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
				      <button type="submit" class="btn btn-info btn-lg">Guardar</button>
				      <a href="<?php echo $this->config->base_url();?>anunciante"><button type="button" class="btn btn-danger btn-lg">Cancelar</button></a>
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