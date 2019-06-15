<?php
    session_start();
    require_once("conexao.php");
    
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    $queryDelete = " DELETE FROM usuarios WHERE id = '$id'; ";

    $resultado = mysqli_query($conn, $queryDelete);

    if($resultado){
        $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible text-center' id='msgSuccess'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuário excluído com sucesso.</p>";
        header("Location: ../administrativo.php?link=2");
    }else{
        $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center' id='msgWarning'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Não foi possível excluir esse usuário, tente novamente..</p>";
        header("Location: ../administrativo.php?link=2");
    }
?>