<form method="post" action="finalizarVendaAPrazo" class="form-horizontal form-label-left" >
    <p>
        Os campos marcados com * são obrigatórios
    </p>
	 
    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="name"  class="form-control col-md-7 col-xs-12" name="cliente[nome]" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" type="text">
        </div>
    </div>

    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Telefone <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="tel" id="email" name="cliente[telefone]"  class="form-control col-md-7 col-xs-12" required="required">
        </div>
    </div>

    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Endereço">Endereço<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="email" name="cliente[endereco]"   class="form-control col-md-7 col-xs-12">
        </div>
    </div>

    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Endereço">Valor do pagamento<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="venda[pagamento]" placeholder="Valor" class="form-control col-md-7 col-xs-12"/>
        </div>
		<br/>   
		
    </div>
	
	<div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Endereço">Observacao<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
           <textarea name="venda[observacao]" placeholder="observacao"cols="10" rows="4"></textarea>
        </div>
		<br/>   
		
    </div>
	
	
	
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary">Cancelar</button>
            <button id="send" type="submit" class="btn btn-success">Registrar venda</button>
        </div>
    </div>
</form>