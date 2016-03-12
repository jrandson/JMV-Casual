<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_content">
        <ul class="nav nav-pills" role="tablist">

                <?php if(Yii::app()->user->isAdmin()): ?>
                    <a href="<?php echo Yii::app()->baseUrl.'/index.php/usuario'; ?>">
                        <button type="button" class="btn btn-primary">Ver todos</button>
                    <a/>
                <?php endif;?>
                        
                <?php if(Yii::app()->user->isAdmin()): ?>
                    <a href="<?php echo Yii::app()->baseUrl.'/index.php/usuario/create'; ?>">
                        <button type="button" class="btn btn-primary">Novo Usuário</button>
                    </a>
                <?php endif;?>

                <?php if(isset($model)): ?>
                    <a href="<?php echo Yii::app()->baseUrl.'/index.php/usuario/update/'.$model->idUsuario ?>">
                        <button type="button" class="btn btn-primary">Atualizar</button>
                    </a>

                <?php endif;?>

                <?php if(isset($model)): ?>
                    <a href="<?php echo Yii::app()->baseUrl.'/index.php/usuario/updateSenha/'.$model->idUsuario ?>">
                        <button type="button" class="btn btn-primary">Mudar senha</button>
                    </a>
                    <a href=""></a>
                <?php endif;?>
        </ul>
    </div>
</div>

