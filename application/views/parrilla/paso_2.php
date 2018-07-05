<div class="content-wrapper">
<section class="content-header">
<!-- ********************************************************************* -->
    <h1>
     <label>Parrilla</label>
    </h1>
  </section>
		 <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border ">
        <h3 class="box-title"><strong>Definir los tipos de Anuncios</strong></h3>
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
      <?=form_open_multipart(base_url()."parrilla/guardar_detalle_parrilla")?>
     <form role="form" action="<?php echo $this->config->base_url();?>parrilla/guardar_detalle_parrilla" method="POST" enctype="multipart/form-data">
			<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php foreach ($det_parrilla->result() as $data):
					$id_tipo_anuncio=$data->id_tipo_anuncio;
					$id_parrilla=$data->id_parrilla;?>

	<!--**********************si_el_anuncio_es_de_blue_video****************-->
					<?php if ($id_tipo_anuncio==1): ?>
						<input type="hidden" name="txt_tipo_anuncio_1" id="txt_tipo_anuncio_1" value="<?= $id_tipo_anuncio?>">
					<h3><label class="label label-info">&nbsp;Blue Video &nbsp;</label>
					</h3>
					<div class="warning-md-12 col-sm-12 col-xs-12">
						<div class="col-md-2 col-sm-2 col-xs-2">
						<label>Video 1 Espa</label>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
							<input type="file" name="mi_archivo_1_espa" required="required">Formato.webm
					</div>
					</div>
					<div class="warning-md-12 col-sm-12 col-xs-12">
						<p>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<label>Video 2 Espa</label>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
							<input type="file" name="mi_archivo_2_espa" required="required">Formato.Mp4
							<p>
						</div>
					</div>
					<div class="warning-md-12 col-sm-12 col-xs-12">
					<hr>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<label>Video 1 Cata</label>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
							<input type="file" name="mi_archivo_1_cata" required="required">Formato.webm
					</div>
					</div>
					<div class="warning-md-12 col-sm-12 col-xs-12">
						<p>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<label>Video 2 Cata</label>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
							<input type="file" name="mi_archivo_2_cata" required="required">Formato.Mp4
							<p>
						</div>
					</div>
					<div class="warning-md-12 col-sm-12 col-xs-12">
						<hr>
						<div class="col-md-2 col-sm-2 col-xs-2">
						<label>Video 1 Eng</label>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="file" name="mi_archivo_bota" required="required">Formato.Mp4
					</div>
					</div>
					<div class="warning-md-12 col-sm-12 col-xs-12">
						<p>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<label>Video 2 Eng</label>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
							<input type="file" name="mi_archivo_2_ingles" required="required">Formato.Mp4
							<p>
						</div>

					</div>
					<?php endif ?>

	<!-- ***************************************************************** -->
					<?php if ($id_tipo_anuncio==2): ?>
	<!-- ***********************si es Blue Sharing************************ -->
						<br>
				<input type="hidden" name="txt_tipo_anuncio_2" id="txt_tipo_anuncio_2" value="<?= $id_tipo_anuncio?>">

			<h3><label class="label label-info">&nbsp;Blue Sharing &nbsp;</label></h3>
						<br>

					<div class="warning-md-12 col-sm-12 col-xs-12">
						<p>
							<div class="col-md-2 col-sm-2 col-xs-2">
								<label>Imagen Esp</label>
							</div>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="file" name="imagen_compartir_esp" required="required">
								<p>
							</div>
					</div>
					<div class="warning-md-12 col-sm-12 col-xs-12">
						<p>
							<div class="col-md-2 col-sm-2 col-xs-2">
								<label>Imagen Cata</label>
							</div>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="file" name="imagen_compartir_cata" required="required">
								<p>
							</div>
					</div>
					<div class="warning-md-12 col-sm-12 col-xs-12">
						<p>
							<div class="col-md-2 col-sm-2 col-xs-2">
								<label>Imagen Eng</label>
							</div>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="file" name="imagen_compartir_eng" required="required">
								<p>
							</div>
					</div>
					<?php endif ?>
					<hr>
		<!-- ******************************************************************* -->
					<?php if ($id_tipo_anuncio==3):?>
		<!--******************************* si es Blue Follow******************* -->
						<input type="hidden" name="txt_tipo_anuncio_3" id="txt_tipo_anuncio_3" value="<?= $id_tipo_anuncio?>">
								<br>
						<h3><label class="label label-info">&nbsp;Blue Follow &nbsp;</label></h3>
								<br>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<strong>Facebook:</strong>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
					<input type="text" class="form-control" name="txt_url_facebook" id="txt_url_facebook" value="" placeholder="Ingrese Url facebook" required="required">
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<br>
						<strong>Twitter:</strong>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
					<br>
					<input type="text" class="form-control" name="txt_url_twitter" id="txt_url_twitter" value="" placeholder="Ingrese Url Twitter" required="required">

					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<br>
						<strong>Instagram:</strong>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
					<br>
					<input type="text" class="form-control" name="txt_url_instagram" id="txt_url_instagram" value="" placeholder="Ingrese Url Instagram" required="required">
					<br>
					</div>

					<?php endif ?>
	<!-- ************************************************************************ -->
					<?php if ($id_tipo_anuncio==4): ?>
	<!-- **************************si es Blue Question **************************-->
				<input type="hidden" name="txt_tipo_anuncio_4" id="txt_tipo_anuncio_4" value="<?= $id_tipo_anuncio?>">
							<h3><label class="label label-info">&nbsp;Blue Question &nbsp;</label>	</h3>
									<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-1 col-sm-1 col-xs-1">
		</div>
		<div class="col-md-11 col-sm-11 col-xs-11">
			<input type="radio" name="opcion" id="opcion" onclick="texto()" value="1" checked="checked"><label>Texto</label>
			&nbsp;&nbsp;
		<input type="radio" name="opcion" id="opcion" onclick="imagenes()" value="2" placeholder=""><label>Imagenes</label>
		<br>
		</div>
		</div>
