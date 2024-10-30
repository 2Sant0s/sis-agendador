<?php

$idEvento = strip_tags(mysqli_real_escape_string ($conexao, $_POST['idEvento']));
$tituloEvento = strip_tags(mysqli_real_escape_string ($conexao, $_POST['tituloEvento']));
$descricaoEvento = strip_tags(mysqli_real_escape_string ($conexao, $_POST['descricaoEvento']));
$horaInicioEvento = strip_tags(mysqli_real_escape_string ($conexao, $_POST['horaInicioEvento']));
$dataInicioEvento = strip_tags(mysqli_real_escape_string ($conexao, $_POST['dataInicioEvento']));
$dataFimEvento = strip_tags( mysqli_real_escape_string($conexao,  $_POST['dataFimEvento']));
$horaFimEvento = strip_tags(mysqli_real_escape_string ($conexao, $_POST['horaFimEvento']));

$sql = "UPDATE tbeventos SET
tituloEvento = '{$tituloEvento}',
descricaoEvento = '{$descricaoEvento}',
dataInicioEvento = '{$dataInicioEvento}',
horaInicioEvento = '{$horaInicioEvento}',
dataFimEvento = '{$dataFimEvento}',
horaFimEvento = '{$horaFimEvento}'

WHERE idEvento = '{$idEvento}'
";

$rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta." . mysqli_error($conexao));

if($rs) {
    ?>
      <div class="alert alert-success mt-4" role="alert">
  <p><b>Evento atualizado com sucesso.</b></p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=eventos">Voltar para a lista de eventos</a>
  </p>
    <?php
} else {
    ?>
          <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Erro!</h4>
  <p>A Evento não pode ser atualizada.</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=eventos">Voltar para a lista de Eventos</a>
  </p>
    <?php
}

?>