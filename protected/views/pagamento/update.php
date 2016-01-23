<?php
/* @var $this PagamentoController */
/* @var $model Pagamento */

$this->breadcrumbs=array(
	'Pagamentos'=>array('index'),
	$model->idPagamento=>array('view','id'=>$model->idPagamento),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pagamento', 'url'=>array('index')),
	array('label'=>'Create Pagamento', 'url'=>array('create')),
	array('label'=>'View Pagamento', 'url'=>array('view', 'id'=>$model->idPagamento)),
	array('label'=>'Manage Pagamento', 'url'=>array('admin')),
);
?>

<h1>Update Pagamento <?php echo $model->idPagamento; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>