<!--************************El form de texto****************************************-->
	<div id="texto" style="display: block">
	<!-- **************************Espanol*********************************** -->
			<div align="center">
				<h2><label class="label label-warning">Español</label></h2>
				<br>
			</div>
		<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Pregunta:</label>

						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_pregunta_esp" id="txt_p_t" value="" placeholder="Ingrese su Pregunta">
						</div>
					</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 1:</label>

						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_1_esp" id="txt_p_t" placeholder="Ingrese Respuesta 1">
						</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 2:</label>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_2_esp" id="txt_p_t" placeholder="Ingrese Respuesta 2">
						</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 3:</label>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_3_esp" id="txt_p_t" placeholder="Ingrese su Respuesta 3(opcional)">
						</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 4:</label>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_4_esp" id="txt_p_t" placeholder="Ingrese su Respuesta 4 (Opcional)">
						</div>
	</div>
	<!--******************************************************************** -->
	<!-- ******************************************************************* -->

	<div class="col-md-12 col-sm-12 col-xs-12">
	<hr>
	<div align="center">
		<h2><label class="label label-warning">Catalan</label></h2>
		<br>
	</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Pregunta:</label>

						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_pregunta_cata" id="txt_p_t" value="" placeholder="Ingrese su Pregunta">
						</div>
					</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 1:</label>

						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_1_cata" id="txt_p_t" placeholder="Ingrese Respuesta 1">
						</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 2:</label>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_2_cata" id="txt_p_t" placeholder="Ingrese Respuesta 2">
						</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 3:</label>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_3_cata" id="txt_p_t" placeholder="Ingrese su Respuesta 3(opcional)">
						</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 4:</label>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_4_cata" id="txt_p_t" placeholder="Ingrese su Respuesta 4 (Opcional)">
						</div>
	</div>

	<!-- ******************************************************************* -->

	<div class="col-md-12 col-sm-12 col-xs-12">
	<hr>
	<div align="center">
		<h2><label class="label label-warning">Ingles</label></h2>
		<br>
	</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Pregunta:</label>

						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_pregunta_eng" id="txt_p_t" value="" placeholder="Ingrese su Pregunta">
						</div>
					</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 1:</label>

						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_1_eng" id="txt_p_t" placeholder="Ingrese Respuesta 1">
						</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 2:</label>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_2_eng" id="txt_p_t" placeholder="Ingrese Respuesta 2">
						</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 3:</label>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_3_eng" id="txt_p_t" placeholder="Ingrese su Respuesta 3(opcional)">
						</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<label>Resp 4:</label>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_respuesta_4_eng" id="txt_p_t" placeholder="Ingrese su Respuesta 4 (Opcional)">
						</div>
	</div>
	<!-- ******************************************************************* -->
	</div>
	<!--*********************************************************************-->
	<!--**************************Imagenes **********************************-->
	<div id="imagen" style="display: none;">
		<div class"col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div align="right"class="col-md-2 col-sm-2 col-xs-2">
				<label>Pregunta Español:</label>
			   </div>
			   <div class="col-md-10 col-sm-10 col-xs-10">
				<input type="text" class="form-control" name="txt_pregunta_img_esp" id="txt_p_r" value="" placeholder="ingrese su Pregunta">
				<p>
				</div>

			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div align="right"class="col-md-2 col-sm-2 col-xs-2">
				<label>Pregunta Ingles:</label>
			   </div>
			   <div class="col-md-10 col-sm-10 col-xs-10">
				<input type="text" class="form-control" name="txt_pregunta_img_eng" id="txt_p_r" value="" placeholder="ingrese su Pregunta">
				<p>
				</div>

			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div align="right"class="col-md-2 col-sm-2 col-xs-2">
				<label>Pregunta Catalan:</label>
			   </div>
			   <div class="col-md-10 col-sm-10 col-xs-10">
				<input type="text" class="form-control" name="txt_pregunta_img_cata" id="txt_p_r" value="" placeholder="ingrese su Pregunta">
				<p>
				</div>
			</div>
		</div>
		<div class"col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div align="right"class="col-md-2 col-sm-2 col-xs-2">
				<label>Respuesta 1:</label>
			   </div>
			   <div class="col-md-10 col-sm-10 col-xs-10">
			<input type="file" name="respuesta_1" >
				<p>
				</div>
			</div>
		</div>
		<div class"col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div align="right"class="col-md-2 col-sm-2 col-xs-2">
				<label>Respuesta 2:</label>
			   </div>
			   <div class="col-md-10 col-sm-10 col-xs-10">
			<input type="file" name="respuesta_2" >
				<p>
				</div>

			</div>
		</div>
		<div class"col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div align="right"class="col-md-2 col-sm-2 col-xs-2">
				<label>Respuesta 3:</label>
			   </div>
			   <div class="col-md-10 col-sm-10 col-xs-10">
			<input type="file" name="respuesta_3"><label>(Opcional)</label>
				<p>
				</div>

			</div>
		</div>
		<div class"col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div align="right"class="col-md-2 col-sm-2 col-xs-2">
				<label>Respuesta 4:</label>
			   </div>
			   <div class="col-md-10 col-sm-10 col-xs-10">
			<input type="file" name="respuesta_4" ><label>(Opcional)</label>
				<p>
				</div>

			</div>
		</div>

	</div>
