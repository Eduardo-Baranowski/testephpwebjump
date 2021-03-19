<?php
include('conexao_bd.php');
require_once('categoria_bd.php');
require_once('log.php');


$category_name = $_POST['category_name'];
$category_code = $_POST['category_code'];

$category_name = mysqli_real_escape_string($conexao, $category_name);
$category_code = mysqli_real_escape_string($conexao, $category_code);

if(insereCategoria($conexao, $category_name, $category_code)) {
    ?><p class="alert alert-success">Categoria <?=$category_name?> foi adicionada com sucesso!</p><?php
} else {
    $msg = mysqli_error($conexao);
    ?><p class="alert alert-danger">A categoria <?=$category_name?> não foi adicionado:<br>	<?=$msg?></p><?php
}

$mensagem = "Executando inserção de categoria!";

if(salvaLog($conexao, $mensagem)) {
    //
} else {
    $msg = mysqli_error($conexao);
    ?><p class="alert alert-danger">Erro de log:<br>	<?=$msg?></p><?php
}

mysqli_close($conexao);
?>