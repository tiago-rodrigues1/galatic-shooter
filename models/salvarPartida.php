<?php

$conn = new PDO("sqlite:../gs_db.sqlite");
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$jogador = $_GET["txtJogador"];
$acertos = $_GET["numAcertos"];
$erros = $_GET["numErros"];
date_default_timezone_set('America/Sao_Paulo');
$data_hora = date('d/m/Y H:i', time());

$preparo = $conn->prepare("INSERT INTO partidas
(jogador, acertos, erros, data_hora)
VALUES(:jogador, :acertos, :erros, :datahora);");

$preparo->bindParam(":jogador", $jogador);
$preparo->bindParam(":acertos", $acertos);
$preparo->bindParam(":erros", $erros);
$preparo->bindParam(":datahora", $data_hora);

$preparo->execute();

header("Location:../gameOver.html");