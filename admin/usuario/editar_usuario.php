<?php 
	if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
		unset($_COOKIE['session']);
		unset($_SESSION['id']);
		unset($_SESSION['nome']);
		$_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
		header("Location: ../index.php");
	}

	$id = $_GET['id'];
	$id_admin = $_SESSION['id'];

	$queryIdUsuario = " SELECT * FROM usuarios WHERE id = $id LIMIT 1 ";
	$resultado = mysqli_query($conn, $queryIdUsuario);
	$usuario =  mysqli_fetch_array($resultado);

	$queryIdAdmin = " SELECT * FROM usuarios WHERE id = $id_admin LIMIT 1 ";
	$resultado = mysqli_query($conn, $queryIdAdmin);
	$admin =  mysqli_fetch_array($resultado);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header text-center">
		<h1>Editar Usuário</h1>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="msg">
				<?php
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>
			</div>
			<form class="form-horizontal" method="POST" action="processa/edit_usuario.php">

				<div class="form-group">
					<label for="nome" class="col-sm-2 control-label"><b>Nome:</b></label>
					<div class="col-sm-12">
						<input type="text" name="nome" class="form-control" id="nome" value="<?php echo $usuario['nome']?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label"><b>Email:</b></label>
					<div class="col-sm-12">
						<input type="email" name="email" class="form-control" id="inputEmail3" value="<?php echo $usuario['email']?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="login" class="col-sm-2 control-label"><b>Login:</b></label>
					<div class="col-sm-12">
						<input type="text" name="login" class="form-control" id="login" value="<?php echo $usuario['login']?>" required="required">
					</div>
				</div>

				<?php if($admin['nivel_acesso_id'] == 1){?>
					<div class="form-group">
						<label for="nivel_acesso" class="col-sm-2 control-label"><b>Nível de acesso:</b></label>
						<div class="col-sm-12">
							<select class="form-control" name="nivel_acesso">
								<option value="1" <?php if($usuario['nivel_acesso_id'] == 1){echo "selected";}?>>Administrativo</option>
								<option value="2" <?php if($usuario['nivel_acesso_id'] == 2){echo "selected";}?>>Usuário</option>
							</select>
						</div>
					</div>
				<?php }else{ ?>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label"><b>Senha</b></label>
						<div class="col-sm-10">
							<input type="password" name="senha" class="form-control" id="inputPassword3" placeholder="Senha" disabled="disabled">
						</div>
					</div>
					<div class="form-group">
						<label for="nivel_acesso" class="col-sm-2 control-label"><b>Nível de acesso:</b></label>
						<div class="col-sm-10">
							<select class="form-control" name="nivel_acesso">
								<option value="<?php echo $usuario['nivel_acesso_id']?>">
									
									<?php if($usuario['nivel_acesso_id'] == 1){
										echo "Administrativo";
									}else{
										echo "Usuário";
									}?>
								</option>
							</select>
						</div>
					</div>


				<?php } ?>

				<input type="hidden" name="id" class="form-control" id="id_usuario" value="<?php echo $usuario['id']?>">

				<div class="form-group text-center botoes">
					<div class="btnEditar">
						<button type="submit" name="btnEditar" class="btn btn-success" value="editar">Editar</button>
					</div>
					<div class="btnVoltar">
						<a href="administrativo.php?link=2"><input type="button" name="btnVoltar" class="btn btn-secondary" value="voltar"></input></a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div> <!-- /container -->
