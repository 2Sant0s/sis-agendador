
<?php

$idTarefa = strip_tags(mysqli_real_escape_string ($conexao, $_POST['idTarefa']));
$tituloTarefa = strip_tags(mysqli_real_escape_string ($conexao, $_POST['tituloTarefa']));
$descricaoTarefa = strip_tags(mysqli_real_escape_string ($conexao, $_POST['descricaoTarefa']));
$horaConclusaoTarefa = strip_tags(mysqli_real_escape_string ($conexao, $_POST['horaConclusaoTarefa']));
$dataConclusaoTarefa = strip_tags(mysqli_real_escape_string ($conexao, $_POST['dataConclusaoTarefa']));
$dataLembreteTarefa = strip_tags( mysqli_real_escape_string($conexao,  $_POST['dataLembreteTarefa']));
$horaLembreteTarefa = strip_tags(mysqli_real_escape_string ($conexao, $_POST['horaLembreteTarefa']));
$recorrenciaTarefa = strip_tags(mysqli_real_escape_string ($conexao, $_POST['recorrenciaTarefa']));

$sql = "UPDATE tbtarefas SET
tituloTarefa = '{$tituloTarefa}',
descricaoTarefa = '{$descricaoTarefa}',
dataConclusaoTarefa = '{$dataConclusaoTarefa}',
horaConclusaoTarefa = '{$horaConclusaoTarefa}',
dataLembreteTarefa = '{$dataLembreteTarefa}',
horaLembreteTarefa = '{$horaLembreteTarefa}',
recorrenciaTarefa = '{$recorrenciaTarefa}'

WHERE idTarefa = '{$idTarefa}'
";

$rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta." . mysqli_error($conexao));

if($rs) {
    ?>
      <div class="alert alert-warning mt-4" role="alert">
  <p><b>Tarefa atualizada com sucesso.</b></p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=tarefas">Voltar para a lista de tarefas</a>
  </p>
    <?php
} else {
    ?>
          <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Erro!</h4>
  <p>A tarefa não pode ser atualizada.</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=tarefas">Voltar para a lista de tarefas</a>
  </p>
    <?php
}

?>