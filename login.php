    <?php
    $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if (strlen($usuario) < 4 || strlen($usuario) > 15) {
            $mensagem = "Erro: o nome de usuário deve ter entre 4 e 15 caracteres.";
        }
    else if (strlen($senha) < 4 || strlen($senha) > 15) {
            $mensagem = "Erro: a senha deve ter entre 4 e 15 caracteres.";
        }
    
        else {

                if (($usuario == "PROFESSOR" || $usuario == "COORDENADOR") && $senha == "DEVISATE") {
    
                date_default_timezone_set("America/Sao_Paulo");
    
                $hora = date("H:i");
                $data = date("d/m/Y");

    $mensagem = "Bem-vindo, $usuario! Você realizou acesso às $hora no dia $data.";
            }

    
            else if ($usuario != "PROFESSOR" && $usuario != "COORDENADOR" && $senha != "DEVISATE") {
                $mensagem = "Erro: nome de usuário e senha inválidos.";
            }
            else if ($usuario != "PROFESSOR" && $usuario != "COORDENADOR") {
                $mensagem = "Erro: nome de usuário inválido.";
            }
    
            else {
                $mensagem = "Erro: senha incorreta.";
            }
    
        }
    }

    ?>



    <!DOCTYPE html>

    <html>

    <head>

    <meta charset="UTF-8">

    <title>Login</title>

    </head>

    <body>



    <h2>Sistema de Login</h2>



    <form method="POST">



    Usuário:<br>

    <input type="text" name="usuario"><br><br>



    Senha:<br>

    <input type="password" name="senha"><br><br>



    <input type="submit" value="Entrar">



    </form>



    <br>



    <?php

    echo $mensagem;

    ?>



    </body>

    </html>

    