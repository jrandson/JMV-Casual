
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
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">


                    <div class="x_content">

                       

                        <?php
                        if (!empty($cliente)){
                        //echo 'Cliente não encontrado. Deseja '.'<a href="cliente/create">cadasatrar</a>'.'um novo?';
                            $this->viewData($cliente);
                            $this->viewData($debitos);
                        }
                        else {
                            ?>
                            <h1>Adiciona conta do usuário aqui</h1>
                            <form method="post" action="getCliente">                                
                                <input name="telefone" type="tel" placeholder="Telefone">
                            </form>
                            <?php
                        }

                        //$this->viewData(Yii::app()->session['venda']);
                        ?>


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
    function getProduto() {

        var urlAction = "getCliente";
        var id = $("#telefone").val();

        /**
         * Envia o formulário por meio da variável questao_data
         */
        var dados = jQuery("#searchCliente").serialize();

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
</script>




