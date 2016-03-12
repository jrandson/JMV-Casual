


			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">


					<div class="clearfix"></div>

					<div class="row">


					</div>

					<div class="clearfix"></div>

					<div class="row">

						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel" style="">

								<!-- Inicio do form de alteração-->
								<?php $form = $this->beginWidget('CActiveForm', array(
									'id' => 'cliente-form',
									'enableAjaxValidation' => false,
									// we need the next one for transmission of files in the form.
									'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>"form-horizontal form-label-left"),
								)); ?>

									<p>
										Os campos marcados com * são obrigatórios
									</p>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input id="name"  class="form-control col-md-7 col-xs-12" name="Cliente[nome]" value="<?php echo $model->nome; ?>" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" type="text">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail <span class="required"></span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="email" id="email" name="Cliente[email]" name="Cliente[email]" value="<?php echo $model->email; ?>"  class="form-control col-md-7 col-xs-12">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">RG <span class="required"></span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="tel" id="email" name="Cliente[rg]" value="<?php echo $model->rg; ?>" class="form-control col-md-7 col-xs-12">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">CPF <span class="required"></span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="tel" id="email" name="Cliente[cpf]" value="<?php echo $model->cpf; ?>"  class="form-control col-md-7 col-xs-12">
										</div>
									</div>

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Telefone <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="tel" id="email" name="Cliente[telefone]" value="<?php echo $model->telefone; ?>"  class="form-control col-md-7 col-xs-12" required="required">
										</div>
									</div>

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Endereço">Endereço<span class="required"></span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="text" id="email" name="Cliente[endereco]" value="<?php echo $model->endereco; ?>"  class="form-control col-md-7 col-xs-12">
										</div>
									</div>


									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<button type="submit" class="btn btn-primary">Cancelar</button>
											<button id="send" type="submit" class="btn btn-success">Cadastrar</button>
										</div>
									</div>
								<?php $this->endWidget(); ?>

							</div>
						</div>

					</div>
				</div>


			</div>
			<!-- /page content -->
