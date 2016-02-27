<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Produtos cadastrados
                </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">


            <div class="col-md-12 col-sm-12 col-xs-12">

                <h3><?php echo count($produtos)." cadastrados"; ?></h3>

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
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    foreach($produtos as $produto){
                                ?>
                                <tr class="even pointer">
                                    <td class=" last"><a href="view/<?php echo $produto->idProduto; ?>"><?php echo $produto->codigo; ?></a></td>
                                    <td class=" "><?php echo $produto->descricao; ?></td>
                                    <td class=" ">R$ <?php echo number_format($produto->precoVenda,2,',','.'); ?></td>
                                    <td class=" "><?php echo $produto->localizacao; ?></td>
                                    <td class="a-right a-right "><?php echo $produto->estoque; ?></td>

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