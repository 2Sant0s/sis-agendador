<?php

$idContato = mysqli_real_escape_string($conexao, $_GET["idContato"]);
$sql = "DELETE FROM tbcontatos WHERE idContato = '{$idContato}'";

mysqli_query($conexao, $sql) or die ("Erro ao excluir o contato" . mysqli_error($conexao));

?>

<div class="alert alert-danger mt-4" role="alert">
    <h4 class="alert-heading"></h4>
  <p><b>Contato deletado com sucesso.</b></p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=contatos">Voltar para a lista de contatos</a>
</div>