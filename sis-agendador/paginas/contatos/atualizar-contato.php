<header>
    <h3>Atualizar Contato</h3>
</header>

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

echo "O registro foi atualizado com sucesso!";
?>