<?php

$connection = mysqli_connect('localhost','root','root','saveMoney') or trigger_error(mysql_error());

$nomeDespesa = $_POST['nomeDespesa'];
$valorDespesa = $_POST['valorDespesa'];
$vencimentoDespesa = $_POST['vencimentoDespesa'];
$quantidadeParcelas = $_POST['quantidadeParcelas'];
$tipoDespesa = $_POST['tipoDespesa'];
$idUsuario = $_COOKIE['idUsuario'];

$sqlCommand = "insert into despesa values(null,'$nomeDespesa',$valorDespesa,$vencimentoDespesa,$quantidadeParcelas,$tipoDespesa,$idUsuario)";

$query = mysqli_query($connection,$sqlCommand);

header("Location: expenses.php");

?>

