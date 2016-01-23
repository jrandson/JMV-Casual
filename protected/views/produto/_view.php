<?php
/* @var $this ProdutoController */
/* @var $data Produto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProduto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idProduto), array('view', 'id'=>$data->idProduto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precoVenda')); ?>:</b>
	<?php echo CHtml::encode($data->precoVenda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precoCompra')); ?>:</b>
	<?php echo CHtml::encode($data->precoCompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estoque')); ?>:</b>
	<?php echo CHtml::encode($data->estoque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('localizacao')); ?>:</b>
	<?php echo CHtml::encode($data->localizacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />


</div>