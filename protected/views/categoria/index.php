<div class="right_col" role="main">

    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>Categorias</h3>
            </div>


        </div>
        <?php $this->renderPartial('nav',array()); ?>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">


                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Categorias <small>basic table subtitle</small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Descrição</th>
                                            <th>Cadastrado por</th>
                                            <th>data</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categorias as $categoria) {
                                            $user = Usuario::model()->findByPk($categoria->id_usuario);
                                            ?>

                                            <tr>
                                                <td><?php echo $categoria->idCategoria ?></td>
                                                <td><?php echo $categoria->descricao ?></td>
                                                <td><?php echo $user->nome ?></td>
                                                <td><?php echo $categoria->dataCadastro ?></td>
                                                <td><?php echo CHtml::link('autualizar',array('update','id'=>$categoria->idCategoria)); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


</div>
