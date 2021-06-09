<?php
require_once('log.php');
$mensagem = "Executando conexão ao banco!";

$conexao = mysqli_connect('localhost:3306', 'root', 'Baranowski25', 'testephp');
$conexao->set_charset('utf8');

$servidor = "localhost";
$banco = "testephp";
$usuario ="root";
$senha ="";

if(salvaLog($conexao, $mensagem)) {
    //
} else {
    $msg = mysqli_error($conexao);
    ?><p class="alert alert-danger">Erro de log:<br>	<?=$msg?></p><?php
}
