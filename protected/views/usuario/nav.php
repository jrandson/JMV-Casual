<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="x_content">
            <ul class="nav nav-pills" role="tablist">
                <?php if(isset($model)): ?>
                <li role="presentation">
                    <a href="<?php echo Yii::app()->baseUrl.'/index.php/usuario'; ?>">Todos os usuários</a>
                </li>
                <?php endif;?>
                <li role="presentation">
                    <a href="<?php echo Yii::app()->baseUrl.'/index.php/usuario/create'; ?>">Novo Usuário</a>
                </li>
                <?php if(isset($model)): ?>
                <li role="presentation">
                    <a href="<?php echo 'update/'.$model->idUsuario ?>">Atualizar</a>
                </li>
                <li role="presentation">
                    <a href="<?php echo 'updateSenha/'.$model->idUsuario ?>">Mudar senha</a>
                </li>
                <?php endif;?>


                <!-- Search -->
                <div class="title_right">
                    <div class="col-md-4 col-sm-6 col-xs-6 form-group pull-right top_search">
                        <div class="input-group">
                            <form action="buscarUsuario" method="post">
                                <input type="text" name="param" class="form-control" placeholder="Buscar pelo nome...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Buscar</button>
                            </span>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Search -->

                <?php //$this->renderPartial('search',array()); ?>

            </ul>

        </div>
    </div>
</div>

