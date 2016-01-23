<?php
/* @var $this PagamentoController */
/* @var $data Pagamento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPagamento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPagamento), array('view', 'id'=>$data->idPagamento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_venda')); ?>:</b>
	<?php echo CHtml::encode($data->id_venda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_pagamento')); ?>:</b>
	<?php echo CHtml::encode($data->data_pagamento); ?>
	<br />


</div>