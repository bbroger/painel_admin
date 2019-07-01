<?php 

if( !isset($_SESSION['id']) || !isset($_SESSION['nome']) ){
	unset($_COOKIE['session']);
	unset($_SESSION['id']);
	unset($_SESSION['nome']);
	$_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
	header("Location: ../index.php");
}

$query = " SELECT * FROM categoria; ";

$resultado = mysqli_query($conn, $query);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header text-center">
		<h1>Cadastrar Produto</h1>
  	</div>
  	<div class="row">
		<div class="col-md-12">
			<div class="msg">
				<?php
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>
			</div>
			<form class="form-horizontal" method="POST" action="processa/produto/cad_produto.php" enctype="multipart/form-data">

				<div class="form-group">
					<label for="nome" class="col-sm-2 control-label"><b>Nome</b></label>
					<div class="col-sm-12 ">
						<input type="text" name="nome_produto" class="form-control" id="nome_produto" placeholder="Nome do produto" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="descricaoCurta" class="col-sm-4 control-label"><b>Descrição Curta</b></label>
					<div class="col-sm-12">
						<input type="text" name="descricaoCurta" class="form-control" id="descricaoCurta" placeholder="Insira uma descrição curta" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="descricaoLonga" class="col-sm-4 control-label"><b>Descrição Longa</b></label>
					<div class="col-sm-12">
						<input type="text" name="descricaoLonga" class="form-control" id="descricaoLonga" placeholder="Insira uma descrição longa" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="tag" class="col-sm-2 control-label"><b>TAG</b></label>
					<div class="col-sm-12">
						<input type="text" name="tag" class="form-control" id="tag" placeholder="Insira a TAG">
					</div>
				</div>

				<div class="form-group">
					<label for="description" class="col-sm-2 control-label"><b>Description</b></label>
					<div class="col-sm-12">
						<input type="text" name="description" class="form-control" id="description" placeholder="Description, melhora o SEO" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="imagem" class="col-sm-2 control-label"><b>Imagem</b></label>
					<div class="col-sm-12">
						<input type="file" name="imagem" class="form-control" id="imagem" placeholder="Inclua a imagem do produto" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="categoria" class="col-sm-2 control-label"><b>Categoria</b></label>
					<div class="col-sm-12">
						<select class="form-control" name="categoria">
							<option>Selecione...</option>
							<?php while ($categoria =  mysqli_fetch_array($resultado)) { ?>
							<option value="<?php echo $categoria['id'];?>"><?php echo $categoria['nome_categoria'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group text-center botoes">
					<div class="btnCadastrar">
						<button type="submit" name="btnCadastrar" class="btn btn-success" value="cadastrar">Cadastrar</button>
					</div>
					<div class="btnCadastrarCategoria">
						<a href="administrativo.php?link=8"><input type="button" name="btnCategoria" class="btn btn-secondary" value="Categoria"></a>
					</div>
					<div class="btnVoltar">
						<a href="administrativo.php?link=13"><input type="button" name="btnVoltar" class="btn btn-secondary" value="Voltar"></a>
					</div>
					
				</div>
			</form>
		</div>
	</div>
</div> <!-- /container -->