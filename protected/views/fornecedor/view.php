<div class="right_col" role="main">
    <div class="">
        
        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
            </div>

            <?php
                $this->renderPartial('search',array());
                $this->renderPartial('nav',array('model'=>$model));
            ?>
        
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
