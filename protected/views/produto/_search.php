<?php
/* @var $this ProdutoController */
/* @var $model Produto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idProduto'); ?>
		<?php echo $form->textField($model,'idProduto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descricao'); ?>
		<?php echo $form->textField($model,'descricao',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precoVenda'); ?>
		<?php echo $form->textField($model,'precoVenda'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precoCompra'); ?>
		<?php echo $form->textField($model,'precoCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estoque'); ?>
		<?php echo $form->textField($model,'estoque'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'localizacao'); ?>
		<?php echo $form->textField($model,'localizacao',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->