<?php

/*
$dbhost = "172.17.0.1";
$dbUsername = "binar";
$dbPassword = "guaracy";
$dbname = "convidados";
$port = "3336";


*/


$dbhost = "mysql.franciscoecarolina.com.br";
$dbUsername = "franciscoecaro";
$dbPassword = "kKWbsvzS4LX4m4v";
$dbname = "franciscoecaro";



$conexao = new mysqli($dbhost,$dbUsername,$dbPassword,$dbname);

/*if($conexao ->connect_errno){
    echo "falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_erro;
}else{

    echo"conectado com sucesso";

}*/
?>
