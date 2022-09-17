<?php
//usar o arquivo de conexao
include_once 'conexao.php';
/*guardar em uma variavel o select da tabela usuario
//funcao que recebe dois sendo os parametros da conexao  ($conn,query($result)) 
mysqli_query
*/
$result = mysqli_query($conn, "SELECT * FROM usuarios");

// se colocar isso fica na ordem {order by nome} na frente de usuarios


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Sistema CRUD</title>
</head>

<body>
    <?php
    include_once 'conexao.php';
    $parametro = filter_input(INPUT_GET, 'parametro');
    if ($parametro) {
        $result = mysqli_query($conn, "SELECT * FROM usuarios where nome like '%$parametro%'");
    } else {
        $result = mysqli_query($conn, "SELECT * FROM usuarios");
    }
    ?>


    <p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="parametro">
        <input type="submit" value="Busca">
    </form>
    </p>


    <a href="adicionar.php">Adicionar novo usuário</a>
    <!-- Adicionar uma tabela -->
    <table border="1" width="70%">
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Telefone</td>
            <td colspan="2" align="center">Ações</td>
        </tr>
        <!-- Listar os dados da tabela -->
        <?php
        //estrutura de laço - while
        //funcao de array -
        while ($dados = mysqli_fetch_array($result)) {
            //segunda linha da tabela

            echo "<tr>";
            echo "<td>" . $dados['id'] . "</td>";
            echo "<td>" . $dados['nome'] . "</td>";
            echo "<td>" . $dados['email'] . "</td>";
            echo "<td>" . $dados['celular'] . "</td>";
            echo "<td> <a href='edit.php?id=$dados[id]'><i class='fa fa-pencil-square-o fa-1x' aria-hidden='true'></i></a>" . "</td>";
            echo "<td> <a href='delete.php?id=$dados[id]'><i class='fa fa-trash fa-1x' aria-hidden='true'></i></a>" . "</td>";

            echo "</tr>";
        };

        ?>
    </table>






</body>

</html>