<?php
    require_once("../conexao.php");
    session_start();
   
    $btnEditar = filter_input(INPUT_POST, 'btnEditar', FILTER_SANITIZE_STRING);

    if($btnEditar){
        
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $nome = ucwords(strtolower(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING)));
        $email = strtolower(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
        $usuario = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        //$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $nivel = filter_input(INPUT_POST, 'nivel_acesso', FILTER_SANITIZE_STRING);

        //$cripto = password_hash($senha, PASSWORD_DEFAULT);
     
        $queryUpdate = " UPDATE usuarios set nome = '$nome', email ='$email', login ='$usuario', nivel_acesso_id = '$nivel', modified = NOW() WHERE id = '$id'; ";

        $resultado_usuario = mysqli_query($conn, $queryUpdate);

        if($resultado_usuario){
            $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário editado com sucesso.</p>";
            header("Location: ../../administrativo.php?link=2");
        }else{
            $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Não foi possível editar esse usuário, tente novamente..</p>";
            header("Location: ../../administrativo.php?link=2");
        }
    }else{
        $_SESSION['msg'] = "<p class='alert alert-danger alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Página não encontrada.</p>";
        header("Location: ../../index.php");
    }
?>