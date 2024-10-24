<header>
    <h3 class="mt-2"><i class="bi bi-person-badge-fill"></i> Contatos</h3>
</header>
<div>
    <a class="btn btn-outline-secondary mb-2"href="index.php?menuop=cad-contato"><i class="bi bi-person-fill-add"></i> Novo contato</a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="post">
        <div class="input-group">
            <input class="form-control"type="text" name="txtPesquisa" id="txtPesquisa">
            <button class="btn btn-success btn-sm mb-1"  type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
    </form>
</div>
<div class="tabela">
<table class="table table-dark table-hover table-bordered table-sm text-nowrap">

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
        <tr class="text-nowrap">
            <td><?=$dados["idContato"]?></td>
            <td><?=$dados["nomeContato"]?></td>
            <td><?=$dados["emailContato"]?></td>
            <td><?=$dados["telefoneContato"]?></td>
            <td><?=$dados["enderecoContato"]?></td>
            <td><?=$dados["sexoContato"]?></td>
            <td><?=$dados["dataNasciContato"]?></td>
            <td><?=$dados["flagFavorito"]?></td>
        <td class="text-center">
            <a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?=$dados["idContato"]?>">
                <i class="bi bi-pencil-square"></i>
            </a>
        </td class="text-center">
            <td><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-contato&idContato=<?=$dados["idContato"]?>"><i class="bi bi-trash"></i></a></td>
        <?php

        }
?>
    </tbody>
    <ul class="pagination justify-content-center">

        <?php
        $sqlTotal = "SELECT idContato FROM tbcontatos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
        // corrigir problema do mouse pointer
        echo "<li class='page-item'><span class='page-link'>Total de Registros: " . $numTotal . " </span></li>";
        echo '<li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=1">Primeira Página</a></li>';

        if($pagina > 2) {
            ?>
           <li class="page-link"><a href="?menuop=contatos&pagina=<?php echo $pagina- 1?>"> << </a></li>
            <?php
        }

        for($i=1;$i<=$totalPagina;$i++) {

            if($i>=($pagina-3) && $i <= ($pagina+3)){
                if($i==$pagina){
                    echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=$i\">$i</a></li>";
                }
            }

        } 

        if($pagina < ($totalPagina - 1)) {
            ?>
           <li class="page-link"><a href="?menuop=contatos&pagina=<?php echo $pagina + 1?>"> >> </a></li>
            <?php
        }

        echo "<li class='page-item'><a class='page-link'href=\"?menuop=contatos&pagina=$totalPagina\">Última Página</a></li>";


        ?>
    </ul>
</table>
    </div>