<?php
    require_once("../conexao.php");
    session_start();

    $btnEditar = filter_input(INPUT_POST, 'btnEditar', FILTER_SANITIZE_STRING);

    if($btnEditar){
       
        $id = filter_input(INPUT_POST, 'id_produto', FILTER_SANITIZE_STRING);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $descricao_curta = filter_input(INPUT_POST, 'descricaoCurta', FILTER_SANITIZE_STRING);
        $descricao_longa = filter_input(INPUT_POST, 'descricaoLonga', FILTER_SANITIZE_STRING);
        $tag = filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $imagem = $_FILES['novaimagem'];
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);

        /*var_dump($imagem);
        echo "<br />";
        var_dump($_POST);
        exit;*/
        
        if(!empty($imagem['name'])){
            $error = array();

            if(!preg_match("/^image\/(pjpeg|jpeg|png|bmp)$/", $imagem["type"])){
            $error[1] = "Insira uma imagem no formato pjpeg, jpeg, png ou bmp.";
            }

            if (count($error) == 0) {

                // Pega extensão da imagem
		        preg_match("/\.(bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
	 
                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                    
                // Caminho de onde ficará a imagem
                $caminho_imagem = "../../../assets/imagens/produtos/" . $nome_imagem;
        
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($imagem["tmp_name"], $caminho_imagem);	

                //se aconteceu algum erro apresenta a mensagem
                if (count($error) != 0) {
                    header("Location: ../../administrativo.php?link=13");
                }else{
                             
                    $queryUpdate = " UPDATE produtos 
                                        SET nome_produto = '$nome',
                                        descricao_curta = '$descricao_curta',
                                        descricao_longa = '$descricao_longa',
                                        tag = '$tag',
                                        description = '$description',
                                        imagem = '$nome_imagem',
                                        modified = NOW(),
                                        categoria_id = '$categoria'
                                        WHERE id = $id; ";                    

                    $resultado = mysqli_query($conn, $queryUpdate);

                    if($resultado){
                        $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Produto editado com sucesso.</p>";
                        header("Location: ../../administrativo.php?link=13");
                    }else{
                        $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Não foi possível editar esse produto, tente novamente..</p>";
                        header("Location: ../../administrativo.php?link=13");
                    }
                }
            }
        }else{
            $queryUpdate = " UPDATE produtos 
                                SET nome_produto = '$nome',
                                descricao_curta = '$descricao_curta',
                                descricao_longa = '$descricao_longa',
                                tag = '$tag',
                                description = '$description',
                                modified = NOW(),
                                categoria_id = '$categoria'
                                WHERE id = $id; ";
                                    
		    if(mysqli_query($conn, $queryUpdate)){		
                $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Produto editado com sucesso.</p>";
                header("Location: ../../administrativo.php?link=13");
	        }else{
                $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Não foi possível editar esse produto, tente novamente..</p>";
                header("Location: ../../administrativo.php?link=13");
            }
        }
    }else{
        $_SESSION['msg'] = "<p class='alert alert-danger alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Página não encontrada.</p>";
        header("Location: ../../index.php");
    }
?>