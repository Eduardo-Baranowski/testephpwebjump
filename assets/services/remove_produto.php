<?php
include('../../repositories/conexao_bd.php');
require_once('../../repositories/product_bd.php');

$id = $_POST['id'];
$id = mysqli_real_escape_string($conexao, $id);

removeProduto($conexao, $id);

$_SESSION['success'] = 'Produto removido com sucesso!';

header("Location: ../products.php");

die();