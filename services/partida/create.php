<?php
require_once "../../models/Partida.php";

$jogador = $_GET["txtJogador"];
$acertos = $_GET["numAcertos"];
$erros = $_GET["numErros"];


$partida = new Partida(urldecode($jogador), $acertos, $erros);
$response = $partida->save();

if ($response) {
    header("Location:/ranking.php");
} else {
    header("Location:/index.html");
}

?>