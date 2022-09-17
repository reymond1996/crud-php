<?php
// adicionar o arquivo de conexao
include_once 'conexao.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['txtnome'];
    $email = $_POST['txtemail'];
    $telefone = $_POST['txttelefone'];

    //update
    $result = mysqli_query($conn, "UPDATE usuarios set nome='$nome',email='$email',celular='$telefone' where id='$id'");
    if ($result) {
        header('location:index.php');
    }
}


?>

<?php


$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM usuarios WHERE id ='$id'");
//trabalhar o resultado em forma de array

while ($dados = mysqli_fetch_array($result)) {
    $nome = $dados['nome'];
    $email = $dados['email'];
    $telefone = $dados['celular'];
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            width: 200px;
            display: flex;
            margin: auto;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <form action="edit.php" method="post">
        <table border="0">
            <tr>
                <td>Nome</td>
                <td><input type="text" name="txtnome" value=<?php echo $nome; ?>></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="text" name="txtemail" value=<?php echo $email; ?>></td>
            </tr>

            <tr>
                <td>Telefone</td>
                <td><input type="text" name="txttelefone" value=<?php echo $telefone; ?>></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Alterar"></td>
            </tr>
        </table>
    </form>
</body>

</html>