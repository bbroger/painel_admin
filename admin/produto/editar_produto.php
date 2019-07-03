<?php
if (!isset($_SESSION['id']) || !isset($_SESSION['nome'])) {
	unset($_COOKIE['session']);
	unset($_SESSION['id']);
	unset($_SESSION['nome']);
	$_SESSION['msg'] = "<p class='alert alert-warning alert-dismissible text-center'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Preencha os campos Usuário e Senha</p>";
	header("Location: ../index.php");
}

$id = $_GET['id'];
$id_admin = $_SESSION['id'];

$queryProduto = " SELECT produtos.id as id_produto, produtos.nome_produto, produtos.descricao_curta, produtos.descricao_longa, produtos.tag, produtos.description, produtos.imagem, produtos.categoria_id, categoria.id as id_categoria, categoria.nome_categoria
                            FROM produtos
                            INNER JOIN categoria
                            WHERE produtos.id = $id
                            AND produtos.categoria_id = categoria.id
                            LIMIT 1; ";

$resultado = mysqli_query($conn, $queryProduto);
$produto =  mysqli_fetch_array($resultado);

$queryCategoria = " SELECT id, nome_categoria FROM categoria ";
$resultadoCategoria = mysqli_query($conn, $queryCategoria);

?>
<div class="container theme-showcase" role="main">
	<div class="page-header text-center">
		<h1>Editar Produto</h1>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="msg">
				<?php
				if (isset($_SESSION['msg'])) {
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>
			</div>
			<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="../processa/produto/edit_produto.php">
                <div class="form-group">
                    <label for="imagem" class="col-sm-4 control-label"><b>Imagem:</b></label>
                    <img src="../assets/imagens/produtos/<?php echo $produto['imagem']; ?>" class="col-sm-2">
                </div>

				<div class="form-group">
                    <label for="novaimagem" class="col-sm-4 control-label"><b>Nova Imagem:</b></label>
                    <input type="file" name="novaimagem" class="form-control" id="novaimagem" >
                </div>

                <div class="form-group">
                    <label for="nome" class="col-sm-4 control-label"><b>Nome:</b></label>
					<div class="col-sm-12">
						<input type="text" name="nome" class="form-control" id="nome" value="<?php echo $produto['nome_produto']; ?>" required="required">
					</div>
                </div>

                <div class="form-group">
                    <label for="descricaoCurta" class="col-sm-4 control-label"><b>Descricao Curta:</b></label>
					<div class="col-sm-12">
						<input type="text" name="descricaoCurta" class="form-control" id="descricaoCurta" value="<?php echo $produto['descricao_curta']; ?>" required="required">
					</div>
                </div>

                <div class="form-group">
                    <label for="descricaoLonga" class="col-sm-4 control-label"><b>Descricao longa:</b></label>
                    <div class="col-sm-12">
						<input type="text" name="descricaoLonga" class="form-control" id="descricaoLonga" value="<?php echo $produto['descricao_longa']; ?>" required="required">
					</div>
                </div>

                <div class="form-group">
                    <label for="tag" class="col-sm-4 control-label"><b>Tag:</b></label>
                    <div class="col-sm-12">
						<input type="text" name="tag" class="form-control" id="tag" value="<?php echo $produto['tag']; ?>" required="required">
					</div>
                </div>

				<div class="form-group">
					<label for="categoria" class="col-sm-2 control-label"><b>Categoria:</b></label>
					<div class="col-sm-12">
						<select class="form-control" name="categoria">
							<?php while($categoria =  mysqli_fetch_array($resultadoCategoria)){ ?>
							<option value="<?php echo $categoria['id']; ?>" <?php if($produto['categoria_id'] == $categoria['id']){echo 'selected';};?>>
								<?php echo $categoria['nome_categoria']; ?>	
							</option>
							<?php } ?>
						</select>
					</div>
				</div>

                <div class="form-group botoesVisualizar">
                    <div class="text-center">
                        <a href="administrativo.php?link=15&id=<?php echo $produto['id_produto']; ?>"><button type="button" class="btn btn-success mr-2">Editar</button></a>
                    </div>                        
                    <div class="text-center">
                        <a href="administrativo.php?link=13"><button type="button" class="btn btn-secondary mr-2">Voltar</button></a>
                    </div>
                </div>
        	</form>
		</div>
	</div>
</div> <!-- /container -->