<!-- Content Wrapper. Contains page content -->
<script>
/***************************compara las fechas*********************************/
function fncompara_fecha(){


var fecha_1 = document.getElementById("dt_fecha_i").value;
var fecha_2 = document.getElementById("dt_fecha_f").value;
elemento = document.getElementById("tipo_check");
if(fecha_2< fecha_1){
    console.log("fecha 2 es menor");
    alert("Fecha Final es menor a la Fecha de Inicio");
      document.getElementById('continuar').disabled=true;
}else{
	   document.getElementById('continuar').disabled=false;
}

}
/*********************************************************/

</script>

<div class="content-wrapper">
<section class="content-header">
<!-- ************************************************************************* -->
<!-- ************************************************************************* -->
    <h1>
     <label>Parrilla</label>
    </h1>
  </section>
		 <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border ">
        <h3 class="box-title"><strong>Agregar Parrilla</strong></h3>
      </div>
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
      <div class="box-body">
     <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>parrilla/guardar_parrilla" method="POST">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-1 col-sm-1 col-xs-1">
					<h5 ><P ALIGN="RIGHT"><label>Anunciante:</label></h5 ></P>
					</div>
				  <div class="col-md-11 col-sm-11 col-xs-11" align="justify">
						<select class="selectpicker form-control" name="id_anunciante" id="id_anunciante" data-show-subtext="true" data-live-search="true" required="required">
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
			<p>
				<div class="col-md-1 col-sm-1 col-xs-1">
					<h5 ><P ALIGN="RIGHT"><label>Tipo:</label></h5 ></P>
					</div>
				  <div class="col-md-11 col-sm-11 col-xs-11" align="justify">
									 <?php
									 if ($tipo_anuncio) {
									 foreach ($tipo_anuncio as $i) {?>
			<input type="checkbox"id="tipo_check" name="anuncio[]" value="<?echo $i->id;?>">&nbsp;&nbsp;&nbsp;<?= $i->tipo_anuncio?> &nbsp;&nbsp;&nbsp;
							            <?}?>
									 <?}else{
									 }
							        ?>
					</div>
				</div>
				<!-- ******************************************************************* -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Ciudad:</label></h5 ></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
							<select name="id_ciudad" id="id_ciudad" class="form-control" required="required">
									<option value="">Seleccione Ciudad</option>
									<?php
									 if ($ciudad) {
									 foreach ($ciudad as $i) {
							               echo '<option value="'. $i->id .'">'.$i->ciudad.'</option>';
							            }
									 }else{
									 }
							        ?>
							</select>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1" >
						<h5><P ALIGN="RIGHT"><label>Zonas:</label></h5 ></P>
					</div>
			 <div class="col-md-11 col-sm-11 col-xs-11" id="id_zona">

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
							<input type="date" onblur="fncompara_fecha()" name="dt_fecha_f" id="dt_fecha_f" value="" placeholder="" class="form-control" required="required">
						</div>
					</div>
						<!-- ******************************************************************* -->
				<div class="col-md-12 col-sm-12 col-xs-12">
				<p>
				<div class="col-md-1 col-sm-1 col-xs-1">
					<h5 ><P ALIGN="RIGHT"><label>Horario:</label></h5 ></P>
					</div>
				  <div class="col-md-11 col-sm-11 col-xs-11" align="justify">
									 <?php
									 if ($horario) {
									 foreach ($horario as $i) {?>
			<input type="checkbox" name="horario[]" value="<?echo $i->id;?>">&nbsp;&nbsp;&nbsp;<?= $i->hora_i?>-<?= $i->hora_f?>
							            <?}?>
									 <?}else{
									 }
							     ?>
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
				      <button type="submit" id="continuar" class="btn btn-info btn-lg">Continuar</button>
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