<h3>Pagamento de conta</h3>



<?php


    if($cliente == null){
        $data = array(
            'venda'=>$venda,
        );

        $this->renderPartial('_novoClientePagamento',$data);
    }
    else{
        $this->viewData($cliente);
        $this->viewData($venda);
    ?>
        <form action="finalizarVendaAPrazo" method="post">
            <input type="text" name="venda[pagamento]" placeholder="Valor" />
            <input type="hidden" name="cliente[idCliente]" value="<?php echo $cliente->idCliente ?>">
            <input type="submit" value="Registrar venda">
        </form>

    <?php } ?>