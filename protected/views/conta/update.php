<?php
/* @var $this ContaController */
/* @var $model Conta */

$this->breadcrumbs=array(
	'Contas'=>array('index'),
	$model->idConta=>array('view','id'=>$model->idConta),
	'Update',
);

$this->menu=array(
	array('label'=>'List Conta', 'url'=>array('index')),
	array('label'=>'Create Conta', 'url'=>array('create')),
	array('label'=>'View Conta', 'url'=>array('view', 'id'=>$model->idConta)),
	array('label'=>'Manage Conta', 'url'=>array('admin')),
);
?>

<h1>Update Conta <?php echo $model->idConta; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>