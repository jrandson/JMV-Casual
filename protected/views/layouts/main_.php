<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
        
        <!-- stylos do tema startbootstrap-sb-admin -->
        
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/startbootstrap-sb-admin-2-1.0.8/dist/css/bootstrap.min.css">
        <!-- MetisMenu CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/startbootstrap-sb-admin-2-1.0.8/dist/metisMenu.min.css">
        <!-- Timeline CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/startbootstrap-sb-admin-2-1.0.8/dist/css/timeline.css">
        <!-- Custom CSS -->
        link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/startbootstrap-sb-admin-2-1.0.8/dist/css/sb-admin-2.css">
        <!-- Custom Fonts -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/startbootstrap-sb-admin-2-1.0.8/dist/css/font-awesome.min.css">
        <!-- Morris Charts CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/startbootstrap-sb-admin-2-1.0.8/bower_components/morrisjs/morris.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
                                array('label'=>'Vendas', 'url'=>array('/venda/index'),'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Contas', 'url'=>array('/Conta/index'),'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Produtos', 'url'=>array('/Produto/index'),'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Usuários', 'url'=>array('/Usuario/index'),'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Clientes', 'url'=>array('/Cliente/index'),'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Fornecedores', 'url'=>array('/Fornecedor/index'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
      
        
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>


