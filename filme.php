<?php
include 'conecta.php';

// cria a consulta sql
$consultaSql = "select * from vw_filme_class";

// trazer a lista completa dos dados
$lista = $pdo->query($consultaSql);
$listaArq = $pdo->query($consultaSqlArq);
$listaClass = $pdo->query("select cod_classificacao as id, classificacoes as class from classificacao");

// separar os dados em linhas
$row = $lista->fetch();
$rowArq = $listaArq->fetch();
$rowClass = $listaClass->fetch();

//Retornando o num. de linhas
$num_rows = $lista->rowCount();
$num_rows_arq = $listaArq->rowCount();



// echo 'A consulta retornou <strong>'.$num_linhas.'</strong> funcionarios <br>';
// // print_r($linha);

// do{
//     echo $linha['nome'].' - '.$linha['cpf'].'<br>';
// } while($linha = $lista->fetch());

if (isset($_POST['enviar'])) {
    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    $lancamento = $_POST['lancamento'];
    $pais_origem = $_POST['pais_origem'];
    $duracao = $_POST['duracao'];
    $preco = $_POST['preco'];
    $cod_classificacao = $_POST['class'];
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
    <section>
        <!-- Card -->
        <div class="card" style="width: 18rem;">
            <img src="images/img2.png" class="card-img-fluid" alt="...">
            <div class="card-body d-grid gap-2">
                <h5 class="card-title text-center">Inserir Filme</h5>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    ADICIONAR
                </button>
                <!-- <form action="#" method="post" class="form-control form-control-lg" >
            <div hidden>
                <label for="cod-filme">
                    Código
                    <input class="form-control" type="text" name="cod-filme">
                </label>
            </div>
            <div class="mb-3">
                <label for="titulo">
                    Titulo
                <input class="form-control" type="textarea" name="titulo" required>
                </label>
            </div>
            <div class="mb-3">
                <label for="sinopse">
                    Sinopse
                <input class="form-control" type="text" name="sinopse">
                </label>
            </div>
            <div class="mb-3">
                <label for="lancamento">
                    Lançamento
                <input class="form-control" type="text" name="lancamento" >
                </label>
            </div>
            <div class="mb-3"> 
                <label for="pais_origem">
                    País de Origem
                <input class="form-control" type="text" name="pais_origem" >
                </label>
            </div>
            <div class="mb-3">
                <label for="duracao">
                    Duração
                <input class="form-control" type="text" name="duracao" >
                </label>
            </div>
            <div class="mb-3">
                <label for="preco">
                    Preço
                <input class="form-control" type="text" name="preco">
                </label>
            </div>
            <div class="mb-3">
                <label for="cod-classificacao">
                    Classificação Indicativa
                <input class="form-control" type="text" name="cod-classificacao">
                </label>
            </div>
            <div>
                <button type="submit" class="btn btn-outline-success" name="enviar">Enviar</button>
            </div>
        </form> -->
            </div>
        </div>
    </section>
    <br><br>
    <h3 class="text-center">Tabela de Filmes</h3>
    <table class="table table-info table-striped table-hover">
        <br>
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
                    <td><?php echo $row['cod_filme']; ?></td>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo $row['sinopse']; ?></td>
                    <td><?php echo $row['lancamento']; ?></td>
                    <td><?php echo $row['pais_origem']; ?></td>
                    <td><?php echo $row['duracao']; ?></td>
                    <td><?php echo $row['preco']; ?></td>
                    <td><?php echo $row['classificacao']; ?></td>
                </tr>
            <?php } while ($row = $lista->fetch()) ?>
        </tbody>
    </table>
    <!-- Modal -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Filme</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="#" method="post" class="form-control form-control-lg">
                        <div hidden>
                            <label for="cod-filme">
                                Código
                                <input class="form-control" type="text" name="cod-filme">
                            </label>
                        </div>
                        <div class="row mb-3">
                            <label for="titulo">
                                Titulo
                                <input class="form-control" type="textarea" name="titulo" required>
                            </label>
                        </div>
                        <div class="row mb-3">
                            <label for="sinopse">
                                Sinopse
                                <input class="form-control" type="text" name="sinopse">
                            </label>
                        </div>
                        <div class="row mb-3">
                            <label for="lancamento">
                                Lançamento
                                <input class="form-control" type="text" name="lancamento">
                            </label>
                        </div>
                        <div class="row mb-3">
                            <label for="pais_origem">
                                País de Origem
                                <input class="form-control" type="text" name="pais_origem">
                            </label>
                        </div>
                        <div class="row mb-3">
                            <label for="duracao">
                                Duração
                                <input class="form-control" type="text" name="duracao">
                            </label>
                        </div>
                        <div class="row mb-3">
                            <label for="preco">
                                Preço
                                <input class="form-control" type="text" name="preco">
                            </label>
                        </div>
                        <div class="row mb-3">
                            <label for="cod-classificacao">
                                Classificação Indicativa
                                <select class="form-control" name="class" id="">
                                    <?php do { ?>
                                        <option value="<?php echo $rowClass['id'] ?>"><?php echo $rowClass['class'] ?></option>
                                    <?php } while ($rowClass = $listaClass->fetch()); ?>
                                </select>
                            </label>
                        </div>
                        <div class="row mb-3">
                            <button type="submit" name="enviar" class="btn btn-outline-success">Enviar</button>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
