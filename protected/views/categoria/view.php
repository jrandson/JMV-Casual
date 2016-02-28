


<div class="right_col" role="main">
    <div class="">

        <?php $this->renderPartial('nav',array('model'=>$model)); ?>
        <?php $this->renderPartial('search',array()); ?>
        <div class="page-title">
            <div class="title_left">
                <h3><?php echo $model->descricao; ?></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">


                    <h1>View Categoria #<?php echo $model->idCategoria; ?></h1>

                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'attributes' => array(
                            'idCategoria',
                            'descricao',
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>


</div>

