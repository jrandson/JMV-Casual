<!-- Search -->
<div class="title_right">
    <div class="col-md-6 col-sm-5 col-xs-5 form-group pull-right top_search">
        <div class="input-group">
            <form action="<?php echo Yii::app()->baseUrl.'/index.php/fornecedor/buscarFornecedor'; ?>" method="post">
                <input type="text" name="param" class="form-control" placeholder="Buscar pelo nome...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Buscar</button>
                            </span>
            </form>

        </div>
    </div>
</div>
<!-- Search -->