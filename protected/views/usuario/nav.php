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
                <?php endif;?>
                <li role="presentation" class="dropdown">
                    <a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                        Dropdown
                        <span class="caret"></span>
                    </a>
                    <ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Action</a>
                        </li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Another action</a>
                        </li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Something else here</a>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Separated link</a>
                        </li>
                    </ul>
                </li>

                <?php $this->renderPartial('search',array()); ?>

            </ul>

        </div>
    </div>
</div>

