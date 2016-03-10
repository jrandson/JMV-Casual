
<?php

?>
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


                    <div class="x_content">

                        <?php
                        /* @var $this VendaController */
                        /* @var $model Venda */



                        $this->breadcrumbs = array(
                            'Vendas' => array('index'),
                            $model->idVenda,
                        );

                        $this->menu = array(
                            array('label' => 'List Venda', 'url' => array('index')),
                            array('label' => 'Create Venda', 'url' => array('create')),
                            array('label' => 'Update Venda', 'url' => array('update', 'id' => $model->idVenda)),
                            array('label' => 'Delete Venda', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idVenda), 'confirm' => 'Are you sure you want to delete this item?')),
                            array('label' => 'Manage Venda', 'url' => array('admin')),
                        );
                        ?>

                        <?php


                        $this->viewData($itensVenda);

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>




