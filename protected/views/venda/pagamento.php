
<?php


    if($cliente == null){
        $data = array(
            'venda'=>$venda,
        );

        $this->renderPartial('_novoClientePagamento',$data);
    }
    else{
        ?>
        <div class="row">

            <h3><?php echo $cliente->nome; ?> <small> <?php echo 'End.: '.$cliente->endereco; ?></small></h3>
        </div>

        <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-money"></i> Resgistrar pagamento</h2>

                <div class="clearfix">
                    <form method="post" action="finalizarVendaAPrazo" class="form-horizontal form-label-left">
                        <input type="hidden" name="cliente[idCliente]" value="<?php echo $cliente->idCliente?>">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pagamento</label>
                            <div class="col-md-3 col-sm-9 col-xs-12">
                                <input type="text" name="venda[pagamento]" class="form-control" placeholder="Pagamento">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Observação</label>
                            <div class="col-md-6 col-sm-9 col-xs-12">
                                <textarea name="venda[observacao]" placeholder="Observação"  ></textarea>
                            </div>
                        </div>					

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <a href="index" class="btn btn-danger">Cancelar</a>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="x_content">

        </div>
        </div>

        <?php
    ?>


    <?php } ?>