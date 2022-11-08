<?php
include('config.php');
include('funcoes.php');

// "/* */" //Comentário de bloco
// "//" Comentário de linha
// "#" Estrutura de decisão

// echo parcelar(10,4); //

// Início - Declaração de variáveis
// date_default_timezone_set('America/Sao_Paulo');
// $nome = "Paloma";
// $data_nasc = date('2003/06/08');
// echo($nome." - ".$data_nasc);
// echo('<br>');
// $hoje = date ('D, d M, Y - H:i:s');
// echo($hoje);
// echo('<br>');

/* $date = date_create('2000-01-01', timezone_open('America/Sao_Paulo'));
echo date_format($date, 'Y-m-d H:i:sP') . "\n";
echo('<br>');

date_timezone_set($date, timezone_open('Pacific/Chatham'));
echo date_format($date, 'Y-m-d H:i:sP') . "\n"; */

// $valor = 79.99;
// $idade = 19;
// $teste = true;

// Final - Declaração de variáveis

// Início - Declaração de uso de matrizes

//  1º Matriz Associada:
// echo('<br>');
// $alunos = array();
// $alunos[0] = "Eduardo";
// $alunos[1] = "Ellen";
// $alunos[1] = "Helen";
// $nota = array(9,8,7,4);
// print_r($nota);
// echo('<br>');
// $pontos = array('José' => '11', 'Lucas' => '5', 'Jean' => '9');
// print_r($pontos);
// echo('<br>');

// Final - Declaração de uso de matrizes

// Início - Estrutura de decisão
// echo('<br>');
// if(!($idade>=30)){ //Se vedadeiro então
//     echo("Aluno em lista de classificação");
// }

// echo('<br>');
// $a = 1; $b = 15;
// if($a > $b){
//     echo("A variável '$a' é a maior que '$b'");
// }elseif($a < $b){
//     echo("A variável '$a' é menor que '$b'");
// }else{
//     echo("A variável '$a' é igual a '$b'");
// }
// echo('<br>');
// $n = 9;

// Final - Estrutura de decisão

//Estruturas de repetição
//While: quando não se conhece o limite(quantas vezes será executado)
// echo('<br>');
// while($a <= 10){
//     echo($n. ' x '.$a." = ".($a*$n). "<br>");
//     $a = $a +1;
// }
// echo("<br>");
// for ($i=1; $i < 11; $i++) {
//     echo($n.' x '.$i." = ".($i*$n)."<br>");
//     $nota = array(9,8,7,4);

// } echo("<br>");
// for ($i=0; $i < 4; $i++) {
//     echo($nota[$i]);
//     echo("<br>");
// }

// echo("<br>");
// echo("<br>");

// Final - Estruturas de repetição

// Início2 - Declaração de uso de matrizes
echo("<br>");
$pessoas = array(
    '4567WE'=>(['Well','Professor']),
    '8910PA'=>(['Paloma','Castro']),
    '1112EL'=>(['Ellen','Vieira']), 
    '1314HE'=>(['Helen','Targino'])
);

if (isset($_POST['enviar'])){ //Se o usuário clicar no botão
    $id_frm = $_POST['id'];
    $nome_frm = $_POST['nome'];
    $sobrenome_frm = $_POST['sobrenome'];
    $pessoas += [$id_frm => ([$nome_frm, $sobrenome_frm])];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <!-- <meta http-equiv="refresh" content = "1"> -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <form action="aula4.php" method="post">
            <button type="submit">Parcelamento</button>
            <br>
            <hr>
        </form>
        <form action="#" method="post">
            <label for="id">
                Id
                <input type="text"  name="id" placeholder="Entre com o ID" required >
            </label><br>
            <label for="nome">
                Nome
                <input type="text" name="nome" required >
            </label><br>
            <label for="descricao">
               Sobrenome
                <input type="text" name="sobrenome" >
            </label><br>
            <button type="submit" name="enviar" id="btn-enviar" >Enviar</button>
        </form>

        <table class="tabelinha">
            <th>Id</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <tr>
                <td>0123NA</td>
                <td>Nathalia</td>
                <td>Barros</td>
            </tr>
            <?php
                foreach ($pessoas as $id => $nome) { ?>
                <tr>
                    <td><?php echo($id);?></td>
                    <td><?php echo($nome[0]);?></td>
                    <td><?php echo($nome[1]);?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
