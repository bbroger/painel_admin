<?php
    require_once("conexao.php");
    session_start();
    
    //Não permite acessar a página diretamente pelo endereço
    $btnCadastrar = filter_input(INPUT_POST, 'btnCadastrar', FILTER_SANITIZE_STRING);

    if($btnCadastrar){
        //captura as informações enviadas via POST
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $usuario = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $nivel = filter_input(INPUT_POST, 'nivel_acesso', FILTER_SANITIZE_STRING);

        $sql_email = " SELECT * FROM usuarios WHERE email = '$email' LIMIT 1; ";
        $sql_login = " SELECT * FROM usuarios WHERE login = '$usuario' LIMIT 1; ";
        $resultado_email = mysqli_query($conn, $sql_email);
        $resultado_login = mysqli_query($conn, $sql_login);
        $row_email = mysqli_num_rows($resultado_email);
        $row_login = mysqli_num_rows($resultado_login);
        
        if($row_email == 0){
            if($row_login == 0){
                $cripto = password_hash($senha, PASSWORD_DEFAULT);
            
                $queryInsert = " INSERT INTO usuarios (nome, email, senha, login, nivel_acesso_id, created)
                values ('$nome', '$email', '$cripto', '$usuario', '$nivel', NOW()); ";

                $resultado_usuario = mysqli_query($conn, $queryInsert);

                if($resultado_usuario){
                    $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário cadastrado com sucesso.</p>";
                    header("Location: ../administrativo.php?link=2");
                }else{
                    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Não foi possível cadastrar esse usuário, tente novamente..</p>";
                    header("Location: ../administrativo.php?link=2");
                }
            }else{
                $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Login já existe, escolha outro.</p>";
                header("Location: ../administrativo.php?link=3");
            }   
        } else{
            $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email já cadastrado. Informe um novo email.</p>";
            header("Location: ../administrativo.php?link=3");
        }
    }else{
        $_SESSION['msg'] = "<p class='alert alert-danger alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Página não encontrada.</p>";
        header("Location: ../index.php");
    }
?>