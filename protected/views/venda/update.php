<?php
/* @var $this VendaController */
/* @var $model Venda */

$this->breadcrumbs=array(
	'Vendas'=>array('index'),
	$model->idVenda=>array('view','id'=>$model->idVenda),
	'Update',
);

$this->menu=array(
	array('label'=>'List Venda', 'url'=>array('index')),
	array('label'=>'Create Venda', 'url'=>array('create')),
	array('label'=>'View Venda', 'url'=>array('view', 'id'=>$model->idVenda)),
	array('label'=>'Manage Venda', 'url'=>array('admin')),
);
?>

<h1>Update Venda <?php echo $model->idVenda; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>