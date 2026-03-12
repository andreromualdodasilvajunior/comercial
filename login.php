<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

 if (strlen($usuario) < 4 || strlen($usuario) > 15) {
        $mensagem = "Erro: o nome de usuário deve ter entre 4 e 15 caracteres.";
    }


