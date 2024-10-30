<?php

$idTarefa = $_GET["idTarefa"];

$sql = "SELECT * FROM tbtarefas WHERE idTarefa = '$idTarefa'";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados da tarefa" . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>

<header class="mt-3 mb-3">
    <h3 class="text-warning"><i class="bi bi-list-task"></i> Atualizar Tarefa</h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=atualizar-tarefa" method="post" novalidate>
        <div class="mb-3 col-1">
            <label for="idTarefa" class="form-label">ID</label>
            <input class="form-control" type="text" name="idTarefa" id="idTarefa" value="<?=$dados["idTarefa"]?>" readonly>
        </div>

        <div class="mb-3">
            <label for="tituloTarefa" class="form-label">Título</label>
            <input class="form-control" type="text" name="tituloTarefa" id="tituloTarefa" value="<?=$dados["tituloTarefa"]?>" required>
               <!-- sistema de validacao -->
               <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
        </div>

        <div class="mb-3">
            <label for="descricaoTarefa" class="form-label">Descrição</label>
            <textarea name="descricaoTarefa" id="descricaoTarefa" cols="30" rows="5" class="form-control" required><?=$dados["descricaoTarefa"]?></textarea>
               <!-- sistema de validacao -->
               <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataConclusaoTarefa" class="form-label">Data de Conclusão</label>
                <input class="form-control" type="date" name="dataConclusaoTarefa" value="<?=$dados["dataConclusaoTarefa"]?>" id="dataConclusaoTarefa" required>
                   <!-- sistema de validacao -->
                   <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
            
            <div class="mb-3 col-3">
                <label for="horaConclusaoTarefa" class="form-label">Hora de Conclusão</label>
                <input class="form-control" type="time" name="horaConclusaoTarefa" value="<?=$dados["horaConclusaoTarefa"]?>" id="horaConclusaoTarefa" required>
                   <!-- sistema de validacao -->
                   <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataLembreteTarefa" class="form-label">Data de Lembrete</label>
                <input class="form-control" type="date" name="dataLembreteTarefa" value="<?=$dados["dataLembreteTarefa"]?>" id="dataLembreteTarefa" required>
                   <!-- sistema de validacao -->
                   <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
            <div class="mb-3 col-3">
                <label for="horaLembreteTarefa" class="form-label">Hora de Lembrete</label>
                <input class="form-control" type="time" name="horaLembreteTarefa" value="<?=$dados["horaLembreteTarefa"]?>" id="horaLembreteTarefa" required>
                   <!-- sistema de validacao -->
                   <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="recorrenciaTarefa" class="form-label">Recorrência </label>
                <select name="recorrenciaTarefa" id="recorrenciaTarefa" class="form-select">
                    <option value="0"<?php echo ($dados["recorrenciaTarefa"] == 0)? "selected": "" ?>>Não Recorrente</option>
                    <option value="1"<?php echo ($dados["recorrenciaTarefa"] == 1)? "selected": "" ?>>Diariamente</option>
                    <option value="2"<?php echo ($dados["recorrenciaTarefa"] == 2)? "selected": "" ?>>Semanal</option>
                    <option value="3"<?php echo ($dados["recorrenciaTarefa"] == 3)? "selected": "" ?>>Mensalmente</option>
                    <option value="4"<?php echo ($dados["recorrenciaTarefa"] == 4)? "selected": "" ?>>Anualmente</option>
                </select>
                  <!-- sistema de validacao -->
                  <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div>

        <div class="mt-3">
            <input title="Atualizar Tarefa" class="btn btn-warning col-1" type="submit" value="Atualizar" name="btnAtualizar">
            </div>
        </div>
    </form>
</div>