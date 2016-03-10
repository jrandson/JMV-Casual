<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Produtos
                </h3>
            </div>

            <div class="title_right">
                <div class="form-group">

                    <form action="index" method="post" class="form-horizontal form-label-left">

                        <div class="form-group">
                            <div class="col-sm-12">

                                <div class="col-md-12 col-sm-5 col-xs-12 form-group pull-right top_search">

                                    <div class="input-group">
                                        <input type="text" name="busca[param]" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <input type="submit" class="btn btn-grey" type="button">Buscar</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-9 col-xs-12">
                                    <select name="busca[idCategoria]" class="form-control">
                                        <?php foreach($categorias as $categoria): ?>
                                            <option value="<?php echo $categoria['idCategoria'] ?>"><?php echo $categoria['descricao'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="divider-dashed"></div>
                    </form>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">


            <div class="col-md-12 col-sm-12 col-xs-12">

                <h3><?php echo "Total: ".count($produtos); ?></h3>
                <h4>
                    <?php if(isset($categoriaBuscada))
                            echo "categoria : ".$categoriaBuscada; ?>
                </h4>

                <div class="x_panel">

                    <div class="x_content">
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings">
                                    <th>Cod</th>
                                    <th>Descrição</th>
                                    <th>Preço </th>
                                    <th>Localização</th>
                                    <th>Estoque</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    foreach($produtos as $produto){
                                ?>
                                <tr class="even pointer">
                                    <td class=" last" width="100"><a href="view/<?php echo $produto['idProduto']; ?>"><?php echo $produto['codigo']; ?></a></td>
                                    <td class=" " width="400"><?php echo $produto['descricao']; ?></td>
                                    <td class=" ">R$ <?php echo number_format($produto['precoVenda'],2,',','.'); ?></td>
                                    <td class=" "><?php echo $produto['localizacao']; ?></td>
                                    <td class="a-right a-right "><?php echo $produto['estoque']; ?></td>
                                    <td class="a-right a-right "><?php echo CHtml::link('visualizar',array('view','id'=>$produto['idProduto'])); ?></td>

                                <?php } ?>
                                
                            </tbody>

                        </table>
                    </div>



                </div>
            </div>

            <br />
            <br />
            <br />

        </div>
    </div>


</div>





