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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
      <style>
        body { font-family: Arial, sans-serif; margin: 40px; text-align: center; }
        h2 { color: #333; }
        form { max-width: 400px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; }
        input[type="submit"] { background: #4CAF50; color: white; padding: 12px; border: none; width: 100%; cursor: pointer; }
        .mensagem { margin: 20px 0; padding: 15px; border-radius: 5px; font-weight: bold; }
        .sucesso { background: #e8f5e9; color: #2e7d32; }
          .erro    { background: #ffebee; color: #c62828; }
    </style>
</head>
<body>
 <h2>Sistema de Login</h2>

    <?php if ($mensagem !== ''): ?>
        <div class="mensagem <?= strpos($mensagem, 'Bem-vindo') === 0 ? 'sucesso' : 'erro' ?>">
            <?= htmlspecialchars($mensagem) ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        Usuário:<br>
        <input type="text" name="usuario" required><br><br>

        Senha:<br>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Entrar">
    </form>

</body>
</html>
