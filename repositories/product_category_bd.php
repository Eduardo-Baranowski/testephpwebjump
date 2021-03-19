<?php
require_once('conexao_bd.php');

function insereProdutoCategoria($conexao, $pk_produto, $pk_categoria) {
    $pk_produto = mysqli_real_escape_string($conexao, $pk_produto);
    $pk_categoria = mysqli_real_escape_string($conexao, $pk_categoria);

    $query = "INSERT INTO produto_categoria (pk_produto, pk_categoria) VALUES ({$pk_produto}, {$pk_categoria})";
    $result_query = mysqli_query($conexao, $query);
    return $result_query;
}
?>
