<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MV Casual</title>

        <!-- Bootstrap core CSS -->

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/css/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/css/maps/jquery-jvectormap-2.0.1.css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/css/icheck/flat/green.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/css/floatexamples.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/gentelella/js/nprogress.js"></script>
        <script>
            NProgress.start();
        </script>
    </head>

    <body style="background:#F7F7F7;">

        <div class="">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>

            <div id="wrapper">

                <div id="login" class="animate form">
                    <section class="login_content">
                        <form action="login" method="post" name="Login">
                            <h1>Login Form</h1>
                            <div>
                                <input type="text" name="Login[username]" class="form-control" placeholder="Username" required="" />
                            </div>
                            <div>
                                <input type="password" name="Login[password]" class="form-control" placeholder="Password" required="" />
                            </div>

                            <div>
                                <input type="submit" class="btn btn-default submit" value="Entrar">
                                                         </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-paw" style="font-size: 26px;"></i> MV Casual</h1>
                                </div>
                            </div>
                        </form>
                        <!-- form -->
                    </section>
                    <!-- content -->
                </div>

            </div>
        </div>

    </body>

</html>