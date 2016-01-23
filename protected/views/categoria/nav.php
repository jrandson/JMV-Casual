
<div class="page-title">
    <div class="title_left">
        <h3>Categorias</h3>
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


<nav class="navbar navbar-defaults">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">                        
                <li><?php echo CHtml::link('Nova categoria', array('categoria/create')); ?></li>
                <li><?php echo CHtml::link("Ver todas", array('categoria/index')); ?></li> 


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mais ações<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?php echo CHtml::link('Atualizar', array('categoria/update', 'id' => $model->idCategoria)); ?></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>                                        
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav> 