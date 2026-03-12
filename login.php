<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

  else if (strlen($senha) < 4 || strlen($senha) > 15) {
    


