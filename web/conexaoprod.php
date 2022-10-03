<?php

$dbhost = "mysql.franciscoecarolina.com.br";
$dbUsername = "franciscoecaro";
$dbPassword = "kKWbsvzS4LX4m4v";
$dbname = "franciscoecaro";
$port = "3306";


$conexao = new mysqli($dbhost,$dbUsername,$dbPassword,$dbname,$port);

/*if($conexao ->connect_errno){
    echo "falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_erro;
}else{

    echo"conectado com sucesso";

}*/
?>