<!--*************************************************************************-->
					<?php endif ?>
<!-- *********************************************************************** -->
					<?php if ($id_tipo_anuncio==5): ?>
			<!-- *********************si es Blue Landing************************* -->
				<input type="hidden" name="txt_tipo_anuncio_5" id="txt_tipo_anuncio_5" value="<?= $id_tipo_anuncio?>">
								<br>
							<p>.</p><h3><label class="label label-info">&nbsp;	Blue Landing &nbsp;</label>
					<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-1 col-sm-1 col-xs-1">
						URL:
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" class="form-control" name="txt_landing" id="txt_landing" value="" placeholder="Ingrese Url de la Landing page">
						</div>
						</div>
					<?php endif ?>

				<?php endforeach ?>
			</div>
			</div>
<input type="hidden"  name="txt_id_parrilla_1" id="txt_id_parrilla_1" value="<?=$id_parrilla?>">
      </div>
      <!-- ***************************************************** -->
      <!-- /.box-body -->
      <div class="box-footer">
          <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-2 col-sm-2 col-xs-2">
				</div>
				    <div class="col-md-offset-1 col-md-12 col-sm-12 col-xs-12">
				      <button type="submit" id="continuar" class="btn btn-info btn-lg">Continuar</button>
				      <a href="<?php echo $this->config->base_url();?>parrilla/eliminar_parrilla/<?=$id_parrilla?>"><button type="button" class="btn btn-danger btn-lg">Cancelar</button></a>
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