<?php

$idEvento = $_GET["idEvento"];
$sql = "DELETE FROM tbeventos WHERE idEvento = '{$idEvento}'";
$rs = mysqli_query($conexao, $sql);

if($rs) {
    ?>
      <div class="alert alert-danger mt-4" role="alert">
  <p><b>Evento deletado com sucesso.</b></p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=eventos">Voltar para a lista de eventos</a>
  </p>
    <?php
} else {
    ?>
          <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Erro!</h4>
  <p>A Evento não pode ser excluida.</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=eventos">Voltar para a lista de Eventos</a>
  </p>
    <?php
}

?>
