<?php
if (!isset($_SESSION['id']) || !isset($_SESSION['nome'])) {
    unset($_COOKIE['session']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
    header("Location: ../index.php");
}

$sql = " SELECT * FROM categoria ORDER BY nome_categoria ASC; ";

$resultado = mysqli_query($conn, $sql);
@$rowCount = mysqli_num_rows($resultado);
?>

<div class="container theme-showcase" role="main">
    <div class="page-header text-center ">
        <h1>Lista de Categorias</h1>
    </div>
    <div class="incluirCategoria">
        <a href="administrativo.php?link=8"><button type="button" class="btn btn-success btn-sm mr-2">Incluir Categoria</button></a>
    </div>

    <div class="row">
        <div class="col-md-12 table-responsive">
            <div class="msg">
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                } ?>
            </div>
            <?php if ($rowCount != 0) { ?>

                <table class="table table-hover tablesorter">
                    <thead>
                        <tr>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Data de Criação</th>
                            <th class="text-center">Última Alteração</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($categoria =  mysqli_fetch_array($resultado)) { ?>
                            <tr id="<?php echo $categoria['id']; ?>">
                                <td class="text-center"><?php echo $categoria['nome_categoria']; ?></td>
                                <td class="text-center">
                                    <?php echo (date('d/m/Y H:i:s', strtotime($categoria['created']))); ?></td>
                                <td class="text-center">
                                    <?php
                                    if (!empty($categoria['modified'])) {
                                        echo (date('d/m/Y H:i:s', strtotime($categoria['modified'])));
                                    };
                                    ?>
                                </td>
                                <td class="text-center botoes">
                                    <a href="administrativo.php?link=10&id=<?php echo $categoria['id']; ?>"><button type="button" class="btn btn-warning btn-sm mr-2">Editar</button></a>
                                    <a class="delete_categoria" id="<?php echo $categoria['id']; ?>"><button type="button" class="btn btn-danger btn-sm mr-2 btnExcluir" name="btnExcluir" value="excluir">Excluir</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else {
                        echo "<div class='alert alert-primary text-center' role='alert'>
								Ainda não existem categorias cadastradas.
								</div>";
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- /container -->

<!-- Modal -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir essa categoria?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-confirmar">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>