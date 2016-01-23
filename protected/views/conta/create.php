<?php
/* @var $this ContaController */
/* @var $model Conta */

$this->breadcrumbs=array(
	'Contas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Conta', 'url'=>array('index')),
	array('label'=>'Manage Conta', 'url'=>array('admin')),
);
?>

<h1>Create Conta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>