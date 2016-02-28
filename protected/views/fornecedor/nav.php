<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="x_content">
            <ul class="nav nav-pills" role="tablist">
                <?php if(isset($model)): ?>
                    <li role="presentation">
                        <a href="<?php echo Yii::app()->baseUrl.'/index.php/fornecedor'; ?>">Todos os Forncedores</a>
                    </li>
                <?php endif;?>
                <li role="presentation">
                    <a href="<?php echo Yii::app()->baseUrl.'/index.php/fornecedor/create'; ?>">Novo Fornecedor</a>
                </li>
                <?php if(isset($model)): ?>
                    <li role="presentation">
                        <a href="<?php echo 'update/'.$model->idFornecedor ?>">Atualizar</a>
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

            </ul>

        </div>
    </div>
</div>

