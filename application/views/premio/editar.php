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
      <div class="box box-info">
        <div class="box-header with-border ">
          <h3 class="box-title"><strong>Editar Premio</strong></h3>
        </div>
        <div class="box-body">
       <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>premio/actualizar_premio" method="POST" enctype="multipart/form-data">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5><P ALIGN="RIGHT"><label>Anunciante:</label></h5></P>
						</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
					<select class="form-control" name="id_anunciante" id="id_anunciante" data-show-subtext="true" data-live-search="true" required>
										<option value="">Seleccione</option>
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
					<?php if ($premio): ?>
						<?php foreach ($premio->result() as $data): ?>
						<h5><P ALIGN="RIGHT"><label>Codigo:</label></h5></P>
						</div>
						<input type="hidden" name="txt_id_premio" id"txt_id_premio" value="<?=$data->id?>">
					  <div class="col-md-11 col-sm-11 col-xs-11">
						<input type="text" class="form-control" name="txt_codigo" id="txt_codigo" value="<?=$data->codigo?>" >
						</div>
					</div>

					<!-- ******************************************************************* -->
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5><P ALIGN="RIGHT"><label>Nombre:</label></h5></P>
					</div>
					  <div class="col-md-11 col-sm-11 col-xs-11">
				<input type="text" class="form-control" name="txt_nombre" id="txt_nombre" value="<?=$data->nombre?>" placeholder="Ingrese el Nombre del Premio">
						</div>
					</div>

					<!-- ******************************************************************* -->
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5><P ALIGN="RIGHT"><label>Descripcion:</label></h5></P>
					</div>
					  <div class="col-md-11 col-sm-11 col-xs-11">
				<textarea name="txt_descripcion"  class="form-control" id="txt_descripcion"><?=$data->descripcion?></textarea>
				<p>
						</div>


					</div>


					<!-- ****************************************************************** -->
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5><P ALIGN="RIGHT"><label>Puntos:</label></h5></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-11">
							<input type="number" name="txt_puntaje" id="txt_puntaje" class="form-control" value="<?=$data->puntaje?>" >
						</div>
					</div>

					<!-- ****************************************************************** -->
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5><P ALIGN="RIGHT"><label>Cantidad:</label></h5></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-11">
							<input type="number" name="txt_cantidad" id="txt_cantidad" class="form-control" value="<?=$data->cantidad?>" >
						</div>
					</div>

					<!-- ****************************************************************** -->
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5><P ALIGN="RIGHT"><label>Imagen:</label></h5></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-11">
					  <br>
					<input type="file" name="mi_imagen" required="required">
						</div>
					</div>
					<?php endforeach ?>
						<?php else: ?>
					<?php endif ?>
					<!-- ****************************************************************** -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
					</div>
				<div class="col-md-offset-1 col-md-12 col-sm-12 col-xs-12">
					<button type="submit" class="btn btn-info">Guardar</button>
					  <a href="<?php echo $this->config->base_url();?>premio"><button type="button" class="btn btn-danger">Cancelar</button></a>
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