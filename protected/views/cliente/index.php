<div class="right_col" role="main">
    <div class="">

        <div class="page-title">

            <form action="buscarCliente" method="post" class="form-horizontal form-label-left">

                <div class="form-group">
                    <div class="col-sm-16">

                        <div class="col-md-6 col-sm-5 col-xs-12 form-group pull-right top_search">

                            <div class="input-group">
                                <input type="text" name="cliente[param]" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <input type="submit" name="cliente['submit]" value="Buscar" class="btn btn-grey" type="button">Buscar</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divider-dashed"></div>
            </form>


        </div>
        <?php $this->renderPartial('nav');?>

        <div class="title_left">

        </div>


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3><?php echo $total.' clientes cadastrados ';?></h3>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Endereço</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($clientes as $cliente) { ?>
                                            <tr scope="row">
                                                <td><?php echo $cliente['idCliente']; ?></td>
                                                <td><?php echo $cliente['nome']; ?></td>
                                                <td><?php echo $cliente['telefone']; ?></td>
                                                <td><?php echo $cliente['email']; ?></td>
                                                <td><?php echo $cliente['endereco']; ?></td>
                                                <td><a href="<?php echo Yii::app()->baseUrl.'/index.php/cliente/'.$cliente['idCliente']; ?>">Visializar</a></td>
                                            </tr>
                                            <?php } ?>
                                    
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