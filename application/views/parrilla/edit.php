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
        <h3 class="box-title"><strong>Editar Parrilla</strong></h3>
      </div>
      <div class="box-body">
     <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>parrilla/editar_parrilla" method="POST">
     <input type="hidden" id="id_parrilla"name="id_parrilla" value="<?php echo $id_parrilla?>">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-1 col-sm-1 col-xs-1">
					<h5 ><P ALIGN="RIGHT"><label>Anunciante:</label></h5 ></P>
					</div>
				  <div class="col-md-11 col-sm-11 col-xs-11">
						<select class="form-control" name="id_anunciante" id="id_anunciante" data-show-subtext="true" data-live-search="true" required="required">
									<option value="">Seleccione Anunciante</option>
									 <?php
									 if ($anunciante) {
									 foreach ($anunciante as $i) {
							               echo '<option value="'. $i->id .'">'.$i->nombre.'</option>';
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
					<h5 ><P ALIGN="RIGHT"><label>Tipo:</label></h5 ></P>
					</div>
				  <div class="col-md-11 col-sm-11 col-xs-11">
						<select name="id_tipo_anuncio" id="id_tipo_anuncio" class="form-control" required="required">
					<option value="">Seleccione Tipo de Anuncio</option>
									 <?php
									 if ($tipo_anuncio) {
									 foreach ($tipo_anuncio as $i) {
							               echo '<option value="'. $i->id .'">'.$i->tipo_anuncio.'</option>';
							            }
									 }else{
									 }
							        ?>
						</select>
					</div>
				</div>
				<!-- ******************************************************************* -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Equipo:</label></h5 ></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
							<select name="id_equipo" id="id_equipo" class="form-control" required="required">
								<option value="">Seleccione Equipo</option>
									<?php
									 if ($equipo) {
									 foreach ($equipo as $i) {
							               echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
							            }
									 }else{
									 }
							        ?>
							</select>
					</div>
				</div>
				<!-- ******************************************************************* -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Horario:</label></h5 ></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
							<select name="id_horario" id="id_horario" class="form-control" required="required">
								<option value="">Seleccione Horario</option>
									<?php
									 if ($horario) {
									 foreach ($horario as $i) {
							               echo '<option value="'. $i->id .'">'.$i->horario.'</option>';
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
							<h5 ><P ALIGN="RIGHT"><label>F Inicio:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">

							<input type="date" name="dt_fecha_i" id="dt_fecha_i" value="" placeholder="" class="form-control" required="required">
						</div>
					</div>
				<!-- ****************************************************************** -->
      			<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">
							<h5 ><P ALIGN="RIGHT"><label>F Final:</label></h5 ></P>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="date" name="dt_fecha_f" id="dt_fecha_f" value="" placeholder="" class="form-control" required="required">
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
				      <a href="<?php echo $this->config->base_url();?>parrilla"><button type="button" class="btn btn-danger btn-lg">Cancelar</button></a>
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