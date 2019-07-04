<?php
    require_once("../conexao.php");
    session_start();

    //Não permite acessar a página diretamente pelo endereço
    $btnCadastrar = filter_input(INPUT_POST, 'btnCadastrar', FILTER_SANITIZE_STRING);

    if($btnCadastrar){
        //captura as informações enviadas via POST
        $nome = ucwords(strtolower(filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_STRING)));
        $descricao_curta = filter_input(INPUT_POST, 'descricaoCurta', FILTER_SANITIZE_STRING);
        $descricao_longa = filter_input(INPUT_POST, 'descricaoLonga', FILTER_SANITIZE_STRING);
        $tag = ucwords(strtolower(filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_STRING)));
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $imagem = $_FILES['imagem'];
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);

        $sql = " SELECT * FROM produtos WHERE nome_produto = '$nome' LIMIT 1; ";
        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($resultado);
        
        if($row == 0){
            if($imagem != null){

                $error = array();
	 
                // Verifica se o arquivo é uma imagem
                if(!preg_match("/^image\/(pjpeg|jpeg|png|bmp|jpg)$/", $imagem["type"])){
                    $error[1] = "Insira uma imagem no formato pjpeg, jpeg, png, jpg ou bmp.";
                } 
        
                // Se não houver nenhum erro
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
                        foreach ($error as $erro) {
                        echo $erro . "<br />";
                        }
                    }else{
                        //realizando inserção					
                        $queryInsert = " INSERT INTO produtos (nome_produto, descricao_curta, descricao_longa, tag, description, imagem, created, categoria_id )
                                        values ('$nome', '$descricao_curta', '$descricao_longa', '$tag', '$description', '$nome_imagem', NOW(), $categoria); ";

                        $produto =  mysqli_query($conn, $queryInsert);

                        if($produto){		
                            //deu certo
                            $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Produto cadastrado com sucesso.</p>";
                            header("Location: ../../administrativo.php?link=13");
                        }else{
                            //deu errado
                            $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Não foi possível cadastrar o produto, tente novamente..</p>";
                            header("Location: ../../administrativo.php?link=13");
                        }
                    }
                }
            }             
        } else{
            $_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Produto já cadastrado. Informe um novo produto.</p>";
            header("Location: ../../administrativo.php?link=12");
        }
    }else{
        $_SESSION['msg'] = "<p class='alert alert-danger alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Página não encontrada.</p>";
        header("Location: ../../index.php");
    }