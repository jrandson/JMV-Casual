<div class="right_col" role="main">
    <div class="">

        <?php
            $this->renderPartial('nav',array('model'=>$model));
        ?>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">
                    

                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'attributes' => array(
                            'nome',
                            'email',
                            'dataCadastro',
                        ),
                    ));

                    ?>
                    
                    
                </div>
            </div>
        </div>
    </div>


</div>