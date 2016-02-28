<div class="right_col" role="main">
    <div class="">
        
        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
            </div>

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