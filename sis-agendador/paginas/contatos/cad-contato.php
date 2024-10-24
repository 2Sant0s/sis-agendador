<header>
    <h3 class="mb-3 mt-3"><i class="bi bi-person-bounding-box"></i> Cadastro de Contato</h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=inserir-contato" method="post" novalidate>

        <div class="mb-3">
            <label class="form-label" for="nomeContato">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input class="form-control" type="text" name="nomeContato" id="nomeContato" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo obrigatório!</div>
            </div>
        </div> 

        <div class="mb-3">
            <label class="form-label" for="emailContato">Email</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input class="form-control" type="email" name="emailContato" id="emailContato" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="telefoneContato">Telefone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input class="form-control" type="number" name="telefoneContato" id="telefoneContato" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="enderecoContato">Endereço</label>
            <div class="input-group">
                <div class="input-group-text"><i class="bi bi-mailbox"></i></div>
                <input class="form-control" type="text" name="enderecoContato" id="enderecoContato" required>
            </div>
        </div>
    <!-- colocar o calendário e o sexo lado a lado -->
     <div class="row mb-3">
    <div class="mb-3 col-3">
            <label class="form-label" for="sexoContato">Sexo</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
            <select class="form-control" name="sexoContato" id="sexoContato" required>
                <option selected value="">Selecione o sexo</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="dataNasciContato">Data de Nascimento</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
            <input class="form-control" type="date" name="dataNasciContato" required>
            </div>
        </div>
    </div>
    </div>
        <div>
            <input class= "btn btn-outline-success"type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>