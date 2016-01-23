<div class="right_col" role="main">



    <div class="x_content">
        <h1> <?php echo $model->descricao; ?> </h1>
        <h2>Preço de venda: R$ <?php echo round($model->precoVenda, 2); ?></h2>
        <h3>Preço de compra: R$ <?php echo round($model->precoCompra, 2); ?></h3>
        <h2>Estoque: <?php echo $model->estoque; ?></h2>
        <h2><b>Localização: <?php echo $model->localizacao; ?></b></h2>
        

    </div>
    <a href=<?php echo "update/$model->idProduto"; ?>>Atualizar</a>
</div>



</div>


