<?php 
    if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
        unset($_COOKIE['session']);
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
        header("Location: ../index.php");
    }

    $id = $_GET['id'];
    
    $queryProduto = " SELECT produtos.id as id_produto, produtos.nome_produto, produtos.descricao_curta, produtos.descricao_longa, produtos.tag, produtos.description, produtos.imagem, produtos.categoria_id, categoria.id as id_categoria, categoria.nome_categoria
                            FROM produtos
                            INNER JOIN categoria
                            WHERE produtos.id = $id
                            AND produtos.categoria_id = categoria.id
                            LIMIT 1; ";

    $resultado = mysqli_query($conn, $queryProduto);
    $produto =  mysqli_fetch_array($resultado);
?>

    <div class="container theme-showcase" role="main">
        <div class="page-header col-sm-10 text-center">
            <h1>Dados do Produto</h1>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-3">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="nome" class="col-sm-4 control-label"><b>Imagem:</b></label>
                        <img src="../assets/imagens/produtos/<?php echo $produto['imagem']; ?>" class="col-sm-2">
                    </div>

                    <div class="form-group">
                        <label for="nome" class="col-sm-4 control-label"><b>Nome:</b></label>
                        <label for="nome" class="control-label"><?php echo $produto['nome_produto']; ?></label>
                    </div>

                    <div class="form-group">
                        <label for="descricaoCurta" class="col-sm-4 control-label"><b>Descricao Curta:</b></label>
                        <label for="descricaoCurta" class="control-label"><?php echo $produto['descricao_curta']; ?></label>
                    </div>

                    <div class="form-group">
                        <label for="descricaoLonga" class="col-sm-4 control-label"><b>Descricao longa:</b></label>
                        <label for="descricaoLonga" class="control-label"><?php echo $produto['descricao_longa']; ?></label>
                    </div>

                    <div class="form-group">
                        <label for="tag" class="col-sm-4 control-label"><b>Tag:</b></label>
                        <label for="tag" class="control-label"><?php echo $produto['tag']; ?></label>
                    </div>

                    
                    <div class="form-group botoesVisualizar col-sm-6">
                        <div class="text-center">
                            <a href="administrativo.php?link=15&id=<?php echo $produto['id_produto']; ?>"><button type="button" class="btn btn-warning mr-2">Editar</button></a>
                        </div>
                        <?php if($_SESSION['nivel_acesso'] == 1) {?>
                            <div class="text-center">
                                <div class="text-center">
                                    <a class="delete_produto" id="<?php echo $produto['id_produto'];?>"><button type="button" class="btn btn-danger mr-2 btnExcluir" name="btnExcluir" value="excluir">Excluir</button></a>
                                </div>
                            </div>
                        <?php } ?>
                        
                        <div class="text-center">
                            <a href="administrativo.php?link=13"><button type="button" class="btn btn-secondary mr-2">Voltar</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- /container -->
    <!-- Modal Excluir-->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir esse produto?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-confirmar">Confirmar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> 
                </div>
            </div>
        </div>
    </div>
