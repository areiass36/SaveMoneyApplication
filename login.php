<?php

setcookie("idUsuario","");
setcookie("nomeUsuario","");

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="script.js"></script>
	<title>Money++</title>
</head>
<body background="imgwall0.jpg">
	<section>

		<div id="login">
			<form action="validacao.php" method="POST">
				<h1>Money++</h1>
				<p>Login:</p>
				<p><input type="text" name="login"></p>
				<p>Senha:</p>
				<p><input type="password" name="senha"></p>
				<p><input type="submit" name="entrar" value="Entrar"></p>
			</form>
		</div>

	</section>
</body>
</html>

