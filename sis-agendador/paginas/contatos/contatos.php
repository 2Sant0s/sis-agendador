<header>
    <h3>Contatos</h3>
</header>
<div>
    <a href="index.php?menuop=cad-contato">Novo contato</a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="post">
        <input type="text" name="txtPesquisa" id="txtPesquisa">
        <input type="submit" value="Pesquisar">
    </form>
</div>

<table border="1">
    <thead>
        <tr>
            <th>ID </th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Sexo</th>
            <th>Data de Nascimento</th>
            <th>Flag</th>
            <th>Edição</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $quantidade = 10;
        $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;
        $inicio =  ($quantidade * $pagina) - $quantidade;
                    //(10 * 2) - 10 = 10
                    // 1 - 2 - 3 - 4  

    $txtPesquisa = (isset($_POST["txtPesquisa"]))?$_POST["txtPesquisa"]:"";

        $sql = "SELECT idContato,
upper (nomeContato) AS nomeContato,
lower (emailContato) AS emailContato,
upper (enderecoContato) AS enderecoContato,

CASE
	WHEN sexoContato = 'F' THEN 'FEMININO'
    WHEN sexoContato = 'M' THEN 'MASCULINO'	
ELSE
	'NÃO ESPECIFICADO'
END AS sexoContato,
telefoneContato,
DATE_FORMAT(dataNasciContato, '%d/%m/%Y') AS dataNasciContato,
flagFavorito 
FROM tbContatos
WHERE
idContato = '{$txtPesquisa}' OR
nomeContato LIKE '%{$txtPesquisa}%'
ORDER BY nomeContato ASC
LIMIT $inicio, $quantidade
 ";
        $rs = mysqli_query($conexao, $sql) or die ("Erro ao executar a consulta" . mysqli_error($conexao));
        while($dados = mysqli_fetch_assoc($rs)) {
            
        ?>
        <tr>
            <td><?=$dados["idContato"]?></td>
            <td><?=$dados["nomeContato"]?></td>
            <td><?=$dados["emailContato"]?></td>
            <td><?=$dados["telefoneContato"]?></td>
            <td><?=$dados["enderecoContato"]?></td>
            <td><?=$dados["sexoContato"]?></td>
            <td><?=$dados["dataNasciContato"]?></td>
            <td><?=$dados["flagFavorito"]?></td>
            <td><a href="index.php?menuop=editar-contato&idContato=<?=$dados["idContato"]?>">Editar</a></td>
            <td><a href="index.php?menuop=excluir-contato&idContato=<?=$dados["idContato"]?>">Excluir</a></td>
        <?php

        }
?>
    </tbody>
    <br>
        <?php
        $sqlTotal = "SELECT idContato FROM tbcontatos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
        echo "Total de Registros: $numTotal <br>";
        echo '<a href="?menuop=contatos&pagina=1">Primeira Página</a>';

        if($pagina > 2) {
            ?>
           <a href="?menuop=contatos&pagina=<?php echo $pagina- 1?>"> << </a>
            <?php
        }

        for($i=1;$i<=$totalPagina;$i++) {

            if($i>=($pagina-3) && $i <= ($pagina+3)){
                if($i==$pagina){
                    echo $i;
                } else {
                    echo "<a href=\"?menuop=contatos&pagina=$i\">$i</a>";
                }
            }

        } 

        if($pagina < ($totalPagina - 1)) {
            ?>
           <a href="?menuop=contatos&pagina=<?php echo $pagina + 1?>"> >> </a>
            <?php
        }


        echo "<a href=\"?menuop=contatos&pagina=$totalPagina\">Última Página</a>";


        ?>
</table>