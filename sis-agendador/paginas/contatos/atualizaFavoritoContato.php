<?php
include("../../db/conexao.php");


$idContato = $_GET["idContato"];
$flagFavorito = $_GET["flagFavorito"];

$sql = "UPDATE tbcontatos SET flagFavorito = {$flagFavorito} WHERE idContato = {$idContato}";
mysqli_query($conexao, $sql);