
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
            </div>
        </div>
        <?php

        ?>


        <div class="clearfix"></div>


        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">

                    <!-- Informações da venda!-->
                    <div class="x_content">
                        <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#Cod</th>
                                        <th>Item</th>
                                        <th>Qtd</th>
                                        <th>Preço</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $total = 0;
                                    $itensVenda = $dataVenda['itensVenda'];

                                    foreach ( $itensVenda as $item){
                                        $total += $item['subtotal'];
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $item['idProduto'];?> </th>
                                            <td> <?php echo substr($item['descricao'],0,100).' ...';?> </td>
                                            <td> <?php echo $item['quantidade'];?> </td>
                                            <td> <?php echo 'R$ '.number_format($item['preco'],2,',','.');?> </td>
                                            <td> <?php echo 'R$ '.number_format($item['subtotal'],2,',','.');?> </td>
                                        </tr>
                                    <?php   } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <h2>Total: <?php echo $total;?></h2>
                        <?php
                        if (!empty($cliente)){
                        echo 'Cliente não encontrado. Deseja '.'<a href="cliente/create">cadasatrar</a>'.'um novo?';

                        }
                        else {
                            ?>
                            <h4>Busque um cliente pelo numero de telefone aqui</h4>
                            <form method="post" action="getCliente" id="searchCliente">
                                <input name="telefone" id="telefone" type="tel" placeholder="Telefone" onblur="getCliente();">
                            </form>
                            <?php
                        }
;
                        ?>
                        <div id="result">

                        </div>

                    </div>
                    <?php if (isset($cliente)) { ?>
                        <form action="addConta" method="post">
                            <input type="hidden" name="conta[id_cliente]" value="<?php echo $cliente['idCliente']; ?>" />
                            <input type="submit" name="conta[submit]" value="vincular conta">
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    function getCliente() {

        var urlAction = "getCliente";
        //var id = $("#telefone").val();

        /**
         * Envia o formulário por meio da variável questao_data
         */
        var dados = jQuery("#searchCliente").serialize();

        $.ajax({
            type: 'POST', // tipo de requisição: post
            url: urlAction, // action que será chamado no controlador
            data: dados // parâmetro passado, dados do form
        }).done(function (result) {


            //var returnedData = JSON.parse(result);

            $("#result").html(result);

        });
    }
</script>




