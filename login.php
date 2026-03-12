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

           $mensagem = "Bem-vindo, $usuario! Você