<div class="main_container">

	<!-- page content -->
	<div class="right_col" role="main">

		<?php $this->renderPartial('nav',array('model'=>$model)); ?>
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>
						Atualização de usuário
					</h3>
				</div>

			</div>
			<div class="clearfix"></div>

			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">

					<div class="x_panel">


						<div class="x_content">


							<?php $form = $this->beginWidget('CActiveForm', array(
								'id' => 'usuario-form',
								'enableAjaxValidation' => false,
								// we need the next one for transmission of files in the form.
								'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>"form-horizontal form-label-left"),
							)); ?>

								<div class="item form-group">
									<label for="password" class="control-label col-md-3">Password</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="password" type="password" name="Usuario[senha]" data-validate-length="6" class="form-control col-md-7 col-xs-12" required="required">
									</div>
								</div>
								<div class="item form-group">
									<label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="password2" type="password" name="Usuario[senha2]" data-validate-linked="Usuario[senha]" onkeyup="validaSenha();" class="form-control col-md-7 col-xs-12" required="required">
										<br/><div style="color:red" id="validation_out"></div>
									</div>

								</div>

								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-6 col-md-offset-3">
										<button type="submit" class="btn btn-primary">Cancelar</button>
										<button id="send" type="submit" class="btn btn-success">Atualizar</button>
									</div>
								</div>
							<?php $this->endWidget(); ?>

						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
	<!-- /page content -->
</div>
<script src="js/bootstrap.min.js"></script>

<!-- chart js -->
<script src="js/chartjs/chart.min.js"></script>
<!-- bootstrap progress js -->
<script src="js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="js/icheck/icheck.min.js"></script>

<script src="js/custom.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/js/validator/validator.js"></script>

<script>

	function validaSenha(){
		var senha, senha2;

		senha2 = $("#password2").val();
		senha = $("#password").val();
		if(senha != senha2){
			$("#validation_out").html("As senha são diferentes");
		}
		else{
			$("#validation_out").html("");
		}


	}

	/*
	 // initialize the validator function
	 validator.message['date'] = 'not a real date';

	 // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
	 $('form')
	 .on('blur', 'input[required], input.optional, select.required', validator.checkField)
	 .on('change', 'select.required', validator.checkField)
	 .on('keypress', 'input[required][pattern]', validator.keypress);

	 $('.multi.required')
	 .on('keyup blur', 'input', function () {
	 validator.checkField.apply($(this).siblings().last()[0]);
	 });

	 // bind the validation to the form submit event
	 //$('#send').click('submit');//.prop('disabled', true);

	 $('form').submit(function (e) {
	 e.preventDefault();
	 var submit = true;
	 // evaluate the form using generic validaing
	 if (!validator.checkAll($(this))) {
	 submit = false;
	 }

	 if (submit)
	 this.submit();
	 return false;
	 });

	 /* FOR DEMO ONLY */
	$('#vfields').change(function () {
		$('form').toggleClass('mode2');
	}).prop('checked', false);

	$('#alerts').change(function () {
		validator.defaults.alerts = (this.checked) ? false : true;
		if (this.checked)
			$('form .alert').remove();
	}).prop('checked', false);
</script>