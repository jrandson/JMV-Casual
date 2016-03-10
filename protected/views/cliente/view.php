

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


                    <?php foreach($debitos as $debito): ?>

                        <?php
                            $dataVenda = date_create($debito['dataVenda']);
                            $total = 0;
                            $itensVenda = $debito['itensVenda'];
                        ?>

                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="x_panel">

                                    <div class="x_title">
                                        <h2><?php echo date_format($dataVenda,'d/m/Y H:i:s');  ?><small><?php echo "cod #".$debito['idVenda']; ?></small> <?php echo "Valor da venda: R$ ".$debito['totalVenda']; ?> - Total Pago: <?php echo "R$ ".$debito['totalPago']; ?></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="x_content">

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#Código</th>
                                                        <th>Item</th>
                                                        <th>Preço</th>
                                                        <th>Quantidade</th>
                                                        <th>SubTotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach($itensVenda as $itemVenda):
                                                $sutototal = $itemVenda['quantidade']*$itemVenda['preco'];
                                                $total += $sutototal;
                                                ?>

                                                <tr>
                                                    <th scope="row"><?php echo $itemVenda['codigo']; ?></th>
                                                    <td><?php echo $itemVenda['descricao']; ?></td>
                                                    <td><?php echo $itemVenda['preco']; ?></td>
                                                    <td><?php echo $itemVenda['quantidade']; ?></td>
                                                    <td><?php echo "R$ ".number_format($sutototal,2,",",","); ?></td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        <?php endforeach; ?>

                                        <form action="<?php echo Yii::app()->baseUrl.'/index.php/venda/pagamento';?>" method="post">
                                            <input type="hidden" name="pagamento[idVenda]" value="<?php echo $debito['idVenda'];?>">
                                            <input type="hidden" name="pagamento[idCliente]" value="<?php echo $model->idCliente;?>">
                                            <input type="text" name="pagamento[valor]">
                                            <input type="submit" value="Novo Pagamento">
                                        </form>
                                    </div>
                                </div>
                            </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    
    


</div>