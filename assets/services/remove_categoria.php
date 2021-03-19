<?php
include('../../repositories/conexao_bd.php');
require_once('../../repositories/categoria_bd.php');

$category_id = $_POST['category_id'];
$category_id = mysqli_real_escape_string($conexao, $category_id);

removeCategoria($conexao, $category_id);

$_SESSION['success'] = 'Produto removido com sucesso!';

header("Location: ../categories.php");

die();