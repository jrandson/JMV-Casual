<?php
/* @var $this FornecedorController */
/* @var $data Fornecedor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFornecedor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFornecedor), array('view', 'id'=>$data->idFornecedor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('razao')); ?>:</b>
	<?php echo CHtml::encode($data->razao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsavel')); ?>:</b>
	<?php echo CHtml::encode($data->responsavel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefone')); ?>:</b>
	<?php echo CHtml::encode($data->telefone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endereco')); ?>:</b>
	<?php echo CHtml::encode($data->endereco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_cadastro')); ?>:</b>
	<?php echo CHtml::encode($data->data_cadastro); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	*/ ?>

</div>