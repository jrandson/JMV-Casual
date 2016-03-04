

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

        <div class="clearfix">

        </div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" >


                    <h1>View Cliente #<?php echo $model->idCliente; ?></h1>

                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'attributes' => array(
                            'nome',
                            'endereco',
                            'rg',
                            'cpf',
                            'data_cadastro',
                        ),
                    ));
                    ?>



                    <h2>Débitos</h2>
                    <?php //$this->viewData($debitos); ?>

                    <?php foreach($debitos as $debito): ?>

                        <?php
                            $dataVenda = date_create($debito['dataVenda']);
                            $total = 0;
                            foreach($debito['itensVenda'] as $itensVenda): ?>

                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><?php echo date_format($dataVenda,'d/m/Y H:i:s');  ?><small><?php echo "cod #".$debito['idVenda']; ?></small> <?php echo "Valor da venda: R$ ".$debito['totalVenda']; ?></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="x_content">

                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Preço</th>
                                                <th>Quantidade</th>
                                                <th>SubTotal</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $sutototal = $itensVenda['quantidade']*$itensVenda['preco'];
                                            $total += $sutototal;
                                            ?>

                                            <tr>
                                                <th scope="row">1</th>
                                                <td><?php echo $itensVenda['descricao']; ?></td>
                                                <td><?php echo $itensVenda['preco']; ?></td>
                                                <td><?php echo $itensVenda['quantidade']; ?></td>
                                                <td><?php echo "R$ ".number_format($sutototal,2,",",","); ?></td>
                                            </tr>

                                            </tbody>
                                        </table>

                                        Total Pago: R$ 0,00

                                        <form action="" method="">
                                            <input type="text"><input type="submit" value="Novo Pagamento">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    
    


</div>