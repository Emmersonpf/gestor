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
	
		$profissionais= new Profissionais();	

		if(isset($_POST['cadastrar'])):

			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$datanasc = $_POST['datanasc'];
			$cns = $_POST['cns'];
			$endereco = $_POST['endereco'];
			$numero = $_POST['numero'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$uf = $_POST['uf'];
			$cep = $_POST['cep'];
			$fone = $_POST['fone'];
			$email = $_POST['email'];
			$dataadmin = $_POST['dataadmin'];
			$escolaridade = $_POST['escolaridade'];
			$formacao = $_POST['formacao'];
			$funcao = $_POST['funcao'];
			$conselho = $_POST['conselho'];
			$nconselho = $_POST['nconselho'];
			$cbo = $_POST['cbo'];
			$datacadastro = $_POST['datacadastro'];

			$profissionais->setNome($nome);
			$profissionais->setDatanasc($datanasc);
			$profissionais->setCpf($cpf);
			$profissionais->setCns($cns);
			$profissionais->setEndereco($endereco);
			$profissionais->setNumero($numero);
			$profissionais->setBairro($bairro);
			$profissionais->setCidade($cidade);
			$profissionais->setUf($uf);
			$profissionais->setCep($cep);
			$profissionais->setFone($fone);
			$profissionais->setEmail($email);
			$profissionais->setDataadmin($dataadmin);
			$profissionais->setEscolaridade($escolaridade);
			$profissionais->setFormacao($formacao);
			$profissionais->setFuncao($funcao);
			$profissionais->setConselho($conselho);
			$profissionais->setNconselho($nconselho);
			$profissionais->setCbo($cbo);
			$profissionais->setDatacadastro($datacadastro);


			# Insert
			if($profissionais->insert()){
				echo "Inserido com sucesso!";
			}

		endif;

		?>
		<header class="masthead">
			<h1 class="muted">GESTOR SAÚDE - MENU PROFISSIONAIS</h1>
			<nav class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li class="active"><a href="telaProfissional.php">Página inicial</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<?php 
		if(isset($_POST['atualizar'])):

			$id = $_POST['id'];
			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$datanasc = $_POST['datanasc'];
			$cns = $_POST['cns'];
			$endereco = $_POST['endereco'];
			$numero = $_POST['numero'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$uf = $_POST['uf'];
			$cep = $_POST['cep'];
			$fone = $_POST['fone'];
			$email = $_POST['email'];
			$dataadmin = $_POST['dataadmin'];
			$escolaridade = $_POST['escolaridade'];
			$formacao = $_POST['formacao'];
			$funcao = $_POST['funcao'];
			$conselho = $_POST['conselho'];
			$nconselho = $_POST['nconselho'];
			$cbo = $_POST['cbo'];
			

			$profissionais->setNome($nome);
			$profissionais->setDatanasc($datanasc);
			$profissionais->setCpf($cpf);
			$profissionais->setCns($cns);
			$profissionais->setEndereco($endereco);
			$profissionais->setNumero($numero);
			$profissionais->setBairro($bairro);
			$profissionais->setCidade($cidade);
			$profissionais->setUf($uf);
			$profissionais->setCep($cep);
			$profissionais->setFone($fone);
			$profissionais->setEmail($email);
			$profissionais->setDataadmin($dataadmin);
			$profissionais->setEscolaridade($escolaridade);
			$profissionais->setFormacao($formacao);
			$profissionais->setFuncao($funcao);
			$profissionais->setConselho($conselho);
			$profissionais->setNconselho($nconselho);
			$profissionais->setCbo($cbo);
			

			if($profissionais->update($id)){
				echo "Atualizado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($profissionais->delete($id)){
				echo "Deletado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $profissionais->find($id);
		?>
<!--Update-->
		<form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="nome" value="<?php echo $resultado->prof_nome; ?>" placeholder="Nome:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cpf" value="<?php echo $resultado->prof_cpf; ?>" placeholder="CPF:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="date" name="datanasc" value="<?php echo $resultado->prof_datanasc; ?>" placeholder="Data de Nascimento:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cns" value="<?php echo $resultado->prof_cns; ?>" placeholder="CNS:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="endereco" value="<?php echo $resultado->prof_endereco; ?>" placeholder="Endereco:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="numero" value="<?php echo $resultado->prof_numero; ?>" placeholder="Número:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="bairro" value="<?php echo $resultado->prof_bairro; ?>" placeholder="Bairro:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cidade" value="<?php echo $resultado->prof_cidade; ?>" placeholder="Cidade:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="uf" value="<?php echo $resultado->prof_uf; ?>" placeholder="UF:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cep" value="<?php echo $resultado->prof_cep; ?>" placeholder="CEP:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="fone" value="<?php echo $resultado->prof_fone; ?>" placeholder="fone:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="email" value="<?php echo $resultado->prof_email; ?>" placeholder="E-mail:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="date" name="dataadmin" value="<?php echo $resultado->prof_dataadm; ?>" placeholder="Data de Admissão:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="escolaridade" value="<?php echo $resultado->prof_escolaridade; ?>" placeholder="Escolaridade:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="formacao" value="<?php echo $resultado->prof_formacao; ?>" placeholder="Formação:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="funcao" value="<?php echo $resultado->prof_funcao; ?>" placeholder="Função:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="conselho" value="<?php echo $resultado->prof_conselho; ?>" placeholder="Conselho:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="nconselho" value="<?php echo $resultado->prof_nConselho; ?>" placeholder="Número do Conselho:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cbo" value="<?php echo $resultado->prof_cbo; ?>" placeholder="CBO:" />
			</div>
			<input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
			<br />
			<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">					
		</form>

		<?php }else{ ?>

<!--Cadastro-->
		<form method="post" action="">
						<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="nome" placeholder="Nome:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cpf" placeholder="CPF:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="date" name="datanasc" placeholder="Data de Nascimento:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cns" placeholder="CNS:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="endereco" placeholder="Endereco:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="numero" placeholder="Número:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="bairro" placeholder="Bairro:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cidade" placeholder="Cidade:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="uf" placeholder="UF:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cep" placeholder="CEP:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="fone" placeholder="fone:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="email" placeholder="E-mail:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="date" name="dataadmin" placeholder="Data de Admissão:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="escolaridade" placeholder="Escolaridade:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="formacao" placeholder="Formação:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="funcao" placeholder="Função:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="conselho" placeholder="Conselho:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="nconselho" placeholder="Número do Conselho:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="cbo" placeholder="CBO:" />
			</div>
			<input type="hidden" name="datacadastro" value="<?php echo date('Y-m-d'); ?>">
			<br />
			<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">					
		</form>

		<?php } ?>

		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>#</th>
					<th>Nome:</th>
					<th>cns:</th>
					<th>Ações:</th>
				</tr>
			</thead>
			
			<?php foreach($profissionais->findAll() as $key => $value): ?>

			<tbody>
				<tr>
					<td><?php echo $value->id; ?></td>
					<td><?php echo $value->prof_nome; ?></td>
					<td><?php echo $value->prof_cpf; ?></td>
					<td>
						<?php echo "<a href='telaProfissional.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
						<?php echo "<a href='telaProfissional.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
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