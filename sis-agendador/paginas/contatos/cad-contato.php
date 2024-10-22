<header>
    <h3>Cadastro de Contato</h3>
</header>

<div>
    <form action="index.php?menuop=inserir-contato" method="post">

        <div>
            <label for="nomeContato">Nome</label>
            <input type="text" name="nomeContato" id="nomeContato">
        </div>

        <div>
            <label for="emailContato">Email</label>
            <input type="email" name="emailContato" id="emailContato">
        </div>

        <div>
            <label for="telefoneContato">Telefone</label>
            <input type="text" name="telefoneContato" id="telefoneContato">
        </div>

        <div>
            <label for="enderecoContato">Endereço</label>
            <input type="text" name="enderecoContato" id="enderecoContato">
        </div>

        <div>
            <label for="sexoContato">Sexo</label>
            <input type="text" name="sexoContato" id="sexoContato">
        </div>

        <div>
            <label for="dataNasciContato">Data Nascimento</label>
            <input type="date" name="dataNasciContato" id="dataNasciContato">
        </div>

        <div>
            <input type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>