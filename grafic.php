<?php       
 //se exister um cookie então ele pode acessar o site
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
			<p>Gráfico</p>
		</header>

		<nav class="menu" id="principal" onmouseleave="menuLeave()">
			<ul>
				<li><a href="#"><?php echo $_COOKIE['nomeUsuario']?></a></li>
				<li><a href="#">Configurações</a></li>
				<li><a href="login.php">Sair</a></li>
			</ul>
		</nav>

		<div id="page">
			<?php
				$connection = mysqli_connect('localhost','root','root','saveMoney') or trigger_error(mysql_error());
				$idUsuario = $_COOKIE["idUsuario"];			
				$sqlCommand = "select * from despesa where idUsuario = $idUsuario";

				$query = mysqli_query($connection,$sqlCommand);
				 
				for($i = 0;$i<=mysqli_num_rows($query);$i++)
				{
					$result = mysqli_fetch_assoc($query);

					$nomeDespesa = $result['nomeDespesa'];
					$valorDespesa = $result['valorDespesa'];
					$vencDespesa = $result['vencDespesa'];
					$qtdParcelas = $result['qtdParcelas'];
					$tipoDespesa = $result['tipoDespesa'];

					$date = date("d");

					?>
					<p><?php  echo $nomeDespesa?></p>
					<p><?php  echo $valorDespesa?></p>
					<!--Imprime em azul se a parcela não estiver vencida
					imprime em vermelho se estiver no dia de vencimento-->
					<p style="color:<?php if($vencDespesa == $date)
						{
							echo "red";
						}
						else
						{
							echo "blue";
						}
						?>;"><?php  echo $vencDespesa?></p>
					<p><?php  echo $qtdParcelas?></p>
					<p><?php  echo $tipoDespesa?></p>
					<?php
					}
 			?>
		</div>

		<div id="bottom">
			<a href="expenses.php"><img src="iconmoney.png"></a>
			<a href="index.php"><img src="iconhome.png"></a>
			<a href="grafic.php"><img src="icongrafic.png"></a>
		</div>

	</section>
</body>
</html>

