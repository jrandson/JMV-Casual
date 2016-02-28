<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */

/*
  $this->breadcrumbs=array(
  'Usuarios',
  );

  $this->menu=array(
  array('label'=>'Create Usuario', 'url'=>array('create')),
  array('label'=>'Manage Usuario', 'url'=>array('admin')),
  );
  ?>

  <h1>Usuarios</h1>

  <?php $this->widget('zii.widgets.CListView', array(
  'dataProvider'=>$dataProvider,
  'itemView'=>'_view',
  )); */
?>

<div class="container body">


    <div class="main_container">

       

        <!-- top navigation -->
        
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Contacts Design</h3>
                    </div>
                    <!--Search user -->
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <form action="buscarUsuario" method="post">
                                    <input type="text" name="param" class="form-control" placeholder="Buscar pelo nome...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Buscar</button>
                                    </span>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- Search user -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_content">

                                <div class="row">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Hover rows
                                                            <small>Try hovering over the rows</small>
                                                        </h2>
                                                        <ul class="nav navbar-right panel_toolbox">
                                                            <li><a class="collapse-link"><i
                                                                        class="fa fa-chevron-up"></i></a>
                                                            </li>

                                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                            </li>
                                                        </ul>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>#ID</th>
                                                                <th>Nome</th>
                                                                <th>Telefone</th>
                                                                <th>Email</th>
                                                                <th>Admin</th>
                                                                <th> </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            foreach($users as $user):?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $user['idUsuario']; ?></th>
                                                                    <td><?php echo $user['nome']; ?></td>
                                                                    <td><?php echo $user['telefone']; ?></td>
                                                                    <td><?php echo $user['email']; ?></td>
                                                                    <td><?php echo $user['isAdmin']?"sim":"Não"; ?></td>
                                                                    <td><i class="fa fa-eye"></i><?php echo CHtml::link('Visualizar',array('view','id'=>$user['idUsuario'])); ?></td>
                                                                </tr>
                                                            <?php endforeach;?>

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- /page content -->
    </div>

</div>
