<?php
/* @var $this ProdutoController */
/* @var $model Produto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'produto-_form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model,'descricao'); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estoque'); ?>
		<?php echo $form->textField($model,'estoque'); ?>
		<?php echo $form->error($model,'estoque'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precoVenda'); ?>
		<?php echo $form->textField($model,'precoVenda'); ?>
		<?php echo $form->error($model,'precoVenda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precoCompra'); ?>
		<?php echo $form->textField($model,'precoCompra'); ?>
		<?php echo $form->error($model,'precoCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'localizacao'); ?>
		<?php echo $form->textField($model,'localizacao'); ?>
		<?php echo $form->error($model,'localizacao'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->