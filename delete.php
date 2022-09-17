<?php
include_once 'conexao.php';
$id = $_GET['id'];
//criar uma query para deleção do registro

$result = mysqli_query($conn, "DELETE FROM usuarios where id =$id");

if (!$result) {
    echo "Error, ao eliminar o registro " . $id;
} else {
    header('location: index.php');
}
