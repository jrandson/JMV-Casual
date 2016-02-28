<div class="main_container">

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        Cadastro de Fornecedor
                    </h3>
                </div>

                <?php
                    $this->renderPartial('search',array());
                ?>

            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="x_panel">


                        <div class="x_content">

                            <?php $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'fornecedor-form',
                                'enableAjaxValidation' => false,
                                // we need the next one for transmission of files in the form.
                                'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>"form-horizontal form-label-left"),
                            )); ?>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Razão <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name"  class="form-control col-md-7 col-xs-12" name="Fornecedor[razao]" data-validate-length-range="20" data-validate-words="2" name="name" placeholder="" required="required" type="text">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Responsável<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="email" name="Fornecedor[responsavel]" required="required"   class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" name="Fornecedor[email]"   class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telefone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="tel" id="telefone" name="Fornecedor[telefone]" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Endereço<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="email" name="Fornecedor[endereco]"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-9">Observacao</label>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <textarea name="Fornecedor[observacao]" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;"></textarea>
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


    </div>
    <!-- /page content -->
</div>

<script src="<?php echo ``//Yii::app()->request->baseUrl; ?>/gentelella/js/validator/validator.js"></script>

<!-- textarea resize -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/js/textarea/autosize.min.js"></script>
<script>
    autosize($('.resizable_textarea'));
</script>
        
<script>
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

</script>