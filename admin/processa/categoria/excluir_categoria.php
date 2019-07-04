<?php
    session_start();
    require_once("../conexao.php");
    
    $btnExcluir = filter_input(INPUT_POST, 'btn', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    if(isset($btnExcluir)){
        $queryCategoria = " SELECT categoria_id FROM produtos ";
        $resultadoProduto = mysqli_query($conn, $queryCategoria);
        $categoria = mysqli_affected_rows($resultadoProduto);

        if($categoria > 0){
            $queryDelete = " DELETE FROM categoria WHERE id = '$id'; ";
            $resultado = mysqli_query($conn, $queryDelete);
            if($resultado){
                $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible text-center' id='msgSuccess'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Categoria excluída com sucesso.</p>";
            }else{
                $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center' id='msgWarning'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Não foi possível excluir essa categoria, tente novamente..</p>";
            }
        } else{
            $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center' id='msgWarning'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Existem produtos vinculados a essa categoria, por favor altere a categoria constante no produto antes de efetuar essa exclusão.</p>";
        } 
    }else{
        $_SESSION['msg'] = "<p class='alert alert-danger alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Página não encontrada.</p>";
        header("Location: ../../index.php");
    }
?>