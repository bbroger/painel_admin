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

	$query = " SELECT * FROM categoria WHERE id = $id LIMIT 1 ";

	$resultado = mysqli_query($conn, $query);
	$categoria =  mysqli_fetch_array($resultado);

	$queryIdAdmin = " SELECT * FROM usuarios WHERE id = $id_admin LIMIT 1 ";
	$resultado = mysqli_query($conn, $queryIdAdmin);
	$admin =  mysqli_fetch_array($resultado);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header text-center">
		<h1>Editar Categoria</h1>
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
			<form class="form-horizontal" method="POST" action="processa/edit_categoria.php">

				<div class="form-group">
					<label for="nome_categoria" class="col-sm-2 control-label"><b>Nome</b></label>
					<div class="col-sm-12">
						<input type="text" name="nome_categoria" class="form-control" id="nome_categoria" value="<?php echo $categoria['nome_categoria']?>" required="required">
					</div>
				</div>

				<input type="hidden" name="id" class="form-control" id="id_categoria" value="<?php echo $categoria['id']?>">

				<div class="form-group text-center botoes">
					<div class="btnEditar">
						<button type="submit" name="btnEditar" class="btn btn-success" value="editar">Editar</button>
					</div>
					<div class="btnVoltar">
						<a href="administrativo.php?link=9"><input type="button" name="btnVoltar" class="btn btn-secondary" value="voltar"></input></a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div> <!-- /container -->
