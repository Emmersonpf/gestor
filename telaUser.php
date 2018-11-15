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
  <meta name="description" content="GESTOR SAÚDE" />
  <meta name="robots" content="index, follow" />
   <meta name="author" content="Emmerson Pereira Ferreira"/>
   <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" />
  <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>
<body>

	<div class="container">

		<?php
	
		$usuarios= new Usuarios();	

		if(isset($_POST['cadastrar'])):

			$profissional = $_POST['profissional'];
			$login = $_POST['login'];
			$senha = $_POST['senha'];
			$perfil = $_POST['perfil'];
			$permissao = $_POST['permissao'];
			$datacriado = $_POST['datacriado'];
			$criou = $_POST['criou'];

			$usuarios->setProfissional($profissional);
			$usuarios->setLogin($login);
			$usuarios->setSenha($senha);
			$usuarios->setPerfil($perfil);
			$usuarios->setPermissao($permissao);
			$usuarios->setCriou($criou);
			$usuarios->setDatacriado($datacriado);

			# Insert
			if($usuarios->insert()){
				echo "Inserido com sucesso!";
			}

		endif;

		?>
		<header class="masthead">
			<h1 class="muted">GESTOR SAÚDE - MENU Usuários</h1>
			<nav class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li class="active"><a href="telaUser.php">Página inicial</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<?php 
		if(isset($_POST['atualizar'])):

			$id = $_POST['id'];
			$profissional = $_POST['profissional'];
			$login = $_POST['login'];
			$senha = $_POST['senha'];
			$perfil = $_POST['perfil'];
			$permissao = $_POST['permissao'];
			$criou = $_POST['criou'];

			$usuarios->setprofissional($profissional);
			$usuarios->setlogin($login);
			$usuarios->setsenha($senha);
			$usuarios->setperfil($perfil);
			$usuarios->setpermissao($permissao);
			$usuarios->setcriou($criou);

			if($usuarios->update($id)){
				echo "Atualizado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($usuarios->delete($id)){
				echo "Deletado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $usuarios->find($id);
		?>
<!--Update-->
		<form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="profissional" value="<?php echo $resultado->user_profissional; ?>" placeholder="profissional:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="login" value="<?php echo $resultado->user_login; ?>" placeholder="login:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="senha" value="<?php echo $resultado->user_senha; ?>" placeholder="senha:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="perfil" value="<?php echo $resultado->user_perfil; ?>" placeholder="perfil:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="permissao" value="<?php echo $resultado->user_permissao; ?>" placeholder="permissao:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="criou" value="<?php echo $resultado->user_criou; ?>" placeholder="criou:" />
			</div>
			<input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
			<br />
			<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">					
		</form>

		<?php }else{ ?>

<!--Cadastro-->
		<form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i>profissional</span>
				<input type="text" name="profissional" placeholder="profissional:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>login</span>
				<input type="text" name="login" placeholder="login:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>senha</span>
				<input type="password" name="senha" placeholder="senha:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>perfil</span>
				<input type="text" name="perfil" placeholder="perfil:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i>permissao</span>
				<input type="text" name="permissao" placeholder="permissao:" />
			</div>
			<input type="hidden" name="criou" value="<?php echo '1'; ?>">
			<input type="hidden" name="datacriado" value="<?php echo date('Y-m-d'); ?>">
			<br />
			<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">					
		</form>

		<?php } ?>

		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>#</th>
					<th>Nome:</th>
					<th>senha:</th>
					<th>Ações:</th>
				</tr>
			</thead>
			
			<?php foreach($usuarios->findAll() as $key => $value): ?>

			<tbody>
				<tr>
					<td><?php echo $value->id; ?></td>
					<td><?php echo $value->user_login; ?></td>
					<td><?php echo $value->user_senha; ?></td>
					<td>
						<?php echo "<a href='telaUser.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
						<?php echo "<a href='telaUser.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
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