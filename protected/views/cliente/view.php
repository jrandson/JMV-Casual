

<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
            </div>



        </div>

        <div class="clearfix">

        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <?php $this->renderPartial('nav',array('model'=>$model));?>

                <div class="x_panel" >

                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'attributes' => array(
                            'nome',
                            'telefone',
                            'email',
                            'endereco',
                            'rg',
                            'cpf',
                            'data_cadastro',
                        ),
                    ));
                    ?>

                    <?php
                        if(empty($debitos)){
                            echo "<p><h4>Nenhum débito pendente </h4></p>";
                        }
                        else{
                            echo "<h3>Débitos </h3>";
                        }
                    ?>


                    <?php foreach($debitos as $debito): ?>

                        <?php
                            $dataVenda = date_create($debito['dataVenda']);
                            $total = 0;
                            $itensVenda = $debito['itensVenda'];
                        ?>

                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="x_panel">

                                    <div class="x_title">
                                        <h2><?php echo date_format($dataVenda,'d/m/Y H:i:s');  ?><small><?php echo "cod #".$debito['idVenda']; ?></small> <?php echo "Valor da venda: R$ ".number_format($debito['totalVenda'],2,',','.'); ?> - Total Pago: <?php echo "R$ ".number_format($debito['totalPago'],2,',','.'); ?></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
									
									<div class="x_title">
                                        <h3>Observacao:</h3>
										<h4/><?php echo $debito['observacao']; ?></h4>
										<br/>______</br>
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
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                        <br/>
                                        <form action="<?php echo Yii::app()->baseUrl.'/index.php/venda/pagamento';?>" method="post" class="form-horizontal form-label-left">
                                            <input type="hidden" name="pagamento[idVenda]" value="<?php echo $debito['idVenda'];?>">
                                            <input type="hidden" name="pagamento[idCliente]" value="<?php echo $model->idCliente;?>">

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Endereço">Valor do pagamento<span class="required"></span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="pagamento[valor]" placeholder="Valor" class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <button id="send" type="submit" class="btn btn-success">Resgistrar pagamento</button>
                                                </div>
                                            </div>

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