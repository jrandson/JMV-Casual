<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-shopping-cart"></i>Vendas<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl . '/index.php/venda/index' ?>">Vendas</a>
                    </li>                    
                </ul>
            </li>
            <li><a><i class="fa fa-group"></i>Usuários<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl . '/index.php/usuario/index' ?>">Consultar</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl . '/index.php/usuario/create' ?>">Novo Usuário</a>
                    </li>                    
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i>Produtos<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl . '/index.php/produto/index' ?>">Consultar</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl . '/index.php/produto/create' ?>">Novo produto</a>
                    </li>                    
                </ul>
            </li>
            <li><a><i class="fa fa-truck"></i> Fornecedores <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl . '/index.php/fornecedor/index' ?>">Consultar</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl . '/index.php/fornecedor/create' ?>">Novo Fornecedor</a>
                    </li>                    
                </ul>
            </li>
            <li><a><i class="fa fa-tag"></i> Categorias <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl . '/index.php/categoria/index' ?>">Consultar</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl . '/index.php/categoria/create' ?>">Nova Categoria</a>
                    </li>                    
                </ul>
            </li>
            <li><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl . '/index.php/cliente/index' ?>">Consultar</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl . '/index.php/cliente/create' ?>">Novo Cliente</a>
                    </li>                    
                </ul>
            </li>


        </ul>
    </div>   

</div>