<?php 
  if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
    unset($_COOKIE['session']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
    header("Location: ../index.php");
  }
  
?>
    <div class="container theme-showcase" role="main">
        <div class="page-header text-center">
          <h1>Cadastrar Categoria</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="msg">
                    <?php
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                    ?>
                </div>
                <form class="form-horizontal" method="POST" action="processa/cad_categoria.php">
                
                    <div class="form-group">
                      <label for="nome_categoria" class="col-sm-2 control-label"><b>Nome</b></label>
                      <div class="col-sm-12 ">
                        <input type="text" name="nome_categoria" class="form-control" id="nome_categoria" placeholder="Nome da categoria" required="required">
                      </div>
                    </div>

                    <div class="form-group text-center botoes">
                      <div class="btnCadastrar">
                        <button type="submit" name="btnCadastrar" class="btn btn-success" value="cadastrar">Cadastrar</button>
                      </div>
                      <div class="btnVoltar">
                        <a href="administrativo.php?link=2"><input type="button" name="btnVoltar" class="btn btn-secondary" value="voltar"></a>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- /container -->