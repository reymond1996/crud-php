<?php
header('content-type:text/html;charset=utf-8');

$servidor = 'localhost';
$usuario = 'root';
$senha = 'deskserve';
$banco = 'DB_CRUD';

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conn) {
    echo "Erro ao conectar com o banco";
} //else {
    //echo "sucesso na conexão";
//}
