<?php
	require_once('conexao.php');
	require_once('envia_emailRecuperaSenha.php');
	
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);	

    $queryConsulta = " SELECT nome, login, email FROM usuarios WHERE email='$email' limit 1; ";
    $resultado = mysqli_query($conn, $queryConsulta);

	if($resultado !=null){	
        $dados = mysqli_fetch_array($resultado);
        
		if(isset($dados) && $dados['email'] == $email){

			$novaSenha = rand(0,99) + substr(time(), 4, 6);//gera uma senha aleatória a partir do horário
			$nscriptografada = password_hash($novaSenha, PASSWORD_DEFAULT);
			$queryInsert = " update usuarios set senha = '$nscriptografada' where email = '$email';";//altera a senha do usuário no BD
			$resultado2 = mysqli_query($conn, $queryInsert);

			//envia email com dados de acesso
			$login = $dados['login'];
			$link = "meusite/painel_admin/index.php";		
			enviaMailCliente(
				$emailDestino = $email,
				$nome = $dados['nome'],
				$mensagem = "Olá, " . $nome . ".<br />
				Seu usuário é " . $login . " e sua senha provisória é " . $novaSenha .".<br />
				Faça login e altere a senha provisória.<br />
				Obrigado. <br />
				Acesse nosso site novamente <a href='{$link}'>aqui</a>."
			);
			header('Location: ../administrativo.php?link=0');
		}else{
			//email não existe no banco - exibir modal
			header('Location: ../administrativo.php?link=7');
		}
	}else{
		//consulta falhou
		header('Location: ../administrativo.php?link=7');
	}
?>
