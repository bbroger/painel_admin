<?php 
  if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
    unset($_COOKIE['session']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
    header("Location: login.php");
  }
  
?>
    <div class="container theme-showcase" role="main">
        <div class="page-header text-center">
          <h1>Cadastrar Usuário</h1>
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
                <form class="form-horizontal" method="POST" action="processa/cad_usuario.php">
                
                    <div class="form-group">
                      <label for="nome" class="col-sm-2 control-label"><b>Nome</b></label>
                      <div class="col-sm-12 ">
                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label"><b>Email</b></label>
                      <div class="col-sm-12">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="login" class="col-sm-2 control-label"><b>Login</b></label>
                      <div class="col-sm-12">
                        <input type="text" name="login" class="form-control" id="login" placeholder="Login" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label"><b>Senha</b></label>
                      <div class="col-sm-12">
                        <input type="password" name="senha" class="form-control" id="inputPassword3" placeholder="Senha">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="nivel_acesso" class="col-sm-2 control-label"><b>Nível de acesso</b></label>
                      <div class="col-sm-12">
                        <select class="form-control" name="nivel_acesso">
                          <?php if($_SESSION['nivel_acesso'] == 1) {?> 
                          <option value="1">Administrativo</option>
                          <option value="2">Usuário</option>
                        <?php }else{?>
                          <option value="2">Usuário</option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group text-center botoes">
                      <div class="btnCadastrar">
                        <button type="submit" name="btnCadastrar" class="btn btn-success" value="cadastrar">Cadastrar</button>
                      </div>
                      <div class="btnVoltar">
                        <a href="administrativo.php?link=2"><input type="button" name="btnVoltar" class="btn btn-secondary" value="voltar"></input></a>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- /container -->

