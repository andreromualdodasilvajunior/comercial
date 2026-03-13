<?php

date_default_timezone_set('America/Sao_Paulo');

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $usuario = trim($_POST['usuario'] ?? '');
    $senha   = trim($_POST['senha']   ?? '');

    $erros = [];

    if (strlen($usuario) < 4 || strlen($usuario) > 15) {
        $erros[] = 'Erro: o nome de usuário deve ter entre 4 e 15 caracteres.';
    }

    if (strlen($senha) < 4 || strlen($senha) > 15) {
        $erros[] = 'Erro: a senha deve ter entre 4 e 15 caracteres.';
    }