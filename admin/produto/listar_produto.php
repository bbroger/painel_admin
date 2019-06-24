<?php 
    if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
        unset($_COOKIE['session']);
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
        header("Location: ../index.php");
    }

    $sql = " SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.login, usuarios.nivel_acesso_id as id_acesso, nivel_acesso.nivel_acesso
                FROM painel_admin.usuarios
                INNER JOIN painel_admin.nivel_acesso
                WHERE nivel_acesso.id = usuarios.nivel_acesso_id; ";

    $resultado = mysqli_query($conn, $sql);
    @$rowCount = mysqli_num_rows($resultado);
?>

<div class="container theme-showcase" role="main">
  <div class="page-header text-center ">
      <h1>Lista de Usuários</h1>
  </div>
  <div class="incluirUsuario">
      <a href="administrativo.php?link=3"><button type="button" class="btn btn-success btn-sm mr-2">Incluir Usuário</button></a>
  </div>

  <div class="row">
    <div class="col-md-12 table-responsive">
      <div class="msg">
        <?php
        if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
          }?>
      </div>
  <?php if($rowCount != 0){?>

        <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">Nome</th>
                <th class="text-center">Usuário</th>
                <th class="text-center">Email</th>
                <th class="text-center">Acesso</th>
                <th class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($usuario =  mysqli_fetch_array($resultado)){?>
                <tr id="<?php echo $usuario['id']; ?>">
                    <td class="text-center"><?php echo $usuario['nome']; ?></td>
                    <td class="text-center"><?php echo $usuario['login']; ?></td>
                    <td class="text-center"><?php echo $usuario['email']; ?></td>
                    <td class="text-center"><?php echo $usuario['nivel_acesso']; ?></td>
                    <td class="text-center botoes">
                        <a href="administrativo.php?link=4&id=<?php echo $usuario['id']; ?>"><button type="button" class="btn btn-info btn-sm mr-2">Visualizar</button></a>
                        <a href="administrativo.php?link=5&id=<?php echo $usuario['id']; ?>"><button type="button" class="btn btn-warning btn-sm mr-2">Editar</button></a>
                        <?php if($_SESSION['nivel_acesso'] == 1) {?>  
                        <a class="delete" id="<?php echo $usuario['id'];?>"><button type="button" class="btn btn-danger btn-sm mr-2 btnExcluir" name="btnExcluir" value="excluir">Excluir</button></a>
                      <?php } ?>
                    </td>
                </tr>
            <?php }?>
            <?php }else{
                echo"<div class='alert alert-primary text-center' role='alert'>
                Ainda não existem usuários cadastrados.
                </div>";
            }?>
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
        <h5 class="modal-title" id="exampleModalLabel">Excluir usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseja realmente excluir esse usuário?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-confirmar">Confirmar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> 
      </div>
    </div>
  </div>
</div>
