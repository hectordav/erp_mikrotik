<div class="content-wrapper">
<section class="content-header">
    <h1>
     <label>Usuario</label>
    </h1>
  </section>
		 <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border ">
        <h3 class="box-title"><strong>Agregar Usuario</strong></h3>
      </div>
      <div class="box-body">
     <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>usuario/guardar_usuario" method="POST" enctype="multipart/form-data">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-1 col-sm-1 col-xs-1">
					<h5 ><P ALIGN="RIGHT"><label>Nivel:</label></h5 ></P>
					</div>
				  <div class="col-md-11 col-sm-11 col-xs-11">
				<select class="selectpicker form-control" name="id_nivel" id="id_nivel" data-show-subtext="true" data-live-search="true" required="required">
									<option value="">Seleccione Nivel </option>
									 <?php
									 if ($nivel_usuario) {
									 foreach ($nivel_usuario->result() as $i) {
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
					<h5 ><P ALIGN="RIGHT"><label>Nombre:</label></h5 ></P>
					</div>
				  <div class="col-md-11 col-sm-11 col-xs-11">
						<input type="text" class="form-control" required="required" name="txt_nombre" id="txt_nombre" value="" placeholder="Ingrese Nombre">
					</div>
				</div>
				<!-- ******************************************************************* -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Login:</label></h5 ></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
						<input type="text" class="form-control" required="required" name="txt_login" id="txt_login" value="" placeholder="Ingrese Login">
					</div>
				</div>
				<!-- ****************************************************************** -->
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5><P ALIGN="right"><label>Clave:</label></h5 ></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11">
					<input type="password" class="form-control" required="required" name="txt_clave" id="txt_clave" value="" placeholder="Ingrese Telf">
					</div>

				</div>
			<div class="col-md-12 col-sm-12 col-xs-12">

      <div class="col-md-1 col-sm-1 col-xs-1" align="right">
        <label>Descripcion</label>

      </div>
      <div class="col-md-11 col-sm-11 col-xs-11">
      <input type="text" name="txt_descripcion" id="txt_descripcion" class="form-control" value="" placeholder="Describe como eres" required="required" title="">
	<p>
    </div>
  </div>
  <!-- *************************************************************** -->
   <div class="col-md-12 col-sm-12 col-xs-12">

      <div class="col-md-1 col-sm-1 col-xs-1" align="right">
        <label>Sobre Mi</label>

      </div>
      <div class="col-md-11 col-sm-11 col-xs-11">
      <input type="text" name="txt_sobre_mi" id="txt_sobre_mi" class="form-control" value="" placeholder="Hablanos un poco sobre ti" required="required" title="">
     <p>
    </div>
  </div>
  <!-- ************************************************************* -->
   <div class="col-md-12 col-sm-12 col-xs-12">

      <div class="col-md-1 col-sm-1 col-xs-1" align="right">
        <label>Imagen</label>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
      <input type="file" name="mi_imagen" class="file">
      <br>
    </div>
  </div>


      </div>
      <!-- /.box-body -->
      <div class="box-footer">
          <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-2 col-sm-2 col-xs-2">
				</div>
				    <div class="col-md-offset-1 col-md-12 col-sm-12 col-xs-12">
				      <button type="submit" class="btn btn-info btn-lg">Guardar</button>
				      <a href="<?php echo $this->config->base_url();?>usuario"><button type="button" class="btn btn-danger btn-lg">Cancelar</button></a>
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