<form action="<?php echo Yii::app()->baseUrl.'/index.php/fornecedor/buscarFornecedor'; ?>" method="post" class="form-horizontal form-label-left">

    <div class="form-group">
        <div class="col-sm-16">

            <div class="col-md-6 col-sm-5 col-xs-12 form-group pull-right top_search">

                <div class="input-group">
                    <input type="text" name="param" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <input type="submit" name="cliente['submit]" value="Buscar" class="btn btn-grey" type="button">Buscar</button>
                                </span>
                </div>
            </div>
        </div>
    </div>
    <div class="divider-dashed"></div>
</form>