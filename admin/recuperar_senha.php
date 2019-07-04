<!-- Início navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Painel</a>
	<a class="navbar-brand" href="index.php">Entrar</a>
</nav>
<!-- Fim navbar -->
<div class="container-fluid">
	<div class="container">
		<div class="row text-center py-5">
			<form action="processa/admin/recupera_senha.php" method="post" class="w-100">
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
