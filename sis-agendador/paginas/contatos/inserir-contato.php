<?php
    $nomeContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["nomeContato"]));
    $emailContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["emailContato"]));
    $telefoneContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["telefoneContato"]));
    $enderecoContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["enderecoContato"]));
    $sexoContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["sexoContato"]));
    $dataNasciContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["dataNasciContato"]));
    $sql = "INSERT INTO tbcontatos (
    nomeContato, 
    emailContato, 
    telefoneContato,
    enderecoContato,
    sexoContato,
    dataNasciContato)
    VALUES (
    '{$nomeContato}',
    '{$emailContato}',
    '{$telefoneContato}',
    '{$enderecoContato}',
    '{$sexoContato}',
    '{$dataNasciContato}'
    )";
    // verificação se os dados foram inseridos corretamente.
    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));

    ?>
    <div class="alert alert-success mt-4" role="alert">
  <p>Contato inserido com sucesso.</p>
  <hr>
  <p>
    <a href="?menuop=contatos">Voltar para a lista de contatos</a>
  </p>
   