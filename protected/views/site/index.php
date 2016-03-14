<div class="right_col" role="main">

    <!-- top tiles -->
    <div class="animated flipInY col-md-12 col-sm-4 col-xs-4 ">
        <div class="left"></div>
        <div class="right">
            <div class="count"><h3><?php echo date('d,M Y');?></h3></div>
            <h2>Movimentação do dia</h2>
        </div>
    </div>

    <div class="row tile_count">

        <div class="animated flipInY col-md-3 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-money"></i> Vendas totais</span>
                <div class="count"><small>R$ </small> <?php echo  number_format($totalVendaHoje,2,',','.'); ?></div>

            </div>
        </div>

        <div class="animated flipInY col-md-3 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-money"></i> Vendas à prazo</span>
                <div class="count green"><small>R$ </small><?php echo number_format($totalVendasPrazoHoje,2,',','.') ?></div>

            </div>
        </div>

        <div class="animated flipInY col-md-3 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-money"></i> Vendas à vista</span>
                <div class="count green"><small>R$ </small><?php echo number_format($totalVendasVista,2,',','.'); ?></div>

            </div>
        </div>

        <div class="animated flipInY col-md-3 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-money"></i> Pagamentos de conta</span>
                <div class="count green"><small>R$ </small><?php echo number_format($totalPagamentos,2,',','.'); ?></div>

            </div>
        </div>

    </div>

    <div class="animated flipInY col-md-12 col-sm-4 col-xs-4 ">
        <div class="left"></div>
        <div class="right">
            <h2>Dados do seu negócio</h2>
        </div>
    </div>

    <div class="row tile_count">

        <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-cubes"></i> Total Produtos</span>
                <div class="count"><?php echo $totalProdutos; ?></div>

            </div>
        </div>

        <div class="animated flipInY col-md-3 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-users"></i> Total de Clientes</span>
                <div class="count"><?php echo $totalCliente; ?></div>
            </div>
        </div>

        <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-truck"></i> Total de Fornecedores</span>
                <div class="count"><?php echo $totalFornecedores; ?></div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="x_content">
        <div class="dashboard-widget-content">
            <div class="col-md-12 hidden-small">
                <h2 class="line_30">Itens mais vendidos</h2>
                <table class="table table-bordered">
                    <tbody>
                    <th>Item</th>
                    <th>Quantidade</th>
                    <th>Total </th>
                    <?php foreach($itensMaisVendidos as $item): ?>
                    <tr>
                        <td><?php echo substr($item['descricao'],0,150); ?></td>
                        <td class="fs15 fw700 text-right"><?php echo $item['soma']; ?></td>
                        <td class="fs15 fw700 text-right"><?php echo number_format($item['total'],2,',','.'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


</div>

<script src="js/nicescroll/jquery.nicescroll.min.js"></script>

<!-- chart js -->
<script src="js/chartjs/chart.min.js"></script>
<!-- bootstrap progress js -->

<!-- icheck -->
<script src="js/icheck/icheck.min.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="js/moment.min2.js"></script>
<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
<!-- sparkline -->


<script src="js/custom.js"></script>

<!-- flot js -->
<!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="js/flot/jquery.flot.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
<script type="text/javascript" src="js/flot/date.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
<script type="text/javascript" src="js/flot/curvedLines.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>



