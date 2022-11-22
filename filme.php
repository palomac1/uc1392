<?php 
include 'conecta.php';

// cria a consulta sql
$consultaSql = "select * from filme";

// trazer a lista completa dos dados
$lista = $pdo->query($consultaSql);

// separar os dados em linhas
$row = $lista->fetch();
$num_rows = $lista->rowCount();

// echo 'A consulta retornou <strong>'.$num_linhas.'</strong> funcionarios <br>';
// // print_r($linha);

// do{
//     echo $linha['nome'].' - '.$linha['cpf'].'<br>';
// } while($linha = $lista->fetch());

if(isset($_POST['enviar']))
{
    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    $lancamento = $_POST['lancamento'];
    $pais_origem = $_POST['pais_origem'];
    $duracao = $_POST['duracao'];
    $preco = $_POST['preco'];
    $cod_classificacao = $_POST['cod-classificacao'];
    $consulta = "insert filme (titulo,sinopse,lancamento,pais_origem, duracao,preco,cod_classificacao) values ('$titulo','$sinopse','$lancamento','$pais_origem','$duracao','$preco','$cod_classificacao')";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Filmes</title>
</head>
<body>
    <br>
    <section class="formulario">
        <form action="#" method="post" class="form-control form-control-lg" >
            <div hidden>
                <label for="cod-filme">
                    Código
                    <input type="text" name="cod-filme">
                </label>
            </div>
            <div class="mb-3">
                <label for="titulo">
                    Titulo
                <input type="textarea" name="titulo" required>
                </label>
            </div>
            <div class="mb-3">
                <label for="sinopse">
                    Sinopse
                <input type="text" name="sinopse">
                </label>
            </div>
            <div class="mb-3">
                <label for="lancamento">
                    Lançamento
                <input type="text" name="lancamento">
                </label>
            </div>
            <div class="mb-3"> 
                <label for="pais_origem">
                    País de Origem
                <input type="text" name="pais_origem">
                </label>
            </div>
            <div class="mb-3">
                <label for="duracao">
                    Duração
                <input type="text" name="duracao">
                </label>
            </div>
            <div class="mb-3">
                <label for="preco">
                    Preço
                <input type="text" name="preco">
                </label>
            </div>
            <div class="mb-3">
                <label for="cod-classificacao">
                    Classificação Indicativa
                <input type="text" name="cod-classificacao">
                </label>
            </div>
            <div>
                <button type="submit" class="btn btn-outline-success" name="enviar">Enviar</button>
            </div>
        </form>
    </section>
    <br>
    <h3>Tabela de Filmes</h3>
    <table>
        <br><br>
        <thead>
            <th>Cod</th>
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
                    <td><?php echo $row['sinopse'];?></td>
                    <td><?php echo $row['lancamento'];?></td>
                    <td><?php echo $row['pais_origem'];?></td>
                    <td><?php echo $row['duracao'];?></td>
                    <td><?php echo $row['preco'];?></td>
                    <td><?php echo $row['cod_classificacao'];?></td>
                </tr>
            <?php } while ($row = $lista->fetch())?>
        </tbody>
    </table>
</body>
</html>