<?php
require_once('conexao_bd.php');

function insereProduto($conexao, $nome, $sku, $preco, $descricao, $quantidade) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $sku = mysqli_real_escape_string($conexao, $sku);
    $preco = mysqli_real_escape_string($conexao, $preco);
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $quantidade = mysqli_real_escape_string($conexao, $quantidade);

    $query = "INSERT INTO produto (nome, sku, preco, descricao, quantidade) VALUES ('{$nome}', '{$sku}', {$preco}, '{$descricao}', {$quantidade})";
    $result_query = mysqli_query($conexao, $query);
    return $result_query;
}

function listaProdutos($conexao) {
    $produtos = [];
    $resultado = mysqli_query($conexao, 'SELECT nome, sku, preco, descricao, quantidade, id FROM testephp.produto;');
    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }
    return $produtos;
}


$id = $_POST['id'];
function removeProduto($conexao, $id) {
    $id = mysqli_real_escape_string($conexao, $id);
    $query = "DELETE FROM testephp.produto WHERE id = {$id}";

    return mysqli_query($conexao, $query);
}

function listaImagemProduto($conexao, $pk_produto) {
    $pk_produto = mysqli_real_escape_string($conexao, $pk_produto);
    $imagens = [];
    $resultado = mysqli_query($conexao, "SELECT arquivo_id, arquivo_nome, arquivo_conteudo, arquivo_tipo, pk_produto FROM testephp.tb_arquivos where pk_produto = {$pk_produto}");
    while($imagem = mysqli_fetch_assoc($resultado)) {
        array_push($imagens, $imagem);
    }
    return $imagens;
}

?>


