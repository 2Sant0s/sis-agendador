<header class="mt-3 text-primary" >
    <h3><i class="bi bi-list-task"></i> Cadastro de Tarefa</h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=inserir-tarefa" method="post" novalidate>
        <div class="mb-3">
            <label for="tituloTarefa" class="form-label">Título</label>
            <input class="form-control" type="text" name="tituloTarefa" id="tituloTarefa" required>
            <!-- sistema de validacao -->
<div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
        </div>
        <div class="mb-3">
            <label for="descricaoTarefa" class="form-label">Descrição</label>
            <textarea name="descricaoTarefa" id="descricaoTarefa" cols="30" rows="5" class="form-control" required></textarea>
            <!-- sistema de validacao -->
<div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataConclusaoTarefa" class="form-label">Data de Conclusão</label>
                <input class="form-control" type="date" name="dataConclusaoTarefa" id="dataConclusaoTarefa" required>
                <!-- sistema de validacao -->
<div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
            
            <div class="mb-3 col-3">
                <label for="horaConclusaoTarefa" class="form-label">Hora de Conclusão</label>
                <input class="form-control" type="time" name="horaConclusaoTarefa" id="horaConclusaoTarefa" required>
<!-- sistema de validacao -->
<div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>

            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataLembreteTarefa" class="form-label">Data de Lembrete</label>
                <input class="form-control" type="date" name="dataLembreteTarefa" id="dataLembreteTarefa" required>
<!-- sistema de validacao -->
<div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
            <div class="mb-3 col-3">
                <label for="horaLembreteTarefa" class="form-label">Hora de Lembrete</label>
                <input class="form-control" type="time" name="horaLembreteTarefa" id="horaLembreteTarefa" required>
                           <!-- sistema de validacao -->
                           <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div>
        
        <!-- resolver problema da tag SELECT (provavelmente é versao do bootstrap) -->
        <div class="row">
            <div class="mb-3 col-3">
                <label for="recorrenciaTarefa" class="form-label">Recorrência </label>
                <select name="recorrenciaTarefa" id="recorrenciaTarefa" class="form-select">
                    <option value="0">Não Recorrente</option>
                    <option value="1">Diariamente</option>
                    <option value="2">Semanal</option>
                    <option value="3">Mensalmente</option>
                    <option value="4">Anualmente</option>
                </select>
                      <!-- sistema de validacao -->
                      <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div>

        <div class="mt-3">
            <input title="Cadastrar Tarefa" class="btn btn-primary col-1" type="submit" value="Cadastrar" name="btnAdicionar">
            </div>
        </div>
    </form>
</div>