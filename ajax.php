<html>
	<head>
		<title>Exemplo de PHP com AJAX</title>
	</head>
	<body>
		<script language="javascript" type="text/javascript">
			<!--
			function getHTTPObject(){
				if (window.ActiveXObject){
					return new ActiveXObject("Microsoft.XMLHTTP"); // IE
				}
				else if (window.XHttpRequest) {
					return new XMLHttpRequest(); // Outros Navegadores
				}
				else {
					alert ("Seu navegador não suporta AJAX.");
					return null;
				}
			}

			function resultado(){
				if (httpObject.readyState == 4){
					document.getElementById('retorno').value = httObject.responseText;
				}
			}

			function envia(){
				httpObject = getHTTPObject();
				if (httpObject != null){
					httpObject.open("GET", "maiuscula.php?entrada="+document.getElementById('entrada').value, true);
					httpObject.send(null);
					httpObject.onreadystatechange = resultado;
				}
			}
			var httpObject = null;
				//-->
		</script>
		<form name="teste_ajax">
			Digite o texto que deseja converter para maiúsculo: <input type="text" onkeyup="envia()" name="entrada" />
			Resultado: <input type="text" name="retorno" id="retorno" />
		</form>
	</body>
</html>
