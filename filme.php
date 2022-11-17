<?php
include 'conecta.php';

//Cria a consulta sql
$consulta = "select * from filme";

//Traz a lista completa dos dados
$lista = $pdo->query($consultaSql);

//Separa os dados em linhas
$linha = $lista->fetch();
$num_row = $lista->rowCount();

// echo'A consulta retornou <strong>'.$num_linhas.'</strong> filmes <br><br>';

// do {
//     echo $linha['titulo'].'-'.$linha['lancamento'].'<br>';
// } while ($linha = $lista->fetch());

if (isset($_POST['enviar'])) //Inserir ou Alterar
{
    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    $lancamento = $_POST['lancamento'];
    $origem = $_POST['origem'];
    $duracao = $_POST['duracao'];
    $preco = $_POST['preco'];
    $cod_classificacao = $_POST['cod-classificacao'];
    $consulta = "insert filme (titulo,sinopse,lancamento,origem,duracao,preco,cod-classificacao) values ('$titulo','$sinopse','$lancamento','$origem','$duracao','$preco','$cod_classificacao')";
    $resultado = $pdo->query($consulta);
    $_POST['enviar'] = null;
    header('location: filme.php');
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes <?php echo $num_linhas ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="formulario">
        <form action="#" method="post">
            <div hidden>
                <label for="cod-filme">
                    Código
                    <input type="text" name="cod-cliente">
                </label>
            </div>
            <div>
                <br>
                <label for="titulo">
                    Título
                    <input type="text" name="titulo" required>
                </label>
            </div>
            <div>
                <label for="sinopse">
                    Sinopse
                    <input type="text" name="sinopse" required>
                </label>
            </div>
            <div>
                <label for="lancamento">
                     Lançamento
                    <input type="number" name="lancamento" required>
                </label>
            </div>
            <div>
                <label for="origem">
                    País de Origem
                    <input type="text" name="origem" required>
                </label>
            </div>
            <div>
                <label for="duracao">
                    Duração
                    <input type="text" name="duracao" required>
                </label>
            </div>
            <div>
                <label for="preco">
                    Preço
                    <input type="text" name="preco" required>
                </label>
            </div>
            <div>
                <label for="cod-classificacao">
                    Classificação
                    <input type="text" name="cod-classificacao" required>
                </label>
            </div>
            <div>
                <button type="submit" name="enviar">Enviar</button>
              </div>
        </form>
    </section>
    <br><br>
    <table>
        <thead>
            <th>ID</th>
            <th>Título</th>
            <th>Sinopse</th>
            <th>Lançamento</th>
            <th>País de Origem</th>
            <th>Duração</th>
            <th>Preço</th>
            <th>Classificação</th>
        </thead>
        <tbody>
            <?php do { ?>
                <tr>
                    <td><?php echo $row['cod_filme'];?></td>
                    <td><?php echo $row['titulo'];?></td>
                    <td><?php echo $row['sinopse'];?> </td>
                    <td><?php echo $row['lancamento'];?></td>
                    <td><?php echo $row['pais_origem'];?></td>
                    <td><?php echo $row['duracao'];?></td>
                    <td><?php echo $row['preco'];?></td>
                    <td><?php echo $row['cod_classificacao'];?></td>
                </tr>
            <?php } while ($linha = $lista->fetch()); ?>
        </tbody>
    </table>
</body>
</html>
