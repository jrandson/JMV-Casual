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
                        <h3>Usuários cadastrados no sistema</h3>
                    </div>
                    <?php
                        $this->renderPartial('nav',array());
                    ?>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_content">

                                <div class="row">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Usuário cadastrados
                                                            <small>Total: <?php echo count($users); ?></small>
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
