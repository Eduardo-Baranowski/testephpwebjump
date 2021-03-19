<?php
include('conexao_bd.php');
require_once('product_bd.php');
require_once('product_category_bd.php');
require_once('log.php');


$nome = $_POST['nome'];
$sku = $_POST['sku'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$quantidade = $_POST['quantidade'];
$cate_lista = [];
$cate = $_POST['cate_lista'];

$nome = mysqli_real_escape_string($conexao, $nome);
$sku = mysqli_real_escape_string($conexao, $sku);
$preco = mysqli_real_escape_string($conexao, $preco);
$descricao = mysqli_real_escape_string($conexao, $descricao);
$quantidade = mysqli_real_escape_string($conexao, $quantidade);

$mensagem = mysqli_real_escape_string($conexao, $mensagem);


if(insereProduto($conexao, $nome, $sku, $preco, $descricao, $quantidade)) {
    $last_id = mysqli_insert_id($conexao);

    ?><p class="alert alert-success">O produto <?=$nome?> foi adicionado com sucesso!</p><?php
} else {
    $msg = mysqli_error($conexao);
    ?><p class="alert alert-danger">O produto <?=$nome?> não foi adicionado:<br>	<?=$msg?></p><?php
}

$pk_produto = mysqli_insert_id($conexao);

foreach ($_POST['cate_lista'] as $pk_categoria)
{
    if(insereProdutoCategoria($conexao, $pk_produto, $pk_categoria)) {
        //
    } else {
        $msg = mysqli_error($conexao);
        ?><p class="alert alert-danger">Erro de associação:<br>	<?=$msg?></p><?php
    }
}

$mensagem = "Executando inserção de produto!";

if(salvaLog($conexao, $mensagem)) {
    //
} else {
    $msg = mysqli_error($conexao);
    ?><p class="alert alert-danger">Erro de log:<br>	<?=$msg?></p><?php
}

mysqli_close($conexao);
?>
