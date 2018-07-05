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
        <h3 class="box-title"><strong>Desactivar/Activar Equipo</strong></h3>
      </div>
      <div class="box-body">
     <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>equipo/actualizar_desactivar_equipo" method="POST">

		<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-1 col-sm-1 col-xs-1">

							<h5 ><P ALIGN="RIGHT"><label>Descripcion:</label></h5 ></P>
						</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
			<?php if ($equipo): ?>
				<?php foreach ($equipo->result() as $data): ?>
					<input type="text" name="txt_descripcion" id="txt_descripcion" value="<?= $data->descripcion?>" placeholder="Ingrese Descripcion" class="form-control" required="required" readonly="true">
							<?php endforeach ?>
							<?php else: ?>
								<input type="text" name="txt_descripcion" id="txt_descripcion" value="" placeholder="Ingrese Descripcion" class="form-control" required="required">

						<?php endif ?>

						</div>
				</div>


			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-1 col-sm-1 col-xs-1">
				<?php if ($equipo): ?>
						<?php foreach ($equipo->result() as $key): ?>
							<?$id_equipo=$key->id?>

						<?php endforeach ?>
				<?php endif ?>

				<input type="hidden" name="txt_id_equipo" id="txt_id_equipo" value="<?php echo $id_equipo?>">
		<!-- ****************************************************************** -->
					<h5 ><P ALIGN="RIGHT"><label>Opcion:</label></h5 ></P>
					</div>
				  <div class="col-md-11 col-sm-11 col-xs-11">
						<select class="form-control" name="id_opcion" id="id_opcion" data-show-subtext="true" data-live-search="true" required="required">
									<option value="">Opciones</option>
									 <?php
									 if ($opcion) {
									 foreach ($opcion as $i) {
							               echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
							            }
									 }else{
									 }
							        ?>
						</select>
					</div>
			</div>

      </div>

	<!-- ******************************************************************** -->


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