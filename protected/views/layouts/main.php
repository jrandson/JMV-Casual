<!DOCTYPE html>
<html lang="en">

    <head>
        <?php require 'style.php'; ?>
    </head>

    <?php
        $user = Usuario::model()->findByPk(Yii::app()->user->id);

        if(!isset($user)){
            $this->redirect(array('site/login'));
        }

    ?>

    <body class="nav-md">
        <div class="container body">



            <div class="main_container">



                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Loja </span></a>
                        </div>
                        <div class="clearfix"></div>



                        <!-- menu prile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Bem vindo,</span>
                                <h2><?php echo $user->nome ?></h2>
                            </div>
                        </div>
                        <!-- /menu prile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <?php require 'sidebar.php'; ?>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <?php include 'footerbuttons.php'; ?>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <?php require 'navigation.php'; ?>
                <!-- /top navigation -->

                <!-- notifications -->
                <div class="top_nav">
                    <div class="col-md-12">
                        <?php if(Yii::app()->user->hasFlash('success')):?>
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong><?php echo Yii::app()->user->getFlash('success'); ?></strong>
                            </div>
                        <?php endif; ?>

                        <?php if(Yii::app()->user->hasFlash('notice')):?>
                            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong><?php echo Yii::app()->user->getFlash('warning'); ?></strong>
                            </div>
                        <?php endif; ?>

                        <?php if(Yii::app()->user->hasFlash('error')):?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong><?php echo Yii::app()->user->getFlash('error'); ?></strong>
                            </div>
                        <?php endif; ?>


                    </div>
                </div>
                <!-- /notifications -->


                <!-- page content -->                
                <div class="container body">
                    <div class="main_container">

                        <!-- page content -->
                        <div class="center_col" role="main">

                            <?php echo $content; ?>

                        </div>
                        <!-- /page content -->
                    </div>
                </div>                
                <!-- /page content -->

                <!-- footer content -->                
                <?php require 'footer.php'; ?>
                <!-- /footer content -->

            </div>
        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <?php require 'scripts.php'; ?>

    </body>

</html>
