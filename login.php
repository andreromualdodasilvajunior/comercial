<?php

date_default_timezone_set('America/Sao_Paulo');

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $usuario = trim($_POST['usuario'] ?? '');
    $senha   = trim($_POST['senha']   ?? '');

    