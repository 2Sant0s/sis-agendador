<header>
    <h3 class="mb-3 mt-3 text-primary"><i class="bi bi-person-badge-fill"></i> Cadastro de Contato</h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=inserir-contato" method="post" novalidate>

        <div class="mb-3">
            <label class="form-label" for="nomeContato">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input class="form-control" type="text" name="nomeContato" id="nomeContato" required>
                <!-- sistema de validacao -->
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div> 

        <div class="mb-3">
            <label class="form-label" for="emailContato">Email</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input class="form-control" type="email" name="emailContato" id="emailContato" required>
                 <!-- sistema de validacao -->
                 <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="telefoneContato">Telefone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input class="form-control" type="number" name="telefoneContato" id="telefoneContato" required>
                     <!-- sistema de validacao -->
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="enderecoContato">Endereço</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-mailbox"></i></span>
                <input class="form-control" type="text" name="enderecoContato" id="enderecoContato" required>
                 <!-- sistema de validacao -->
                 <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div>
    <!-- colocar o calendário e o sexo lado a lado -->
     <div class="row">
    <div class="mb-3 col-3">
            <label class="form-label" for="sexoContato">Sexo</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
            <select class="form-select" name="sexoContato" id="sexoContato" required>
                <option selected value="">Selecione o sexo</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
             <!-- sistema de validacao -->
             <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
        </div>
    </div>
        <div class="mb-3 col-3">
            <label class="form-label" for="dataNasciContato">Data de Nascimento</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-calendar-fill"></i></span>
            <input class="form-control" type="date" name="dataNasciContato" required>
             <!-- sistema de validacao -->
             <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div>
    </div>
    </div>
        <div class="mt-2">
            <input title="Cadastrar Contato" class="btn btn-primary" type="submit" value="Cadastrar" name="btnAdicionar">
        </div>
    </form>
</div>