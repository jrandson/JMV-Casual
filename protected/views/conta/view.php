<?php
/* @var $this ContaController */
/* @var $model Conta */

$this->breadcrumbs=array(
	'Contas'=>array('index'),
	$model->idConta,
);

$this->menu=array(
	array('label'=>'List Conta', 'url'=>array('index')),
	array('label'=>'Create Conta', 'url'=>array('create')),
	array('label'=>'Update Conta', 'url'=>array('update', 'id'=>$model->idConta)),
	array('label'=>'Delete Conta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idConta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Conta', 'url'=>array('admin')),
);
?>

<h1>View Conta #<?php echo $model->idConta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idConta',
		'id_venda',
		'id_cliente',
		'id_usuario',
		'quitada',
	),
)); ?>
