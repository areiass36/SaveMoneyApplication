<?php
	//GET e POST em memória de Ulisses
	if(empty($_COOKIE['idUsuario']))
	{
		header("Location: login.php"); exit;
	}
	else
	{
		$idUsuario = $_COOKIE['idUsuario'];
	}
?>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/investimentos.css">
		<script type="text/javascript" src="script/script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
		<title>Save Money</title>
	</head>
	<body>
		<section>
		<header>
				<label class="menu-icon" onclick="menuOpen()"><i id="barras" class="fas fa-bars"></i></label>
				<nav class="menu" id="principal" onmouseleave="menuLeave()">
					<div id="content-menu">
						<i class="fas fa-user-circle fa-6x"></i>
						<p><?php echo $_COOKIE['nomeUsuario']?></p>
					</div>
					<ul>
						<li><a href="#"><i class="fas fa-cog"></i>Configuraçes</a></li>
						<li><a href="login.php"><i class="fas fa-sign-out-alt"></i>Sair</a></li>
					</ul>
				</nav>
				<div id="titulo">
					<h1>Investimentos</h1>
				</div>
				<div id="menu-mobile">
					<ul>
						<li><a href="login.php"><i class="fas fa-sign-out-alt"></i></a></li>
						<li><a href="#"><i class="fas fa-cog"></i></a></li>
					</ul>
				</div>
			</header>

			<article>
				<div class="container">
					<div class="box">
						<?php
							include 'connection.php';
							
							$sqlCommand = "select * from usuario where idUsuario = $idUsuario";

							$query = mysqli_query($connection,$sqlCommand);

							$result = mysqli_fetch_assoc($query);

						?>
						<form class="form-pesquisas" method="POST" action="buscarDica.php">
							<input id="inserir-valores" type="text" placeholder="Pesquisar" name="busca">
							<button id="btn-pesquisar" type="submit"><i class="fas fa-search"></i></button>
						</form>
						<?php
							if(empty($_COOKIE['busca']))
							{
								$sqlCommand = "select * from dica order by dataPostagem desc limit 5";
							}
							else
							{
								$busca = $_COOKIE['busca'];
								$sqlCommand = "select * from dica where tituloDica like '%$busca%'";								
							}
							
							unset($_COOKIE['busca']);
							$query = mysqli_query($connection,$sqlCommand);

						?>
						<div id="container-investimentos">
							<?php
								if($result['escritor'] == 's')
								{
									?><p id="dica">Crie uma nova <a href="dica.php">dica</a> para seus leitores</p><br><?php
								}
								?>
								<div class="materias-investimentos">
										<?php

										if(mysqli_num_rows($query)>=1)
										{
											for($i=1;$i<=mysqli_num_rows($query);$i++)
											{
												$result = mysqli_fetch_assoc($query);

												$idDica = $result['idDica'];
												$tituloDica = $result['tituloDica'];
												$conteudoDica = substr($result['conteudoDica'],0,300);
												$dataPostagem = date('d/m/Y',strtotime($result['dataPostagem']));

									?>
									<div class="dica">
										<h1><?php echo $tituloDica?></h1>
										<p><?php echo $conteudoDica?>...</p>
										<p style="margin-top: 10px"><?php echo $dataPostagem?></p>
										<form method="get" action="lerDica.php">
										<p style="display: none"><input name="idDica" value="<?php echo $idDica?>"></p>
										<p><button type="submit"><i class="fas fa-book-open"></i></button></p>
										</form>
									</div>

								<?php
										}
									}
									else
									{
										echo "Não há matérias para ler!";						
									}
								?>
							</div>	
						</div>
					</div>
				</div>
			</article>                                        
			<footer>
				<ul>
					<li><a href="investimentos.php"><i class="fas fa-signal fa-3x"></i><p>Investimentos</p></a></li>
					<li><a href="index.php"><i class="far fa-calendar-alt fa-3x"></i><p>Despesas</p></a></li>
					<li><a href="metas.php"><i class="far fa-calendar-check fa-3x"></i><p>Metas</p></a></li>
				</ul>
			</footer>
		</section>
	</body>
</html>


