<?php

$hostname = "localhost";
$bancodedados = "myproject";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno){
    return "falha ao conectar: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
}


