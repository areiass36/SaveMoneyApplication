<?php       

	if($_COOKIE["idUsuario"] == "" || $_COOKIE["idUsuario"] == null)
	{
		header("Location: login.php"); exit;
	}
	else
	{
		
	}
  
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="script.js"></script>
	<title>Money++</title>     
</head>
<body>
	<section>

		<header>
			<label  class="menu-icon" onmouseover="menuOpen()">&#9776</label>
			<p>Despesasl</p>
		</header>

		</div>

		<nav class="menu" id="principal" onmouseleave="menuLeave()">
			<ul>
				<li><a href="#"><?php echo $_COOKIE['nomeUsuario']?></a></li>
				<li><a href="#">Configurações</a></li>
				<li><a href="login.php">Sair</a></li>
			</ul>
		</nav>

		<div id="page">
            <form action="criarDespesa.php" method="POST">
            	<p>nome<input type="text" name="nomeDespesa"></p>
            	<p>valor<input type="text" name="valorDespesa"></p>
            	<p>vencimento<input type="text" name="vencimentoDespesa"></p>
            	<p>quantidade<input type="text" name="quantidadeParcelas"></p>
                <p>tipo<input type="text" name="tipoDespesa"></p>
            	<p><input type="submit" value="Criar"></p>
            </form>                                                                      
		</div>

		<div id="bottom">
			<a href="expenses.php"><img src="iconmoney.png"></a>
			<a href="index.php"><img src="iconhome.png"></a>
            <a href="grafic.php"><img src="icongrafic.png"></a>
		</div>

	</section>
</body>
</html>

