<?php
    require_once("../conexao.php");
    session_start();
    
    //Não permite acessar a página diretamente pelo endereço
    $btnCadastrar = filter_input(INPUT_POST, 'btnCadastrar', FILTER_SANITIZE_STRING);

    if($btnCadastrar){
        //captura as informações enviadas via POST
        $nome = filter_input(INPUT_POST, 'nome_categoria', FILTER_SANITIZE_STRING);

        $sql = " SELECT * FROM categoria WHERE nome_categoria = '$nome' LIMIT 1; ";
        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($resultado);
        
        if($row == 0){
            
                $queryInsert = " INSERT INTO categoria (nome_categoria, created)
                values ('$nome', NOW()); ";

                $categoria = mysqli_query($conn, $queryInsert);

                if($categoria){
                    $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Categoria cadastrada com sucesso.</p>";
                    header("Location: ../../administrativo.php?link=9");
                }else{
                    $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Não foi possível cadastrar a categoria, tente novamente..</p>";
                    header("Location: ../../administrativo.php?link=9");
                }   
        } else{
            $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Categoria já cadastrada. Informe uma nova categoria.</p>";
            header("Location: ../../administrativo.php?link=8");
        }
    }else{
        $_SESSION['msg'] = "<p class='alert alert-danger alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Página não encontrada.</p>";
        header("Location: ../index.php");
    }
?>