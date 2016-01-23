<?php
/* @var $this VendaController */
/* @var $data Venda */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idVenda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idVenda), array('view', 'id'=>$data->idVenda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dataVenda')); ?>:</b>
	<?php echo CHtml::encode($data->dataVenda); ?>
	<br />


</div>