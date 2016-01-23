

<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">


                    <?php
                    /* @var $this ClienteController */
                    /* @var $model Cliente */

                    $this->breadcrumbs = array(
                        'Clientes' => array('index'),
                        $model->idCliente,
                    );

                    $this->menu = array(
                        array('label' => 'List Cliente', 'url' => array('index')),
                        array('label' => 'Create Cliente', 'url' => array('create')),
                        array('label' => 'Update Cliente', 'url' => array('update', 'id' => $model->idCliente)),
                        array('label' => 'Delete Cliente', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idCliente), 'confirm' => 'Are you sure you want to delete this item?')),
                        array('label' => 'Manage Cliente', 'url' => array('admin')),
                    );
                    ?>

                    <h1>View Cliente #<?php echo $model->idCliente; ?></h1>

                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'attributes' => array(
                            'idCliente',
                            'nome',
                            'endereco',
                            'rg',
                            'cpf',
                            'data_cadastro',
                            'id_usuario',
                        ),
                    ));
                    ?>

                    <h2>Débitos</h2>
                    <?php $this->viewData($debitos); ?>
                </div>
            </div>
        </div>
    </div>
    
    


</div>