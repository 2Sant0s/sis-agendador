<header>
    <h3>Inserir Contato</h3>
</header>

<?php
    $nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]);
    $emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]);
    $telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]);
    $enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]);
    $sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]);
    $dataNasciContato = mysqli_real_escape_string($conexao, $_POST["dataNasciContato"]);
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

    echo "O registro foi inserido com sucesso!";
?>