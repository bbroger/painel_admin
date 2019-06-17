<?php 
@session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar login">
    <meta name="author" content="RCSSOFT">
    <link rel="icon" href="../assets/imagens/favicon.ico">

    <title>Login</title>
    <link href="../assets/css/starter-template.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form class="form-signin" method="POST" action="processa/valida_login.php">
                    <h2 class="form-signin-heading text-center">Efetue seu login</h2>
                    <div class="msg">
                      <?php
                      if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                        }
                        ?>
                    </div>
                    <label for="inputEmail" class="sr-only">Usuário</label>
                    <input type="text" name="usuario" class="form-control text-center" placeholder="Digitar o Usuário" required autofocus><br />

                    <label for="inputPassword" class="sr-only">Senha</label>
                    <input type="password" name="senha" class="form-control text-center" placeholder="Digite a Senha" required ><br />

                    <input class="btn btn-lg btn-primary btn-block" type="submit" name="btnLogin" value="Acessar">
                </form>
            </div>
        </div>
        <div class="recuperaSenha text-center">
            <label>Recupere sua senha clicando <a href="administrativo.php?link=7"><b>aqui</b>.</a></label>
        </div>	
    </div> <!-- /container -->

    <script src="../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>