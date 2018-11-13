<?php
	function __autoload($class_name){
		require_once 'class/' . $class_name . '.php';
	}
?>

<!DOCTYPE HTML>
<html land="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>PHP OO</title>
  <meta name="description" content="PHP OO" />
  <meta name="robots" content="index, follow" />
   <meta name="author" content="Andrew Esteves"/>
   <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" />
  <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>
<body>

	<div class="container">

		<?php
	
		$unidades= new Unidades();	

		if(isset($_POST['cadastrar'])):

			$unidade = $_POST['unidade'];
			$tipo = $_POST['tipo'];
			$cnes = $_POST['cnes'];
			$territorio = $_POST['territorio'];
			$cep = $_POST['cep'];
			$endereco = $_POST['endereco'];
			$numero = $_POST['numero'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$uf = $_POST['uf'];

			$unidades->setUnidade($unidade);
			$unidades->setTipo($tipo);
			$unidades->setCnes($cnes);
			$unidades->setTerritorio($territorio);
			$unidades->setCep($cep);
			$unidades->setEndereco($endereco);
			$unidades->setNumero($numero);
			$unidades->setBairro($bairro);
			$unidades->setCidade($cidade);
			$unidades->setUf($uf);

			# Insert
			if($unidades->insert()){
				echo "Inserido com sucesso!";
			}

		endif;

		?>
		<header class="masthead">
			<h1 class="muted">GESTOR SAÚDE - MENU UNIDADE</h1>
			<nav class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li class="active"><a href="telaUnidade.php">Página inicial</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<?php 
		if(isset($_POST['atualizar'])):

			$id = $_POST['id'];
			$unidade = $_POST['unidade'];
			$tipo = $_POST['tipo'];
			$cnes = $_POST['cnes'];
			$territorio = $_POST['territorio'];
			$cep = $_POST['cep'];
			$endereco = $_POST['endereco'];
			$numero = $_POST['numero'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$uf = $_POST['uf'];

			$unidades->setUnidade($unidade);
			$unidades->setTipo($tipo);
			$unidades->setCnes($cnes);
			$unidades->setTerritorio($territorio);
			$unidades->setCep($cep);
			$unidades->setEndereco($endereco);
			$unidades->setNumero($numero);
			$unidades->setBairro($bairro);
			$unidades->setCidade($cidade);
			$unidades->setUf($uf);

			if($unidades->update($id)){
				echo "Atualizado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($unidades->delete($id)){
				echo "Deletado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $unidades->find($id);
		?>
<!--Update-->
		<form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="unidade" value="<?php echo $resultado->udd_nome; ?>" placeholder="Unidade:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="tipo" value="<?php echo $resultado->udd_tipo; ?>" placeholder="Tipo:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cnes" value="<?php echo $resultado->udd_cnes; ?>" placeholder="Cnes:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="territorio" value="<?php echo $resultado->udd_territorio; ?>" placeholder="Territorio:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cep" value="<?php echo $resultado->udd_cep; ?>" placeholder="Cep:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="endereco" value="<?php echo $resultado->udd_endereco; ?>" placeholder="Endereco:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="numero" value="<?php echo $resultado->udd_numero; ?>" placeholder="Número:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="bairro" value="<?php echo $resultado->udd_bairro; ?>" placeholder="Bairro:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cidade" value="<?php echo $resultado->udd_cidade; ?>" placeholder="Cidade:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="uf" value="<?php echo $resultado->udd_uf; ?>" placeholder="UF:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="dataCria" value="<?php echo $resultado->udd_dataCria; ?>" placeholder="Criada em:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="certifica" value="<?php echo $resultado->udd_certificacao; ?>" placeholder="Certificação:" />
			</div>
			<input type="hidden" name="id" value="<?php echo $resultado->udd_id; ?>">
			<br />
			<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">					
		</form>

		<?php }else{ ?>

<!--Cadastro-->
		<form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i>Unidade</span>
				<input type="text" name="unidade" placeholder="Unidade:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>Tipo</span>
				<input type="text" name="tipo" placeholder="Tipo:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>Cnes</span>
				<input type="text" name="cnes" placeholder="Cnes:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>Territorio</span>
				<input type="text" name="territorio" placeholder="Territorio:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>Cep</span>
				<input type="text" name="cep" placeholder="Cep:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>Endereço</span>
				<input type="text" name="endereco" placeholder="Endereço:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>Número</span>
				<input type="text" name="numero" placeholder="Número:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>Bairro</span>
				<input type="text" name="bairro" placeholder="Bairro:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>Cidade</span>
				<input type="text" name="cidade" placeholder="Cidade:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>UF</span>
				<input type="text" name="uf" placeholder="UF:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>Data de Criação</span>
				<input type="date" name="dataCria" placeholder="Data de Criação:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>Certificação</span>
				<input type="text" name="certifica" placeholder="Certificação:" />
			</div>
			<br />
			<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">					
		</form>

		<?php } ?>

		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>#</th>
					<th>Nome:</th>
					<th>Cnes:</th>
					<th>Ações:</th>
				</tr>
			</thead>
			
			<?php foreach($unidades->findAll() as $key => $value): ?>

			<tbody>
				<tr>
					<td><?php echo $value->udd_id; ?></td>
					<td><?php echo $value->udd_tipo." ".$value->udd_nome; ?></td>
					<td><?php echo $value->udd_cnes; ?></td>
					<td>
						<?php echo "<a href='telaUnidade.php?acao=editar&id=" . $value->udd_id . "'>Editar</a>"; ?>
						<?php echo "<a href='telaUnidade.php?acao=deletar&id=" . $value->udd_id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
					</td>
				</tr>
			</tbody>

			<?php endforeach; ?>

		</table>

	</div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>