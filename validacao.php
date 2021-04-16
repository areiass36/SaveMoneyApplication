<?php
//verifica se os inputs posts estão vazios
if(empty($_POST['login']) or empty($_POST['senha']))
{
    header("Location: login.php"); 
    exit();
}

//tenta criar uma conexão com o servidor
$connection = mysqli_connect('localhost','root','root','saveMoney') or trigger_error(mysql_error());//trigger_error manda mensagem de erro caso haja uma instancia de erro
//tenta de conectar ao banco de dados
//mysqli_select_db($connection,'saveMoney') or trigger_error(mysql_error());

$login = $_POST['login'];
$senha = $_POST['senha'];

//validação de senha e usuario
$sqlCommand = "select * from usuario where loginUsuario = '$login' and senhaUsuario = '$senha'";
$query = mysqli_query($connection,$sqlCommand);
//verifica se o login e senha correspondem aos do banco

if(mysqli_num_rows($query) != 1)
{
    header("Location: login.php");
    exit();
}
else 
{
    $result = mysqli_fetch_assoc($query);
    
    //salva os dados dentro de um cookie
    setcookie("idUsuario",$result['idUsuario']);
    setcookie("nomeUsuario",$result['nomeUsuario']);
    
    header("Location: index.php");
    exit();
}
