<div class="right_col" role="main">
    <div class="">

        <?php
            $this->renderPartial('nav',array('model'=>$model));
        ?>

        <div class="page-title">
            <div class="title_left">
                <h3><?php echo $model->nome; ?></h3>
            </div>


        
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">
                    
                    <?php
                        $this->viewData($model);
                    ?>
                    
                    
                </div>
            </div>
        </div>
    </div>


</div>