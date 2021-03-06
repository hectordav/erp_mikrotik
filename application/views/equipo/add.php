<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
    <h1>
     <label>Equipos</label>
    </h1>
  </section>
		 <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border ">
        <h3 class="box-title"><strong>Agregar Equipo</strong></h3>
      </div>
      <div class="box-body">
     <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>equipo/guardar_equipo" method="POST">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-1 col-sm-1 col-xs-1">
					<h5 ><P ALIGN="RIGHT"><label>Tipo:</label></h5 ></P>
					</div>
				  <div class="col-md-11 col-sm-11 col-xs-11">
						<select class="form-control" name="id_tipo" id="id_tipo" data-show-subtext="true" data-live-search="true" required>
									<option value="">Seleccione Tipo</option>
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
					<option value="">Seleccione Marca</option>
						</select>
					</div>
				</div>
				<!-- ******************************************************************* -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Modelo:</label></h5 ></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
							<select name="id_modelo" id="id_modelo" class="form-control" required>
						<option value="">Seleccione Modelo</option>
							</select>
					</div>
				</div>
				<!-- ****************************************************************** -->
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5><P ALIGN="right"><label>Establ:</label></h5 ></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
							<select name="id_establecimiento" id="id_establecimiento" class="form-control" required>
						<option value="">Seleccione Establecimiento Asignado</option>
						<?php
									 if ($establecimiento) {
									 foreach ($establecimiento as $i) {
							               echo '<option value="'. $i->id .'">'.$i->nombre.'</option>';
							            }
									 }else{
									 }
							        ?>
							</select>
					</div>
				</div>
				<!-- ****************************************************************** -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5><P ALIGN="right"><label>Zona:</label></h5 ></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
							<select name="id_zona" id="id_zona" class="form-control" required="required">
						<option value="">Seleccione Zona</option>
						<?php
									 if ($zona) {
									 foreach ($zona as $i) {
							               echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
							            }
									 }else{
									 }
							        ?>
							</select>
					</div>
				</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>Descripcion:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_descripcion" id="txt_descripcion" value="" placeholder="Ingrese La descripcion del Equipo" class="form-control">
						</div>
					</div>
				<!-- ****************************************************************** -->
				<!-- ****************************************************************** -->

      			<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>Dir Mac:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_mac" id="txt_mac" value="" placeholder="Ingrese Direccion Mac" class="form-control">
						</div>
					</div>
				<!-- ****************************************************************** -->

				 <div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>SN:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_serial" id="txt_serial" value="" placeholder="Ingrese Numero de Serie" class="form-control">
						</div>
					</div>
				<!-- ****************************************************************** -->
				<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>Direccion:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
						<input type="text" name="txt_direccion" id="txt_direccion" value="" placeholder="Ingrese Direccion" class="form-control">

						</div>
					</div>
				<!-- ****************************************************************** -->
				 <div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>Latitud:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_lat" id="txt_lat" value="" placeholder="Ingrese Latitud" class="form-control">
						</div>
					</div>
				<!-- ****************************************************************** -->
				 <div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>Longitud:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_lng" id="txt_lng" value="" placeholder="Ingrese Longitud" class="form-control">
						</div>
					</div>
					<!-- ****************************************************************** -->
				 <div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>SSID:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_ssid" id="txt_ssid" value="" placeholder="Ingrese SSID" class="form-control">
						</div>
					</div>
				<!-- ****************************************************************** -->
				<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>Cloud:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_cloud" id="txt_cloud" value="" placeholder="Ingrese Direccion Cloud" class="form-control">
						</div>
					</div>
				<!-- ****************************************************************** -->
				 <div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>Subida:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_subida" id="txt_subida" value="" placeholder="Ingrese Tasa de Subida" class="form-control">
						</div>
					</div>
				<!-- ****************************************************************** -->
				 <div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>Bajada:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_bajada" id="txt_bajada" value="" placeholder="Ingrese Tasa de Bajada" class="form-control">
						</div>
					</div>
				<!-- ****************************************************************** -->
				 <div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>Fecha:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="date" name="dt_fecha" id="dt_fecha" value="" placeholder="Ingrese Fecha " class="form-control">
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
				      <a href="<?php echo $this->config->base_url();?>equipo"><button type="button" class="btn btn-danger btn-lg">Cancelar</button></a>
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