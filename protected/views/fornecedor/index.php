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

        <div class="right_col" role="main">
            <?php
                $this->renderPartial('search',array());
                $this->renderPartial('nav',array());
            ?>
            <div class="">

                <div class="page-title">


                    <div class="title_left">
                        <h3>Fornecedores</h3>
                    </div>

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

                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>#ID</th>
                                                        <th>Razão</th>
                                                        <th>Responsável</th>
                                                        <th>Telefone</th>
                                                        <th>Email</th>
                                                        <th>Endereço</th>
                                                        <th> </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php

                                                    foreach($forncedores as $fornecedor):?>
                                                        <tr>
                                                            <th scope="row"><?php echo $fornecedor['idFornecedor']; ?></th>
                                                            <td><?php echo $fornecedor['razao']; ?></td>
                                                            <td><?php echo $fornecedor['responsavel']; ?></td>
                                                            <td><?php echo $fornecedor['telefone']; ?></td>
                                                            <td><?php echo $fornecedor['email']; ?></td>
                                                            <td><?php echo $fornecedor['endereco']; ?></td>
                                                            <td><i class="fa fa-eye"></i><?php echo CHtml::link('Visualizar',array('view','id'=>$fornecedor['idFornecedor'])); ?></td>
                                                        </tr>
                                                    <?php endforeach;
                                                    if(empty($fornecedor)){
                                                        echo 'Nada encontrado';
                                                    }
                                                    ?>

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
