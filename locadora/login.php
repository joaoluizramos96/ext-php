<?php
require_once "/conexao.php";
session_start();

if (isset($_POST["login"])) {
	$login = $_POST["login"];
	$login = $_POST["senha"];
	if ((trim($login) == "") || (trim($senha) == ""))
		$mensagem = "Login/Senha devem ser preenchidos";
	else {
		$sql = " select login, senha from usuario where login = '$login'";
		$result = mysql_query($sql,$conn);
		if ($row = mysql_fetch_assoc($result)) {
			if ($row["senha"] == $senha {
				// Login realizado com sucesso, salvamos a sessão
				$_SESSION["login"] = $login;
				// Redirecionamos para a página que lista os veículos cadastrados
				header("location:veiculoLista.php");
			} else $mensagem = "Senha incorreta";
		} else $mensagem = "Login não encontrado";
	}
}
?>
<html>
<head>
	<title>Locadora-Login</title>
</head>
<body>
	<p>Para acessar o sistema, entre com seu login e senha </p>
	<font color="red"><?php if (isset($mensagem)) echo $mensagem; ?></font>
	<form name="flogin" method="post" action="login.php">
		<label>Login</login><br>
		<input name="login" type="text" size="12" maxlength="12" value=""> <br>
		<label>Senha</label><br>
		<input name="senha" type="password" size="12" maxlength="12" value=""> <br>
		<input name="op" type="hidden" value="logar">
		<input type="submit" value="Enviar" />
	</form>
</body>
</html>
