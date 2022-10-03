<?php


$dbhost = "172.17.0.1";
$dbUsername = "root";
$dbPassword = "root";
$dbname = "convidados";
$port = "3336";








$conexao = new mysqli($dbhost,$dbUsername,$dbPassword,$dbname,$port);

if($conexao ->connect_errno){
    echo "falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_erro;
}else{

    echo"conectado com sucesso";

}
?>