<?php
/**
 * Created by PhpStorm.
 * User: randson
 * Date: 08/03/16
 * Time: 00:38
 */
?>



<!-- page content -->
<div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Plain Page</h3>
                </div>


            </div>
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel" style="">
                        <div class="x_title">
                            <h2>Plain Page</h2>

                            <div class="clearfix"></div>

                            <div class="x_panel" style="">

                                <div class="x_content">
                                    <form action="historico" method="post">
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="col-md-5 xdisplay_inputx form-group has-feedback">
                                                    <input type="text" name="historico[data1]" class="form-control has-feedback-left" id="single_cal2" placeholder="Data inicial" aria-describedby="inputSuccess2Status">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess1Status" class="sr-only">(success)</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="col-md-5 xdisplay_inputx form-group has-feedback">
                                                    <input type="text" name="historico[data2]" class="form-control has-feedback-left" id="single_cal1" placeholder="Data final" aria-describedby="inputSuccess2Status">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-3col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Buscar</button>
                                            </div>
                                        </div>

                                    </form>


                                    <div class="row">

                                        <?php
                                            $this->viewData($historico);
                                            return;
                                        ?>

                                        <?php foreach($historico as $venda): ?>

                                            <?php
                                            $dataVenda = date_create($venda['dataVenda']);
                                            $total = 0;
                                            $itensVenda = $venda['itensVenda'];
                                            ?>

                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="x_panel">

                                                    <div class="x_title">
                                                        <h2><?php echo date_format($dataVenda,'d/m/Y H:i:s');  ?><small><?php echo "cod #".$venda['idVenda']; ?></small> <?php echo "Valor da venda: R$ ".$venda['totalVenda']; ?> - Total Pago: <?php echo "R$ ".$venda['totalPago']; ?></h2>
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
                </div>
            </div>
    </div>



</div>
<!-- /page content -->


<!-- datepicker -->
<!-- datepicker -->

<!-- /datepicker -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#single_cal1').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_1"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal2').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_2"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal3').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_3"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal4').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_4"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>

