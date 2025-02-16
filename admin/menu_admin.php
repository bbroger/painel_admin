<?php
    if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
        unset($_COOKIE['session']);
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
        header("Location: index.php");
    }
?>

<!-- Início navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="administrativo.php">Painel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produtos<span class="sr-only">(current)</span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                    <a class="dropdown-item" href="administrativo.php?link=8">Cadastrar Categoria</a>
                    <a class="dropdown-item" href="administrativo.php?link=9">Listar Categoria</a>
                    <hr>
                    <a class="dropdown-item" href="administrativo.php?link=12">Cadastrar Produto</a>
                    <a class="dropdown-item" href="administrativo.php?link=13">Listar Produto</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuários<span class="sr-only">(current)</span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="administrativo.php?link=3">Cadastrar</a>
                    <a class="dropdown-item" href="administrativo.php?link=2">Listar</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="processa/sair.php">Sair</a>
            </li>
        </ul>
    </div>
</nav>
<!-- Fim navbar -->