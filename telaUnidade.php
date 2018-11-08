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
	
		$unidade = new Unidades();	

		if(isset($_POST['cadastrar'])):

			$nome  = $_POST['nome'];
			$email = $_POST['email'];

			$unidade->setNome($nome);
			$unidade->setEmail($email);

			# Insert
			if($unidade->insert()){
				echo "Inserido com sucesso!";
			}

		endif;

		?>
		<header class="masthead">
			<h1 class="muted">PHP OO</h1>
			<nav class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li class="active"><a href="index.php">Página inicial</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<?php 
		if(isset($_POST['atualizar'])):

			$id = $_POST['id'];
			$nome = $_POST['nome'];
			$email = $_POST['email'];

			$unidade->setNome($nome);
			$unidade->setEmail($email);

			if($unidade->update($id)){
				echo "Atualizado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($unidade->delete($id)){
				echo "Deletado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $unidade->find($id);
		?>

		<form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Nome:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="email" value="<?php echo $resultado->email; ?>" placeholder="E-mail:" />
			</div>
			<input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
			<br />
			<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">					
		</form>

		<?php }else{ ?>


		<form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="nome" placeholder="Nome:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="email" placeholder="E-mail:" />
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
					<th>E-mail:</th>
					<th>Ações:</th>
				</tr>
			</thead>
			
			<?php foreach($unidade->findAll() as $key => $value): ?>

			<tbody>
				<tr>
					<td><?php echo $value->udd_id; ?></td>
					<td><?php echo $value->udd_nome; ?></td>
					<td><?php echo $value->udd_cnes; ?></td>
					<td>
						<?php echo "<a href='telaUnidade.php?acao=editar&id=" . $value->udd_id . "'>Editar</a>"; ?>
						<?php echo "<a href='index.php?acao=deletar&id=" . $value->udd_id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
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