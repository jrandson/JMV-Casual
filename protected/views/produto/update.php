
<div class="right_col" role="main">
    <div class="x_panel">

        <div class="x_title">
            <h2>Cadastro de produto</h2>


            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <br />
            <form method="post" action="<?php echo Yii::app()->baseUrl . '/index.php/produto/update/' . $model->idProduto ?>" class="form-horizontal form-label-left">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Código</label>
                    <div class="col-md-2 col-sm-9 col-xs-12">
                        <input type="text" name="Produto[codigo]" class="form-control" value="<?php echo $model->codigo; ?>" required="" placeholder="Código">                          
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="Produto[descricao]" class="form-control" required="required" placeholder="Descrição" value="<?php echo $model->descricao; ?>">                          
                    </div>
                </div>                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Preço de compra</label>
                    <div class="col-md-3 col-sm-9 col-xs-12">
                        <input type="text" name="Produto[precoCompra]" class="form-control" placeholder="Preço de compra" value="<?php echo $model->precoCompra; ?>">                          
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Preço de venda</label>
                    <div class="col-md-3 col-sm-9 col-xs-12">
                        <input type="text" name="Produto[precoVenda]" class="form-control" required="required" placeholder="Preço de venda" value="<?php echo $model->precoVenda; ?>">                          
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Estoque</label>
                    <div class="col-md-3 col-sm-9 col-xs-12">
                        <input type="text" name="Produto[estoque]" class="form-control" required="required" placeholder="Estoque" value="<?php echo $model->estoque; ?>">                          
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Localização</label>
                    <div class="col-md-3 col-sm-9 col-xs-12">
                        <input type="text" name="Produto[localizacao]" class="form-control" placeholder="Localização" value="<?php echo $model->localizacao; ?>">                          
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-4">Categoria*</label>
                    <div class="col-md-3 col-sm-3 col-xs-3">                        
                        <select class="form-control" name="Produto[id_categoria]">
                            <?php foreach ($categorias as $categoria) { ?>
                                                     
                            <option <?php echo ($categoria['idCategoria'] == $model->id_categoria)?'selected':'';?> value="<?php echo $categoria['idCategoria'];?>"><?php echo $categoria['descricao']; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>

                <div class="ln_solid"></div>

                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancelar</button>
                        <button type="submit" class="btn btn-success">Atualizar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

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

