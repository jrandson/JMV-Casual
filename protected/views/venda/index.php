


<div class="right_col" role="main">


        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <form id="queryProduct" action="queryProduct" method="post" >
                        <div class="input-group">

                            <input id="queryParam" name="queryParam" type="text" class="form-control" placeholder="Search for..." onkeydown="queryProduct();">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>

                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="clearfix"> </div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">

                    <div class="x_content">
                        <form id="searchProduct" method="post" action="addItem" >
                            <div class="row">
                                <div class="col-md-2 col-sm-12 col-xs-12 form-group">

                                    <label class="control-label col-md-2 col-sm-12 col-xs-12">Código</label>
                                    <input name="itemVenda[idProduto]" id="idProduto" type="text" placeholder="" class="form-control" onblur="getProduto();" >

                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">

                                    <span id="queryResult"> </span>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label class="control-label col-md-1 col-sm-12 col-xs-12">Descrição</label>
                                    <input id="descricao" name="itemVenda[descricao]" type="text" class="form-control" readonly="true"/>
                                </div>

                                <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                    <label class="control-label col-md-6 col-sm-12 col-xs-12">R$ Preço  </label>
                                    <input id="preco" type="text" name="itemVenda[preco]"  placeholder="" class="form-control" readonly="true">
                                </div>

                                <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                    <label class="control-label col-md-1 col-sm-12 col-xs-12">Quantidade</label>
                                    <input id="quantidade" name="itemVenda[quantidade]" type="text" placeholder="" class="form-control" onblur="getSubTotal();">
                                </div>                                

                                <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                    <label class="control-label col-md-1 col-sm-12 col-xs-12">Subtotal</label>
                                    <input id="subTotal" name="itemVenda[subtotal]" type="text" placeholder="" class="form-control" readonly="true">
                                </div>
                                <div class="col-md-12 col-sm-4 col-xs-4 form-group">

                                    <button type="submit" class="btn btn-success" >Adicionar</button>
                                </div>
                                
                                <div class="title_right">
                                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                        <div class="input-group">
                                            <?php
                                            
                                            $venda = (isset(Yii::app()->session['venda'])) ? Yii::app()->session['venda'] : array();
                                            $total = 0;
                                            
                                            foreach ($venda['itens'] as $itemVenda) {
                                                $total += $itemVenda['quantidade'] * $itemVenda['preco'];
                                            }
                                            ?>
                                            <h1><small>Total:</small> R$ <?php echo number_format($total, 2, ',', '.'); ?></h1>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>

                    <div class="row">
                        <div class="col-xs-12 table">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Quantidade</th>
                                        <th>Produto</th>
                                        <th>Codigo</th>
                                        <th style="width: 59%">Descrição</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>                             
                                    <?php
                                    
                                    foreach ($venda['itens'] as $itemVenda) {
                                        $subtotal = $itemVenda['quantidade'] * $itemVenda['preco'];
                                        ?>
                                        <tr>
                                            <td><?php echo $itemVenda['quantidade']; ?></td>
                                            <td><?php //echo $itemVenda['produto'];     ?></td>
                                            <td><?php //echo $itemVenda['codigo'];     ?></td>
                                            <td><?php echo $itemVenda['descricao']; ?></td>
                                            <td>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                                        </tr>     
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>

                </div>
            </div>
        
        </div>
        
        <div class="row">
            
            <form method="post" action="finalizaVenda">
                <div class="form-group">

                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label">Forma de pagamento</label>
                        <select class="form-control" name="dataPayment[formaPagamento]">
                            <option value="0">A vista</option>
                            <option value="1">Adicionar à conta</option>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <div class="row no-print">
                        <div class="col-xs-12">

                            <input type="submit" class="btn btn-success pull-right" value="Finalizar compra" />
                           
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>

<script >

    function getProduto() {
        
        var urlAction = "searchById";
        var id = $("#idProduto").val();

        /**
         * Envia o formulário por meio da variável questao_data
         */
        var dados = jQuery("#searchProduct").serialize();

        $.ajax({
            type: 'POST', // tipo de requisição: post
            url: urlAction, // action que será chamado no controlador
            data: dados // parâmetro passado, dados do form
        }).done(function (result) {
            
                
            var returnedData = JSON.parse(result);
            
            $("#descricao").val(returnedData.descricao);
            $("#preco").val(Math.round(returnedData.preco, 2));

        });
    }

    function getSubTotal() {
        var qtd = $("#quantidade").val();
        var preco = $("#preco").val();

        var subTotal = qtd * preco;

        $("#subTotal").val(subTotal);
    }

    function queryProduct() {
        
        var dataForm = jQuery("#queryProduct").serialize();
        var urlAction = "productQuery";

        $.ajax({
            type: 'POST', // tipo de requisição: post
            url: urlAction, // action que será chamado no controlador
            data: dataForm // parâmetro passado, dados do form
        }).done(function (result) {            
            
            $("#queryResult").empty().html(result);

        });

    }

    function addItem() {

        var urlAction = "addItem";


        /**
         * Envia o formulário por meio da variável questao_data
         */
        var dados = jQuery("#item").serialize();

        $.ajax({
            type: 'POST', // tipo de requisição: post
            url: urlAction, // action que será chamado no controlador
            data: dados // parâmetro passado, dados do form
        }).done(function (result) {
            var returnedData = JSON.parse(result);

        });
    }

</script>


