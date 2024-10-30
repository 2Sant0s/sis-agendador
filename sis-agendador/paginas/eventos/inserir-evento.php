<?php
$tituloEvento = strip_tags(mysqli_real_escape_string ($conexao, $_POST['tituloEvento']));
$descricaoEvento = strip_tags(mysqli_real_escape_string ($conexao, $_POST['descricaoEvento']));
$horaInicioEvento = strip_tags(mysqli_real_escape_string ($conexao, $_POST['horaInicioEvento']));
$dataInicioEvento = strip_tags(mysqli_real_escape_string ($conexao, $_POST['dataInicioEvento']));
$dataFimEvento = strip_tags( mysqli_real_escape_string($conexao,  $_POST['dataFimEvento']));
$horaFimEvento = strip_tags(mysqli_real_escape_string ($conexao, $_POST['horaFimEvento']));

$sql = "INSERT INTO tbeventos (
tituloEvento,
descricaoEvento,
dataInicioEvento,
horaInicioEvento,
dataFimEvento,
horaFimEvento


) VALUES (
'{$tituloEvento}', 
'{$descricaoEvento}', 
'{$dataInicioEvento}', 
'{$horaInicioEvento}',
'{$dataFimEvento}',
'{$horaFimEvento}'
)";

$rs = mysqli_query($conexao, $sql) or die("Erro!" . mysqli_error($conexao));

if($rs) {
    ?>
      <div class="alert alert-success mt-4" role="alert">
  <p><b>Evento inserido com sucesso.</b></p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=eventos">Voltar para a lista de eventos</a>
  </p>
    <?php
} else {
    ?>
          <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Erro!</h4>
  <p>O Evento não pode ser inserido.</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=eventos">Voltar para a lista de Eventos</a>
  </p>
    <?php
}

?>