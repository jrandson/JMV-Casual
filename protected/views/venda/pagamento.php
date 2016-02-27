<h3>Pagamento de conta</h3>

    <!-- start accordion -->
    <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
        <div class="panel">
            <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                <h4 class="panel-title">Collapsible Group Item #1</h4>
            </a>



        </div>
        <div class="panel">
            <a class="panel-heading collapsed" role="tab" id="headingTwo1" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo">
                <h4 class="panel-title">Alguma coisa relevante da venda aqui</h4>
            </a>
            <div id="collapseTwo1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <p><strong>Collapsible Item 2 data</strong>
                    </p>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                </div>
            </div>
        </div>
        <div class="panel">
            <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree">
                <h4 class="panel-title">Collapsible Group Item #3</h4>
            </a>
            <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <p><strong>Collapsible Item 3 data</strong>
                    </p>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
                </div>
            </div>
        </div>
    </div>
    <!-- end of accordion -->

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