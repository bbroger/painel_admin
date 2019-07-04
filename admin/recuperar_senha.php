<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar login">
    <meta name="author" content="RCSSOFT">
    <link rel="icon" href="../assets/imagens/favicon.ico">

    <title>Login</title>
    <link href="../assets/css/starter-template.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
	<!-- Início navbar -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="administrativo.php">Painel</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Entrar</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="processa/sair.php">Sair</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Fim navbar -->
	<div class="container-fluid">
		<div class="container">
			<div class="row text-center py-5">
				<form action="processa/recupera_senha.php" method="post" class="w-100">
					<div class="col-12">
						<div class="dadosCadastro dadosUsuario">											
							<div class="col-12">
								<div class="card py-5 mb-5">
									<h4 class="mb-3">
										Recuparação de senha
									</h4>
									<p class="m-0">
										Por favor, primeiramente nos informe qual é o seu endereço de e-mail. 
									</p>
									<p class="m-0">
										Nós enviaremos orientações para recuperação de sua senha e/ou usuário. 
									</p>
								</div>
								<div class="input-group">								
									<input type="text" class="form-control" placeholder="Informe o seu endereço de e-mail..." name="email" required>
									<span class="input-group-btn">
										<button type="submit" class="btn btn-success btn-sm mr-2">ENVIAR</button>
									</span>
								</div>
							</div>								
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
	<script src="../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../assets/js/jquery.tablesorter.js"></script>
</body>
</html>