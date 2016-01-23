<!DOCTYPE html>
<html lang="en">

    <head>
        <?php require 'style.php'; ?>
    </head>


    <body class="nav-md">
        <div class="container body">

            <div class="main_container">

                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
                        </div>
                        <div class="clearfix"></div>

                        <!-- menu prile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2><?php echo Yii::app()->user->name ?></h2>
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
                <?php //require 'navigation.php'; ?>
                <!-- /top navigation -->

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
