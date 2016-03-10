<div class="right_col" role="main">



    <div class="x_content">





        

    </div>
    <a href="create"; ?>
        <button type="button" class="btn btn-primary">Novo</button>
    </a>
    <a href=<?php echo "update/$model->idProduto"; ?>>
        <button type="button" class="btn btn-primary">Atualizar</button>
    </a>


    <div class="x_panel">

        <div class="x_content">

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <h2> <?php echo "Código: ".$model->codigo; ?> </h2>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <h1> <?php echo $model->descricao; ?> </h1>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                    <h2>Preço de venda: R$ <?php echo number_format($model->precoVenda, 2,',','.'); ?></h2>
                </div>
                <?php if(Yii::app()->user->isAdmin()) :?>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <h3>Preço de compra: R$ <?php echo number_format($model->precoCompra, 2,',','.'); ?></h3>
                    </div>
                <?php endif; ?>

                <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <h2>Estoque: <?php echo $model->estoque; ?></h2>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <h2><b>Localização: <?php echo $model->localizacao; ?></b></h2>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <h2><b>Categoria: <?php echo $categoria['descricao']; ?></b></h2>
                </div>


            </div>

        </div>
    </div>
</div>



</div>


