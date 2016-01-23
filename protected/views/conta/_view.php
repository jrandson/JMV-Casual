<?php
/* @var $this ContaController */
/* @var $data Conta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idConta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idConta), array('view', 'id'=>$data->idConta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_venda')); ?>:</b>
	<?php echo CHtml::encode($data->id_venda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->id_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quitada')); ?>:</b>
	<?php echo CHtml::encode($data->quitada); ?>
	<br />


</div>