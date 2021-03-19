<?php
include('conexao_bd.php');

function salvaLog($conexao, $mensagem) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $hora = date('Y-m-d H:i:s');
    $mensagem = mysqli_real_escape_string($conexao, $mensagem);
    $query = "INSERT INTO logs (hora, ip, mensagem) VALUES ('{$hora}', '{$ip}', '{$mensagem}')";

    $result_query = mysqli_query($conexao, $query);
    return $result_query;

}
