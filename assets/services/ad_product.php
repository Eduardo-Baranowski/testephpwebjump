<?php
include('../../repositories/conexao_bd.php');
require_once('../../repositories/product_bd.php');
require_once('../../repositories/product_category_bd.php');
require_once('../../repositories/log.php');


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

if ($_POST) {

    $arquivo = $_FILES["arquivo"]["tmp_name"];
    $tamanho = $_FILES["arquivo"]["size"];
    $tipo = $_FILES["arquivo"]["type"];
    $nome1 = $_FILES["arquivo"]["name"];
    $titulo = $_POST["titulo"];

    if ( $arquivo != "none" )
    {
        $fp = fopen($arquivo, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);
        try {


            $conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha); //istancia a classe PDO
            $conecta->exec("set names utf8"); //permite caracteres latinos.
            $last_id = mysqli_insert_id($conexao);
            $comandoSQL = "INSERT INTO tb_arquivos VALUES (0,'$nome1','$titulo','$conteudo','$tipo' ,{$last_id})";
            $grava = $conecta->prepare($comandoSQL); //testa o comando SQL
            $grava->execute(array());
            echo '<br/><div class="alert alert-success" role="alert">
            Arquivo enviado com sucesso para o servidor!
            </div>';
        } catch(PDOException $e) { // caso retorne erro
            echo '<br/><div class="alert alert-error" role="alert">
           Erro ' . $e->getMessage() .
                '</div>';}
    }}else {
    $msg = mysqli_error($conexao);
    ?><p class="alert alert-danger">Erro de inserção de imagem </p><?php
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

$mensagem = "Executando inserção de produto e imagem relacionada ao produto!";

if(salvaLog($conexao, $mensagem)) {
    //
} else {
    $msg = mysqli_error($conexao);
    ?><p class="alert alert-danger">Erro de log:<br>	<?=$msg?></p><?php
}



mysqli_close($conexao);
?>

