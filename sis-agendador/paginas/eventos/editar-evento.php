<?php

$idEvento = $_GET["idEvento"];

$sql = "SELECT * FROM tbeventos WHERE idEvento = '$idEvento'";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do evento" . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>

<header class="mt-3 text-warning">
    <h3><i class="bi bi-calendar-check"></i> Atualizar Evento</h3>
</header>
<div>
    <form class="needs-validation mt-3" action="index.php?menuop=atualizar-evento" method="post" novalidate>
        <!-- diminuir o input id [col-3] -->
        <div class="mb-3 col-1">
            <label for="idEvento" class="form-label">ID</label>
            <input class="form-control" type="text" name="idEvento" id="idEvento" value="<?=$dados["idEvento"]?>" readonly>
        </div>

        <div class="mb-3">
            <label for="tituloEvento" class="form-label">Título</label>
            <input class="form-control" type="text" name="tituloEvento" id="tituloEvento" value="<?=$dados["tituloEvento"]?>" required>
        </div>

        <div class="mb-3">
            <label for="descricaoEvento" class="form-label">Descrição</label>
            <textarea name="descricaoEvento" id="descricaoEvento" cols="30" rows="5" class="form-control" required><?=$dados["descricaoEvento"]?></textarea>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataInicioEvento" class="form-label">Data de Início</label>
                <input class="form-control" type="date" name="dataInicioEvento" value="<?=$dados["dataInicioEvento"]?>" id="dataInicioEvento" required>
            </div>
            
            <div class="mb-3 col-3">
                <label for="horaInicioEvento" class="form-label">Hora de Início</label>
                <input class="form-control" type="time" name="horaInicioEvento" value="<?=$dados["horaInicioEvento"]?>" id="horaInicioEvento" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataFimEvento" class="form-label">Data de Fim</label>
                <input class="form-control" type="date" name="dataFimEvento" value="<?=$dados["dataFimEvento"]?>" id="dataFimEvento" required>
            </div>
            <div class="mb-3 col-3">
                <label for="horaFimEvento" class="form-label">Hora de Fim</label>
                <input class="form-control" type="time" name="horaFimEvento" value="<?=$dados["horaFimEvento"]?>" id="horaFimEvento" required>
            </div>
        </div>
        <div class="mt-3">
            <input title="Atualizar Evento" class="btn btn-warning col-1" type="submit" value="Atualizar" name="btnAtualizar">
            </div>
        </div>
    </form>
</div>