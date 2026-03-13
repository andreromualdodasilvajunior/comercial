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

        if (!empty($erros)) {
        $mensagem = implode('<br>', $erros);
    } else {
      
        $usuario_valido = ($usuario === 'PROFESSOR' || $usuario === 'COORDENADOR');
        $senha_valida   = ($senha === 'DEVISATE');
  if ($usuario_valido && $senha_valida) {
            if ($usuario_valido && $senha_valida) {
            $hora = date('H:i');
            $data = date('d/m/Y');
      $mensagem = "Bem-vindo, $usuario! Você realizou acesso às $hora no dia $data.";
            } elseif (!$usuario_valido && !$senha_valida) {
                $mensagem = 'Erro: nome do usuario e senha incorreto.';
        } elseif (!$usuario_valido) {
            $mensagem = 'Erro: nome de usuário incorreto.';
        } else {
            $mensagem = 'Erro: senha incorreta.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>