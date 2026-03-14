<?php
date_default_timezone_set('America/Sao_Paulo');

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        if (($usuario === 'PROFESSOR' || $usuario === 'COORDENADOR') && $senha === 'DEVISATE') {
            $hora = date('H:i');
            $data = date('d/m/Y');
            $mensagem = "Bem-vindo, $usuario! Você realizou acesso às $hora no dia $data.";
        } elseif ($usuario !== 'PROFESSOR' && $usuario !== 'COORDENADOR' && $senha !== 'DEVISATE') {
            $mensagem = 'Erro: nome de usuário e senha inválidos.';
        } elseif ($usuario !== 'PROFESSOR' && $usuario !== 'COORDENADOR') {
            $mensagem = 'Erro: nome de usuário inválido.';
        } else {
            $mensagem = 'Erro: senha incorreta.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; text-align: center; background: #f8f9fa; }
        h2 { color: #333; }
        form { max-width: 400px; margin: 0 auto; padding: 30px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { background: #28a745; color: white; padding: 12px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; }
        .mensagem { margin: 20px 0; padding: 15px; border-radius: 5px; font-weight: bold; }
        .sucesso { background: #d4edda; color: #155724; }
        .erro    { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

    <h2>Sistema de Login</h2>

    <?php if ($mensagem !== ''): ?>
        <div class="mensagem <?= strpos($mensagem, 'Bem-vindo') === 0 ? 'sucesso' : 'erro' ?>">
            <?= $mensagem ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        Usuário:<br>
        <input type="text" name="usuario"><br><br>

        Senha:<br>
        <input type="password" name="senha"><br><br>

        <input type="submit" value="Entrar">
    </form>

</body>
</html>