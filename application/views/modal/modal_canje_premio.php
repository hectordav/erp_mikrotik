<div class="modal fade "id="canje">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		               <strong><h3><span class ="label label-warning">canje de premio</span></h3></strong>
		            </div>
		            <p></p> <!-- termina el header -->
					<div class="container">
						<div class="row">
						<form action="<?php echo $this->config->base_url();?>premio/canje_premio" method="POST" accept-charset="utf-8">
							<div class="col-sm-6">
								<div class="input-group">
								<?php if ($premio): ?>
								<?php foreach ($premio->result() as $key): ?>
									<input type="hidden" id="txt_id_premio" name="txt_id_premio" value="<?=$key->id?>">
									<input type="hidden" id="txt_cantidad_premio" name="txt_cantidad_premio" value="<?=$key->cantidad?>">
										<input type="hidden" id="txt_puntaje_premio" name="txt_puntaje_premio" value="<?=$key->puntaje?>">
									<input type="hidden" name="txt_id_usuario" id="txt_id_usuario" value="<?=$id_usuario?>">
									<input type="hidden" name="txt_puntaje_usuario" id="txt_puntaje_usuario" value="<?=$puntaje?>">
									<?php endforeach ?>
									<?php else: ?>
								<?php endif ?>
										<span class="input-group-addon" id="basic-addon1">Cantidad</span>
					  				<input type="number" class="form-control" name="txt_cantidad" id="txt_cantidad"placeholder="Ingrese Cantidad" required="required">
								</div>
								<p></p>
								<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Direccion</span>
					  				<input type="text" class="form-control" name="txt_direccion" id="txt_direccion"placeholder="Especifique la Direccion de Envio (domicilio, Ciudad, etc) " required="required">
								</div>
								<br>
								<div align="right">
								<button type="submit" class="btn btn-success">Canjear Premio</button>

								</div>
							<p></p>
								</form>
							</div>
						</div>
					</div>
		            <div class="modal-footer">
		            </div>
		          </div><!-- termina el content -->
		        </div> <!-- termina el modal dialog -->
		    </div> <!-- termina la ventana modal -->