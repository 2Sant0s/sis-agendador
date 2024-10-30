<header class="mt-3 text-primary">
    <h3><i class="bi bi-calendar-check"></i> Cadastro de Evento</h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=inserir-evento" method="post" novalidate>
        <div class="mt-3 mb-3">
            <label for="tituloEvento" class="form-label">Título</label>
            <input class="form-control" type="text" name="tituloEvento" id="tituloEvento" required>
             <!-- sistema de validacao -->
             <div class="valid-feedback"></div>
            <div class="invalid-feedback">Campo obrigatório!</div>
        </div>
        <div class="mb-3">
            <label for="descricaoEvento" class="form-label">Descrição</label>
            <textarea name="descricaoEvento" id="descricaoEvento" cols="30" rows="5" class="form-control" required></textarea>
             <!-- sistema de validacao -->
             <div class="valid-feedback"></div>
            <div class="invalid-feedback">Campo obrigatório!</div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataInicioEvento" class="form-label">Data de Conclusão</label>
                <input class="form-control" type="date" name="dataInicioEvento" id="dataInicioEvento" required>
                 <!-- sistema de validacao -->
                 <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
            
            <div class="mb-3 col-3">
                <label for="horaInicioEvento" class="form-label">Hora de Conclusão</label>
                <input class="form-control" type="time" name="horaInicioEvento" id="horaInicioEvento" required>
                 <!-- sistema de validacao -->
                 <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataFimEvento" class="form-label">Data de Lembrete</label>
                <input class="form-control" type="date" name="dataFimEvento" id="dataFimEvento" required>
                 <!-- sistema de validacao -->
                 <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
            <div class="mb-3 col-3">
                <label for="horaFimEvento" class="form-label">Hora de Lembrete</label>
                <input class="form-control" type="time" name="horaFimEvento" id="horaFimEvento" required>
                 <!-- sistema de validacao -->
                 <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div>
        <div class="mb-3 mt-3">
            <input title="Cadastrar Evento" class="btn btn-primary col-1" type="submit" value="Cadastrar" name="btnAdicionar">
            </div>
        </div>
    </form>
</div>