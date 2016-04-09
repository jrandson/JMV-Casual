<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_content">
        <ul class="nav nav-pills" role="tablist">

            <a href="<?php echo Yii::app()->baseUrl.'/index.php/fornecedor'; ?>">
                <button type="button" class="btn btn-primary">Ver todos</button>


                <a href="<?php echo Yii::app()->baseUrl.'/index.php/fornecedor/create'; ?>">
                    <button type="button" class="btn btn-primary">Novo</button>
                </a>

                <?php if(isset($model)): ?>
                    <a href="<?php echo 'update/'.$model->idFornecedor ?>">
                        <button type="button" class="btn btn-primary">Atualizar</button>
                    </a>
                <?php endif;?>
        </ul>
    </div>
</div>



