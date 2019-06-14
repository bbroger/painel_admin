<?php 
  if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
    unset($_COOKIE['session']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
    header("Location: login.php");
  }

  $id = $_GET['id'];
  
  $queryIdUsuario = " SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.login, usuarios.nivel_acesso_id as id_acesso, nivel_acesso.nivel_acesso
                        FROM painel_admin.usuarios
                        INNER JOIN painel_admin.nivel_acesso
                        WHERE nivel_acesso.id = usuarios.nivel_acesso_id
                        AND usuarios.id = $id
                        LIMIT 1; ";
  $resultado = mysqli_query($conn, $queryIdUsuario);
  $usuario =  mysqli_fetch_array($resultado);
  
?>

    <div class="container theme-showcase" role="main">
      <div class="page-header col-sm-10 text-center">
          <h1>Dados do Usuário</h1>
      </div>
      <div class="row">
        <div></div>
        <div class="col-md-8 offset-md-3">
          <form class="form-horizontal"> 
            <div class="form-group">
              <label for="nome" class="col-sm-2 control-label">Nome:</label>
              <label for="nome" class="control-label"><?php echo $usuario['nome']; ?></label>              
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
              <label for="email" class="control-label"><?php echo $usuario['email']; ?></label>
            </div>

            <div class="form-group">
              <label for="login" class="col-sm-2 control-label">Login:</label>
              <label for="login" class="control-label"><?php echo $usuario['login']; ?></label>
            </div>

            <div class="form-group">
              <label for="nivel_acesso" class="col-sm-2 control-label">Acesso:</label>
              <label for="nivel_acesso" class="control-label"><?php echo $usuario['nivel_acesso']; ?></label>
            </div>

            <div class="form-group botoesVisualizar col-sm-6">
              <div class="text-center">
                <a href="administrativo.php?link=5&id=<?php echo $usuario['id']; ?>"><button type="button" class="btn btn-warning mr-2">Editar</button></a>
              </div>
              <div class="text-center">
                <a href="administrativo.php?link=6&id=<?php echo $usuario['id']; ?>"><button type="button" class="btn btn-danger mr-2">Excluir</button></a>
              </div>
              <div class="text-center">
                <a href="administrativo.php?link=2"><button type="button" class="btn btn-secondary mr-2">Voltar</button></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- /container -->

