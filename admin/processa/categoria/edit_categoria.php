<?php
    require_once("../conexao.php");
    session_start();
    //Não permite acessar a página diretamente pelo endereço
    $btnEditar = filter_input(INPUT_POST, 'btnEditar', FILTER_SANITIZE_STRING);

    if($btnEditar){
        //captura as informações enviadas via POST
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $nome = filter_input(INPUT_POST, 'nome_categoria', FILTER_SANITIZE_STRING);

        //verifica se os campos usuario e senha foram preenchidos
        if(!empty($nome)){
          
            //Realizar o update no banco
            $queryUpdate = " UPDATE categoria set nome_categoria = '$nome', modified = NOW() WHERE id = '$id'; ";

            $resultado = mysqli_query($conn, $queryUpdate);

            if($resultado){
                $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Categoria editada com sucesso.</p>";
                header("Location: ../../administrativo.php?link=9");
            }else{
                $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Não foi possível editar essa categoria, tente novamente..</p>";
                header("Location: ../../administrativo.php?link=9");
            }
        }

    }else{
        $_SESSION['msg'] = "<p class='alert alert-danger alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Página não encontrada.</p>";
        header("Location: ../index.php");
    }
?>