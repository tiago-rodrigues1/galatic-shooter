<?php
require "../../models/Partida.php";

$jogador = $_GET["txtJogador"];
$acertos = $_GET["numAcertos"];
$erros = $_GET["numErros"];


$partida = new Partida($jogador, $acertos, $erros);
$response = $partida->save();

if ($response) {
    header("Location:/gameOver.php");
} else {
    header("Location:/index.html");
}

?>