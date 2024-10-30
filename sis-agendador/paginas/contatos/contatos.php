<?php
// variavel da pesquisa
$txtPesquisa = (isset($_POST["txtPesquisa"]))?$_POST["txtPesquisa"]:"";
?>

<header>
    <h3 class="mt-2 text-primary"><i class="bi bi-person-badge-fill"></i> Contatos</h3>
</header>
<div>
    <a title="Cadastrar Contato" class="btn btn-secondary mt-2" href="index.php?menuop=cad-contato"><i class="bi bi-person-badge-fill"></i> Cadastrar Contato</a>
    
</div>

<div>
    <form class="mt-3 mb-3" action="index.php?menuop=contatos" method="post">
        <div class="input-group">
            <input placeholder="Digite um nome ou ID para buscar" class="form-control "type="text" name="txtPesquisa" id="txtPesquisa" value="<?=$txtPesquisa?>">
            <button title="Pesquisar Contato" class="btn btn-primary btn-sm"  type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
    </form>
</div>
<table class="table table-dark table-hover table-bordered table-sm text-nowrap">
    <thead>
        <tr>
            <th><i class="bi bi-star-fill"></i></th>
            <th>ID </th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Sexo</th>
            <th>Data de Nascimento</th>
            <th>Atualizar</th>
            <th>Deletar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $quantidade = 10;
        $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;
        $inicio =  ($quantidade * $pagina) - $quantidade;
                    //(10 * 2) - 10 = 10
                    // 1 - 2 - 3 - 4  

    

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
ORDER BY flagFavorito DESC, nomeContato ASC
LIMIT $inicio, $quantidade
 ";
        $rs = mysqli_query($conexao, $sql) or die ("Erro ao executar a consulta" . mysqli_error($conexao));
        while($dados = mysqli_fetch_assoc($rs)) {
            
        ?>
        <tr class="text-nowrap">
            <td>
                <?php
            if($dados["flagFavorito"]==1) {
                echo "<a href=\"#\" class=\"flagFavorito link-warning\" title=\"Favorito\"id=\"{$dados["idContato"]}\">
                <i class=\"bi bi-star-fill\"></i>
                </a>";
                
                } else {
                    echo "<a href=\"#\" class=\"flagFavorito link-warning\" title=\"Não Favorito\"id=\"{$dados["idContato"]}\">
                    <i class=\"bi bi-star\"></i>
                    </a>";
                
            }

            ?>

            </td>
            <td class><?=$dados["idContato"]?></td>
            <td><?=$dados["nomeContato"]?></td>
            <td><?=$dados["emailContato"]?></td>
            <td><?=$dados["telefoneContato"]?></td>
            <td><?=$dados["enderecoContato"]?></td>
            <td><?=$dados["sexoContato"]?></td>
            <td><?=$dados["dataNasciContato"]?></td>
        <td class="text-center">
            <a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?=$dados["idContato"]?>">
                <i title="Atualizar Contato" class="bi bi-pencil-square"></i>
            </a>
        </td class="text-center">
            <td><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-contato&idContato=<?=$dados["idContato"]?>"><i title="Deletar Contato" class="bi bi-trash"></i></a></td>
        <?php

        }
?>
    </tbody>
    
</table>
    </div>
    <ul class="pagination justify-content-center">

        <?php
        $sqlTotal = "SELECT idContato FROM tbcontatos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
        // corrigir problema do mouse pointer
        echo "<li class='page-item mt-3'><span class='page-link'><b>Total de Contatos:</b> " . $numTotal . " </span></li>";
        echo '<li class="page-item mt-3"><a class="page-link" href="?menuop=contatos&pagina=1">Primeira Página</a></li>';

        if($pagina > 2) {
            ?>
           <li class="page-link mt-3"><a href="?menuop=contatos&pagina=<?php echo $pagina- 1?>"> << </a></li>
            <?php
        }

        for($i=1;$i<=$totalPagina;$i++) {

            if($i>=($pagina-3) && $i <= ($pagina+3)){
                if($i==$pagina){
                    echo "<li class='page-item mt-3 active'><a class='page-link'>$i</a></li>";
                } else {
                    echo "<li class='page-item mt-3'><a class='page-link' href=\"?menuop=contatos&pagina=$i\">$i</a></li>";
                }
            }

        } 

        if($pagina < ($totalPagina - 1)) {
            ?>
           <li class="page-link mt-3"><a href="?menuop=contatos&pagina=<?php echo $pagina + 1?>"> >> </a></li>
            <?php
        }

        echo "<li class='page-item'><a class='page-link mt-3'href=\"?menuop=contatos&pagina=$totalPagina\">Última Página</a></li>";


        ?>
    </ul>