

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

        <?php $this->renderPartial('nav',array()); ?>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">

                    <form method="post" action="create" class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="Categoria[descricao]" class="form-control" required="required" placeholder="Descrição">                          
                            </div>
                        </div> 


                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <a href="index" class="btn btn-primary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>



