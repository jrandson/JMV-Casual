<div class="top_nav">

    <?php
        $user = Usuario::model()->findByPk(Yii::app()->user->id);
    ?>
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="images/img.jpg" alt=""><?php echo $user->nome; ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        <li><?php echo CHtml::link('Minha Conta',array('usuario/view/'.$user->idUsuario)); ?></li>
                        <li><?php echo CHtml::link('Mudar senha',array('usuario/updateSenha/'.$user->idUsuario)); ?></li>
                        <li><?php echo CHtml::link('Log out',array('site/logout')); ?></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

</div>