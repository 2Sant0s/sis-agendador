<?php
// variavel da pesquisa
$txtPesquisa = (isset($_POST["txtPesquisa"]))?$_POST["txtPesquisa"]:"";

// Alterna entre status concluído ou não concluído

$idEvento = (isset($_GET['idEvento']))?$_GET['idEvento'] : "";
$statusEvento = (isset($_GET['statusEvento']) and $_GET['statusEvento']=='0')?'1':'0';
$sql = "UPDATE tbeventos SET statusEvento = {$statusEvento} WHERE idEvento = {$idEvento}";
$rs = mysqli_query($conexao, $sql);

// -----------------------------------------------

?>
<header>
    <h3 class="mt-2 text-primary"><i class="bi bi-calendar-check"></i> Eventos</h3>
</header>
<div>
    <a title="Cadastrar Evento" class="btn btn-secondary mt-2"href="index.php?menuop=cad-evento"><i class="bi bi-calendar-check"></i> Cadastrar Evento</a>
</div>

<div>
    <form class="mt-3 mb-3" action="index.php?menuop=eventos" method="post">
        <div class="input-group">
            <input placeholder="Digite um nome ou ID para buscar" class="form-control"type="text" name="txtPesquisa" id="txtPesquisa" value="<?=$txtPesquisa?>">
            <button title="Pesquisar Evento" class="btn btn-primary btn-sm"  type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
    </form>
</div>
<div class="tabela">
<table class="table table-dark table-hover table-bordered table-sm text-nowrap">

    <thead>
        <tr>
            <th>Status</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Data de início</th>
            <th>Hora da início</th>
            <th>Data de fim</th>
            <th>Hora de fim</th>
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


        $sql = "SELECT 
        idEvento,
        statusEvento,
        tituloEvento,
        descricaoEvento,
        DATE_FORMAT(dataInicioEvento, '%d/%m/%Y') AS dataInicioEvento, 
        horaInicioEvento,
        DATE_FORMAT(dataFimEvento, '%d/%m/%Y') AS dataFimEvento,
        horaFimEvento
        FROM tbeventos
        WHERE 
        tituloEvento LIKE '%{$txtPesquisa}%' OR 
        descricaoEvento LIKE '%{$txtPesquisa}%' OR
        DATE_FORMAT(dataInicioEvento, '%d/%m/%Y') LIKE '%{$txtPesquisa}%'
        ORDER BY statusEvento, dataInicioEvento
        LIMIT $inicio, $quantidade
 ";
        $rs = mysqli_query($conexao, $sql) or die ("Erro ao executar a consulta" . mysqli_error($conexao));
        while($dados = mysqli_fetch_assoc($rs)) {
            
        ?>
          <tr>
            <td>
                <a class="btn btn-secondary btn-sm" href="index.php?menuop=eventos&pagina=<?=$pagina?>&idEvento=<?=$dados['idEvento']?>&statusEvento=<?=$dados['statusEvento']?>" >
                    <?php
                        if($dados['statusEvento']==0){
                            echo '<i class="bi bi-square"></i>';
                        }else{
                            echo '<i class="bi bi-check-square"></i>';
                        }
                    ?>
                </a>   
            </td>
            <td class="text-nowrap"><?=$dados['tituloEvento']?></td>
            <td class="text-nowrap"><?=$dados['descricaoEvento']?></td>
            <td class="text-nowrap"><?=$dados['dataInicioEvento']?></td>
            <td class="text-nowrap"><?=$dados['horaInicioEvento']?></td>
            <td class="text-nowrap"><?=$dados['dataFimEvento']?></td>
            <td class="text-nowrap"><?=$dados['horaFimEvento']?></td>

            <td class="text-center">
                <a title="Atualizar Evento" class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-evento&idEvento=<?=$dados['idEvento']?>"><i class="bi bi-pencil-square"></i></a>
                
            </td>
            <td class="text-center">
                <a title="Deletar Evento" class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-evento&idEvento=<?=$dados['idEvento']?>"><i class="bi bi-trash-fill"></i></a>    
            </td>
            

        </tr>
                </tr>
        <?php

        }
?>
    </tbody>
    
</table>
    </div>
    <ul class="pagination justify-content-center">
        <?php
        $sqlTotal = "SELECT idEvento FROM tbeventos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
        // corrigir problema do mouse pointer
        echo "<li class='page-item'><span class='page-link'><b>Total de Eventos:</b> " . $numTotal . " </span></li>";
        echo '<li class="page-item"><a class="page-link" href="?menuop=eventos&pagina=1">Primeira Página</a></li>';

        if($pagina > 2) {
            ?>
           <li class="page-link"><a href="?menuop=eventos&pagina=<?php echo $pagina- 1?>"> << </a></li>
            <?php
        }

        for($i=1;$i<=$totalPagina;$i++) {

            if($i>=($pagina-3) && $i <= ($pagina+3)){
                if($i==$pagina){
                    echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href=\"?menuop=eventos&pagina=$i\">$i</a></li>";
                }
            }

        } 

        if($pagina < ($totalPagina - 1)) {
            ?>
           <li class="page-link"><a href="?menuop=eventos&pagina=<?php echo $pagina + 1?>"> >> </a></li>
            <?php
        }

        echo "<li class='page-item'><a class='page-link'href=\"?menuop=eventos&pagina=$totalPagina\">Última Página</a></li>";
        ?>
    </ul>