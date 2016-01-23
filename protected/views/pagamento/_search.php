<?php
/* @var $this PagamentoController */
/* @var $model Pagamento */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idPagamento'); ?>
		<?php echo $form->textField($model,'idPagamento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_venda'); ?>
		<?php echo $form->textField($model,'id_venda'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_pagamento'); ?>
		<?php echo $form->textField($model,'data_pagamento'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->