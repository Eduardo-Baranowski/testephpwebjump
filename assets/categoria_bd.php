<?php
require_once('conexao_bd.php');

function insereCategoria($conexao, $category_name, $category_code) {
    $category_name = mysqli_real_escape_string($conexao, $category_name);
    $category_code = mysqli_real_escape_string($conexao, $category_code);

    $query = "INSERT INTO categoria (category_name, category_code) VALUES ('{$category_name}', {$category_code})";
    $result_query = mysqli_query($conexao, $query);
    return $result_query;
}


function listaCategorias($conexao) {
    $categorias = [];
    $resultado = mysqli_query($conexao, 'SELECT category_code, category_id, category_name FROM testephp.categoria;');
    while($categoria = mysqli_fetch_assoc($resultado)) {
        array_push($categorias, $categoria);
    }
    return $categorias;
}

function listaCategoriasProduto($conexao, $pk_produto) {
    $pk_produto = mysqli_real_escape_string($conexao, $pk_produto);
    $categorias = [];
    $resultado = mysqli_query($conexao, "SELECT pk_categoria FROM testephp.produto_categoria where pk_produto = '{$pk_produto}'");
    while($categoria = mysqli_fetch_assoc($resultado)) {
        array_push($categorias, $categoria);
    }
    return $categorias;
}

$category_id = $_POST['id'];
function removeCategoria($conexao, $category_id) {
    $category_id = mysqli_real_escape_string($conexao, $category_id);
    $query = "DELETE FROM categoria WHERE category_id = {$category_id}";

    return mysqli_query($conexao, $query);
}
?>


