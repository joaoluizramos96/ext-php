<?php
require_once "autenticacao.php";
require_once "conexao.php";

$op = "novo";
if (isset($_GET["op"])) {
	$op = "abrir";
} elseif (isset($_POST["op"])) {
	$op = $_POST["op"];
}

if (isset($_POST["excluir"])) { // EXCLUIR
	$id = $_POST["id"];
	$sql = " delete from veiculo where id = $id ";
	$result = mysql_query($sql,$conn);
	if ($result) {
		header("location:veiculoLista.php");
		exit;
	} else $mensagem = "Não foi possível excluir!";
	
} else {
	if ($op=="novo") { // NOVO
		$op = "cadastrar";
		// Inicializa variáveis
		$nome = "";
		$tipo = 1;
	} elseif ($op=="cadastrar") { // CADASTRAR
		$nome = trim($_POST["nome"]);
		$tipo = $_POST["tipo"];
		if ($nome == "") {
			$mensagem = "O campo nome deve ser preenchido";
		} else {
			$sql = "insert into veiculo (nome, tipo) values ('$nome', $tipo)";
			$result = mysql_query($sql,conn);
			if ($result) {
				header("location:veiculoLista.php");
				exit;
			} else $mensagem = "Não foi possível cadastrar. Verifique os dados!";
			}
		} elseif ($op=="abrir"( { // ABRIR
			$op = "atualizar";
			$id = $_GET["id"];
			$sql = " select nome, tipo from veiculo where id = $id";
			$result = mysql_query($sql,$conn);
			$row = mysql_fetch_assoc($result);
			extract($row) // O campo nome da tabela é extraído para variável $nome...
		} elseif ($op=="atualizar") { // ATUALIZAR
			$id = $_POST["id"];
			$nome = trim($_POST["nome"]);
			$tipo = $_POST["tipo"];
			if ($nome == "") {
				$mensagem = "O campo nome deve ser preenchido";
			} else {
				$sql = "update veiculo set nome = '$nome', tipo = $tipo ";
				$result = mysql_query($sql,$conn);
				if ($result) {
					header("location:veiculoLista.php");
					exit;
				} else $mensagem = "Não foi possível atualizar. Verifique os dados!";
			}
		}
	}
?>

<html>
<head>
	<title>Veículo - Cadastro</title>
</head>
<body>
	<p>Cadastro de veículo</p>
	<font color="red"><?php if (isset($mensagem)) echo $mensagem; ?></font>
	<form name="fveiculo" method="post" action="veiculo.php">
		<label>Nome</label><br>
		<input name="nome" type="text" value="<?php echo $nome; ?>" size="45" maxlength="45"><br>
		<label>Tipo</label>
		<select name="tipo" size=1>
			<option value="1" <?php if ($tipo==1 echo " selected"; ?>>Básico</option>
			<option value="2" <?php if ($tipo==2 echo "selected"; ?>>Básico com opcionais</option>
		</select><br>
		<?php if ($op != "cadastrar") { ?>
		<input type="checkbox" name="excluir" value="excluir">Excluir<br>
		<?php } ?>
		<?php if ($op == "atualizar") { ?>
			<input type="hidden" name="id" value="<?php echo $id ?>">
		<?php } ?>
		<input type="hidden" name="op" value="<?php echo $op ?>">
		<input type="submit" value="Enviar">
		<a href="javascript:void(null);" onclick="location.href='veiculoLista.php';">Voltar</a>
	</form>
</body>
</html>
