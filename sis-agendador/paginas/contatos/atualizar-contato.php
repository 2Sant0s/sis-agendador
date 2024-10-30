<?php
$idContato = mysqli_real_escape_string($conexao, $_POST["idContato"]);
$nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]);
$emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]);
$telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]);
$enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]);
$sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]);
$dataNasciContato = mysqli_real_escape_string($conexao, $_POST["dataNasciContato"]);
$sql = "UPDATE tbcontatos SET
    nomeContato = '{$nomeContato}',
    emailContato = '{$emailContato}',
    telefoneContato = '{$telefoneContato}',
    enderecoContato = '{$enderecoContato}',
    sexoContato = '{$sexoContato}',
    dataNasciContato = '{$dataNasciContato}'

    WHERE idContato = '{$idContato}'
    ";
// verificação se os dados foram inseridos corretamente
$rs = mysqli_query($conexao, $sql) or die("Erro ao executar a atualização" . mysqli_error($conexao));

?>

<div class="alert alert-warning mt-4" role="alert">
    <h4 class="alert-heading"></h4>
  <p><b>Contato atualizado com sucesso.</b></p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=contatos">Voltar para a lista de contatos</a>
</div>
