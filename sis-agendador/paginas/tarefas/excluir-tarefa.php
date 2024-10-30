<?php

$idTarefa = $_GET["idTarefa"];
$sql = "DELETE FROM tbtarefas WHERE idTarefa = '{$idTarefa}'";
$rs = mysqli_query($conexao, $sql);

if($rs) {
    ?>
      <div class="alert alert-danger mt-4" role="alert">
  <p><b>Tarefa deletada com sucesso.</b></p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=tarefas">Voltar para a lista de tarefas</a>
  </p>
    <?php
} else {
    ?>
          <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Erro!</h4>
  <p>A tarefa não pode ser excluida.</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=tarefas">Voltar para a lista de tarefas</a>
  </p>
    <?php
}

?>
